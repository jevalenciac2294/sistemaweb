<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUbicacionDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ubicaciones', function (Blueprint $table){
            
        $table->softdeletes(); //Nueva línea, para el borrado lógico
        });
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    }
    public function down()
    {
        Schema::dropColumn();
    }
}
