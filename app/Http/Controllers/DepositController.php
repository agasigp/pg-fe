<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Jobs\ProcessDeposit;
use App\Models\Deposit;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('deposits.index', [
            'deposits' => Deposit::query()->where('user_id', auth()->user()->id)->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deposits.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepositRequest $request)
    {
        $deposit = new Deposit();
        $deposit->fill([
             'order_id' => $request->order_id,
            'amount' => $request->type === 'withdraw' ? -$request->amount : $request->amount,
        ]);
        $deposit->user_id = auth()->user()->id;
        $deposit->save();

        ProcessDeposit::dispatch($deposit);

        return redirect()
            ->route('deposits.index')
            ->with('status', 'Data submited!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositRequest $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
