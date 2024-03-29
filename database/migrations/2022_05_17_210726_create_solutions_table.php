<?php

use App\Platform;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->foreignId('categorie_id');
            $table->foreignId('subcategorie_id');
            $table->foreignId('platform_id');
            $table->foreignId('os_id');
            $table->text('desc');
            $table->string('screens');
            $table->string('site');
            $table->boolean('sellable')->default('0');
            $table->string('currency')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
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
        Schema::dropIfExists('solutions');
    }
}
