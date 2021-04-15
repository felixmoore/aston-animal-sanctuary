<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('breed');
            $table->string('colour');
            $table->integer('age');
            $table->foreignId('owner_id')->constrained('users')->nullable();
            $table->boolean('available')->default(TRUE);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE animals ADD CONSTRAINT check_animal_species CHECK (species IN (\'Dog\', \'Cat\', \'Small animal\'))');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
