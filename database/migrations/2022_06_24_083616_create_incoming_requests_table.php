<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('incoming_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('method');
            $table->string('uri');
            $table->json('body');
        });
    }
};
