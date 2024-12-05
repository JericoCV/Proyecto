<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGradesForeignKey extends Migration
{
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            //$table->dropForeign(['student_id']); // 'student_id' es el nombre de la columna en grades
            
            // Crear una nueva clave foránea hacia la tabla 'students'
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
            // Revertir la clave foránea hacia la tabla 'users'
            $table->dropForeign(['student_id']);
            //$table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
