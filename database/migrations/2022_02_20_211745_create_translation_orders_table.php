<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateTranslationOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('message')->integer('number_of_page');
            $table->string('project_file');
            $table->string('from_language');
            $table->string('to_language');
            $table->string('selected_request');
            $table->integer('page_price');
            $table->date("invoice_date")->default(Carbon::now());
            $table->string('checkout_id')->unique();
            $table->integer('number_of_page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translation_orders');
    }
}
