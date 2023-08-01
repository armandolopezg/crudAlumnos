<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Alumnos</title>
    <!-- Agrega el enlace a Bootstrap si aún no lo tienes -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container mt-5">
        <h1>CRUD de Alumnos</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#tab-lista">Lista de Alumnos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-nuevo">Nuevo Alumno</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <!-- Tab: Lista de Alumnos -->
            <div class="tab-pane fade show active" id="tab-lista">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Carrera</th>
                            <th>Grupo</th>
                            <th>Turno</th>
                            <th>Número de Lista</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se mostrará la lista de alumnos -->
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->matricula }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->a_paterno }}</td>
                                <td>{{ $alumno->a_materno }}</td>
                                <td>{{ $alumno->edad }}</td>
                                <td>{{ $alumno->sexo }}</td>
                                <td>{{ $alumno->carrera }}</td>
                                <td>{{ $alumno->grupo }}</td>
                                <td>{{ $alumno->turno }}</td>
                                <td>{{ $alumno->no_lista}}</td>
                                <td>
                                    <a href="#tab-editar" data-bs-toggle="tab" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="#tab-eliminar" data-bs-toggle="tab" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Tab: Nuevo Alumno -->
            <div class="tab-pane fade" id="tab-nuevo">
                <form action="{{ route('alumnos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="a_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="a_paterno" name="a_paterno" required>
                    </div>
                    <div class="mb-3">
                        <label for="a_materno" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="a_materno" name="a_materno" required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Carrera</label>
                        <input type="text" class="form-control" id="carrera" name="carrera" required>
                    </div>
                    <div class="mb-3">
                        <label for="grupo" class="form-label">Grupo</label>
                        <input type="text" class="form-control" id="grupo" name="grupo" required>
                    </div>
                    <div class="mb-3">
                        <label for="turno" class="form-label">Turno</label>
                        <input type="text" class="form-control" id="turno" name="turno" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_lista" class="form-label">Número de Lista</label>
                        <input type="number" class="form-control" id="no_lista" name="no_lista" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>

            <!-- Tab: Editar Alumno -->
            <div class="tab-pane fade" id="tab-editar">
                <!-- Formulario para editar un alumno -->
                <!-- Similar al formulario de Nuevo Alumno, pero con los datos del alumno a editar -->
            </div>

            <!-- Tab: Eliminar Alumno -->
            <div class="tab-pane fade" id="tab-eliminar">
                <!-- Formulario para confirmar la eliminación de un alumno -->
                <!-- Mostrar los datos del alumno a eliminar y un botón de confirmar -->
            </div>
        </div>
    </div>

    <!-- Agrega los scripts de Bootstrap si aún no los tienes -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

