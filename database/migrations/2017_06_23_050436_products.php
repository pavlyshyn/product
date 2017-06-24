<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('purchase', 5, 2)->nullable();
            $table->decimal('amount', 5, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->string('code')->nullable();
            $table->boolean('is_publish')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
