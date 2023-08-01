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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',20)->primary()->nullable();
            $table->char('firstname', 256)->nullable();
            $table->char('lastname', 256)->nullable();
            $table->char('email', 256)->unique()->nullable();
            $table->char('role', 256)->nullable();
            $table->char('status', 20)->nullable();
            $table->dateTime('registered')->nullable();
            $table->char('password', 256)->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->string('id',20)->primary()->nullable();
            $table->char('title', 256)->nullable();
            $table->longText('description')->nullable();
            $table->char('slug', 256)->nullable();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->string('id',20)->primary()->nullable();
            $table->char('title', 256)->nullable();
            $table->longText('content')->nullable();
            $table->char('slug', 256)->nullable();
            $table->integer('cid')->nullable();
            $table->integer('uid')->nullable();
            $table->char('status', 20)->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();

            $table->foreign('cid')->references('id')->on('categories');
            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users', 'categories', 'news');
    }
};
