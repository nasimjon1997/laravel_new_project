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
            $table->id()->primary()->autoIncrement()->nullable();
            $table->string('firstname', 256)->nullable();
            $table->string('lastname', 256)->nullable();
            $table->string('email', 256)->unique()->nullable();
            $table->string('role', 256)->nullable();
            $table->string('status', 20)->nullable();
            $table->dateTime('registered')->nullable();
            $table->string('password', 256)->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement()->nullable();
            $table->string('title', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('slug', 256)->unique()->nullable();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->primary()->autoIncrement()->nullable();
            $table->string('title', 256)->nullable();
            $table->longText('content')->nullable();
            $table->string('slug', 256)->unique()->nullable();
            $table->integer('cid')->nullable();
            $table->integer('uid')->nullable();
            $table->string('status', 20)->nullable();
            $table->dateTime('created')->nullable();
            $table->dateTime('modified')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('users');
            $table->foreign('cid')->references('id')->on('categories');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users', 'categories', 'news');
    }
};

class Flight extends Model
{
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
}
