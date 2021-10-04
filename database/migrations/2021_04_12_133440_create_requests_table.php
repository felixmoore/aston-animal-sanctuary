<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('animal_id')->constrained('animals');
            $table->foreignId('user_id')->constrained('users');
            $table->string('status')->default('Pending');
        });

        DB::statement('ALTER TABLE adoption_requests ADD CONSTRAINT check_request_status CHECK (status IN (\'Pending\', \'Approved\', \'Denied\'))');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoption_requests');
    }
}
