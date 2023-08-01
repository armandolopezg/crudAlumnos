<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'd'; // Reemplaza 'nombre_de_la_tabla' por el nombre real de tu tabla de alumnos
    protected $connection = 'mysql'; // Reemplaza 'nombre_de_la_conexion' por el nombre real de tu conexión a la base de datos
    protected $guarded = []; // Esto permite asignación masiva de datos (opcional)

    // Define las relaciones y demás lógica del modelo aquí si es necesario
}
