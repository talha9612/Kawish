<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('setup'); 
            $table->unsignedBigInteger('project_id');
            $table->string('requested_by');
            $table->string('requested_for');
            $table->unsignedBigInteger('donor_id');
            $table->unsignedBigInteger('plaque_id');
            $table->string('area');
            $table->string('village_name');
            $table->integer('appro_h_f');
            $table->integer('appro_residents');
            $table->date('tentative_start_date');
            $table->date('actual_start_date');
            $table->date('tentative_completion_date');
            $table->date('actual_completion_date');
            $table->integer('status');
            $table->decimal('expected_cost', 10, 2);
            $table->integer('actual_cost');
            $table->integer('depth');
            $table->string('snap_surveyed');
            $table->string('snap_working');
            $table->string('current_working');
            $table->string('custodian_name');
            $table->string('custodian_phone');
            $table->mediumText('comments');
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
        Schema::dropIfExists('projects');
    }
}
