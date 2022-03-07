<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frages', function (Blueprint $table) {
            $table->id();
            $table->text("frage");
            $table->string('autor')->default('Anonym');
            $table->boolean('beantwortet')->default(false);
            $table->boolean('aktion')->default(false);
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
        Schema::dropIfExists('frages');
    }
}
