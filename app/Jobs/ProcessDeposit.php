<?php

namespace App\Jobs;

use App\Models\Deposit;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ProcessDeposit implements ShouldQueue
{
    use Queueable;

    public $deposit;

    /**
     * Create a new job instance.
     */
    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->deposit->user;
        $amount = number_format($this->deposit->amount, 2, '.', '');
        $response = Http::withToken(base64_encode($user->name))
            ->acceptJson()
            ->post(config('payment.base_url') . '/deposit', [
                'order_id' => $this->deposit->order_id,
                'amount' => $amount,
                'timestamp' => time(),
            ]);
        Log::debug($response->body());

        if ($response->created()) {
            $this->deposit->status = 3;
        } elseif ($response->ok()) {
            $this->deposit->status = 2;
        } elseif ($response->unprocessableEntity() || $response->unauthorized() || $response->badRequest() || $response->forbidden()) {
            $this->deposit->status = 1;
        } else {
            $this->deposit->status = 4;
        }

        $this->deposit->save();
    }
}
