<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Alumno;


class AlumnoController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/ProyectoRegistros/indexR.php', // Reemplaza con la URL de tu servicio web PHP
            'timeout' => 2.0,
        ]);
    }


    public function index()
    {
        $alumnos = Alumno::all(); // Obtiene todos los registros de la tabla 'alumnos'
    
        return view('alumnos.index', compact('alumnos'));
    }
    
    

    public function show($id)
    {
        // Aquí obtienes los datos del alumno con el ID proporcionado desde tu servicio web PHP
        $alumno = $this->obtenerAlumnoPorId($id); // Implementa esta función según cómo obtengas los datos

        return view('alumnos.show', compact('alumno'));
    }

    public function create()
    {
        // Vista para mostrar el formulario emergente para agregar un nuevo alumno
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        // Aquí obtienes los datos del formulario de creación enviado por el usuario
        $data = $request->only(['matricula', 'nombre', 'a_paterno', 'a_materno', 'no_lista']);

        // Luego, haces una solicitud POST a tu servicio web PHP para agregar el nuevo alumno
        $this->agregarAlumno($data);

        // Redireccionas a la vista principal con un mensaje de éxito
        return redirect()->route('alumnos.index')->with('success', 'Alumno agregado exitosamente.');
    }

    public function edit($id)
    {
        // Aquí obtienes los datos del alumno con el ID proporcionado desde tu servicio web PHP
        $alumno = $this->obtenerAlumnoPorId($id); // Implementa esta función según cómo obtengas los datos

        // Vista para mostrar el formulario emergente para editar el alumno
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        // Aquí obtienes los datos del formulario de edición enviado por el usuario
        $data = $request->only(['matricula', 'nombre', 'a_paterno', 'a_materno','no_lista']);

        // Luego, haces una solicitud PUT a tu servicio web PHP para actualizar el alumno con el ID proporcionado
        $this->actualizarAlumno($id, $data);

        // Redireccionas a la vista principal con un mensaje de éxito
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Haces una solicitud DELETE a tu servicio web PHP para eliminar el alumno con el ID proporcionado
        $this->eliminarAlumno($id);

        // Redireccionas a la vista principal con un mensaje de éxito
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }

    // Implementa las funciones para obtener, agregar, actualizar y eliminar alumnos según las necesidades y lógica de tu servicio web PHP

    // Ejemplo de función para obtener todos los alumnos
    private function obtenerAlumnos()
    {
        $response = $this->client->get('alumnos');
        return json_decode($response->getBody(), true);
    }

    // Ejemplo de función para obtener un alumno por ID
    private function obtenerAlumnoPorId($id)
    {
        $response = $this->client->get("alumnos/{$id}");
        return json_decode($response->getBody(), true);
    }

    // Ejemplo de función para agregar un nuevo alumno
    private function agregarAlumno($data)
    {
        $response = $this->client->post('alumnos', [
            'form_params' => $data,
        ]);
        // Puedes implementar la lógica para manejar la respuesta del servicio, como verificar si se agregó correctamente
    }

    // Ejemplo de función para actualizar un alumno
    private function actualizarAlumno($id, $data)
    {
        $response = $this->client->put("alumnos/{$id}", [
            'form_params' => $data,
        ]);
        // Puedes implementar la lógica para manejar la respuesta del servicio, como verificar si se actualizó correctamente
    }

    // Ejemplo de función para eliminar un alumno
    private function eliminarAlumno($id)
    {
        $response = $this->client->delete("alumnos/{$id}");
        // Puedes implementar la lógica para manejar la respuesta del servicio, como verificar si se eliminó correctamente
    }
}
