<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('role');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_enabled');
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->timestamps();
        });

        DB::table('role_master')->insert([
            ['role' => 'Super Admin','description' => 'Super Admin Privileges','created_by'=>1,'updated_by'=>1,'is_enabled' => 0],
            ['role' => 'Customer','description' => 'Customer Privileges','created_by'=>1,'updated_by'=>1,'is_enabled' => 1],
           
        ]);

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_master');
    }
}
