<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('status')->default(0);
            $table->string('image');
            $table->string('longitude');
            $table->string('latitude');
            $table->text('description'); // textarea
            $table->enum('type', ['private', 'governmental', 'mixed', 'other']); // select
            $table->enum('level', ['head', 'branch']); // radio
            $table->json('industry'); // checkboxes            
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
        Schema::dropIfExists('companies');
    }
}
