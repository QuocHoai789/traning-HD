<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name', 50)->collation('utf8_unicode_ci');
            $table->string('email', 100)->unique()->collation('utf8_unicode_ci');
            $table->timestamp('email_verified_at')->nullable()->collation('utf8_unicode_ci');
            $table->string('password');
            $table->tinyInteger('level')->default(0)->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('users');
    }
}
