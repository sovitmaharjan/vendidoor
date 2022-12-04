<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_variant_sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->constrained()->onDelete('cascade');
            $table->string('set');
            $table->decimal('price', 18, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variant_sets');
    }
};
