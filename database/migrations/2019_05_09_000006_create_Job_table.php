<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'jobs';

    /**
     * Run the migrations.
     * @table Job
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->string('title');
            $table->text('description'); 
            $table->timestamps();
            
            $table->foreign('section_id') 
                ->references('id')->on('sections')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('admin_id')
                ->references('id')->on('admins')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
