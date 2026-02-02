<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('last_name',225);
            $table->string('first_name',225);
            $table->tinyInteger('gender')->comment('1: 男性, 2: 女性, 3: その他');
            $table->string('email',225);
            $table->string('tel',225);
            $table->string('address',225);
            $table->string('building',225)->nullable();
            $table->text('detail');
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
        Schema::dropIfExists('contacts');
    }
}
