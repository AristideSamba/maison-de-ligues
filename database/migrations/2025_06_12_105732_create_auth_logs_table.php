<?php

// Fichier `database/migrations/xxxx_xx_xx_create_auth_logs_table.php`
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthLogsTable extends Migration
{
    // PHP
    public function up()
    {
        Schema::create('auth_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Permet `user_id` d'être NULL
            $table->string('action');
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auth_logs');
    }
}
