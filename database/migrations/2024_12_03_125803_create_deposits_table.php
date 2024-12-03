<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('order_id', 10);
            $table->decimal('amount', 11, 2);
            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('0=not sent 1=sent but response is 4xx, 2=sent & response 200 but respons status failed (1), 3=sent & response status = success(2)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
