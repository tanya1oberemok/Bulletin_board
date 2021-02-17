<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('id');
            $table->string('age')->nullable()->after('remember_token');
            $table->string('gender')->nullable()->after('remember_token');
            $table->text('address')->nullable()->after('remember_token');
            $table->string('phone_number')->nullable()->after('remember_token');
            $table->string('photo')->nullable()->after('remember_token');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['last_name', 'age', 'gender', 'address',
                'phone_number', 'photo']);
        });
    }
}
