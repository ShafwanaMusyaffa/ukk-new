<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            // $table->string('image');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_telp', 13);
            $table->boolean('is_admin')->default(false);
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('lelang', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['pemenang_id']);
        });
        Schema::table('lelang_logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('users');
    }
};
