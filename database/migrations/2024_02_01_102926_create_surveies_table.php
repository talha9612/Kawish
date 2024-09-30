<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveies', function (Blueprint $table) {
            $table->id();
            $table->string('setup'); // Assuming 'setup' is a string column
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('status');
            $table->string('area');
            $table->string('village_name');
            $table->string('appro_h_f');
            $table->integer('appro_residents');
            $table->decimal('expected_cost', 10, 2); // Assuming 'expected_cost' is a decimal column with precision 10 and scale 2
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
        Schema::dropIfExists('surveies');
    }
}
