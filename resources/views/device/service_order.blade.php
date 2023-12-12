<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orden De Servico </title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table {
            font-size: x-small;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: lightgray;
        }
        .gray {
            background-color: lightgray;
        }
    </style>
</head>
<body>

    <table width="100%">
        <tr>
            <td valign="center"><img src="https://www.pcexpressbcs.com.mx/storage/images/pWYxsOzkv8qorodIWb73gRBX5kGjAWN6wy7z0ltm.jpg"alt="imagne logo" width="750"/></td>
            <td align="center">
                
            </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td><strong>Técnico a Cargo:</strong> {{ $device->technican }}</td>
            <td><strong>Cliente:</strong> {{ $device->owner->name }}</td>
        </tr>
    </table>

    <br/>

    <table width="100%">
        <!-- Tabla para las especificaciones del equipo -->
        <thead style="background-color: lightgray;">
            <tr>
                <th>Equipo</th>
                <th>Modelo </th>
              	<th>Marca </th>
              	<th>Daño </th>
              	<th>Serie </th>
              	<th>Fecha de creacion </th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí debes agregar filas para cada especificación del dispositivo -->
            <tr>
                <td>{{ $device->device_type }}</td>
                <td>{{ $device->state }}</td>
              <td>{{ $device->brand }}</td>
              <td>{{ $device->damage }}</td>
              <td>{{ $device->serial }}</td>
              <td>{{ $device->created_at }}</td>
            </tr>
            <!-- Agrega más filas con las especificaciones según sea necesario -->
        </tbody>
    </table>

    <br/>

    <table width="100%">
        <!-- Tabla para las actualizaciones (updates) -->
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
              	<th>Título</th>
                <th>Descripción</th>
             	<th>Fecha</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($device->updates as $index => $update)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
              <td>{{ $update->title }}</td>
                <td>{{ $update->description }}</td>
              <td>{{ $update->created_at }}</td>
                <!-- Agrega más campos si es necesario -->
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="5" align="center">
                    <p>El cliente declara estar conforme con el estado del equipo y estar enterado de todo el historial de actualizaciones.</p>
                </td>
            </tr>
            <tr>
                <td colspan="5" align="center">
                    <div class="signature-area">
                        <strong>Firma del cliente:</strong>
                        <p>________________________________</p>
                        
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
