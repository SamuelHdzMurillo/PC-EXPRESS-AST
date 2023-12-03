<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Estilos CSS para el ticket */
        .ticket {
            font-family: "Roboto", sans-serif;
            width: 300px;
            padding: 10px;
            border: 1px solid #000;
            margin-left: 0; /* Alineación a la izquierda */
            margin-right: auto; /* Alineación a la izquierda */
        }

        .ticket img {
            max-width: 100%;
            margin-bottom: 10px;
        }

        .ticket .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .ticket .info {
            margin-bottom: 10px;
        }

        .ticket .info span {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .ticket .section {
            margin-bottom: 20px;
            border: 1px solid #000;
            padding: 10px;
            display: flex;
        }

        .ticket .section-header {
            font-weight: bold;
            margin-bottom: 5px;
            width: 100px;
        }

        .ticket .section-info {
            flex-grow: 1;
        }

        .ticket .section:not(:last-child) {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        
        
        <div class="section">
            <div style="font-weight: bold; margin-bottom: 5px;">Datos de Ingreso:</div>
            <div class="section-info">
            <div><span>Fecha de Ingreso:</span>{{ $device->created_at }}</div>
                <div><span>Orden:</span> {{ $device->id }}</div>
            </div>
        </div>
        
        <div class="section">
            <div style="font-weight: bold; margin-bottom: 5px;" >Información del Cliente:</div>
            <div class="section-info">
                <div><span>Nombre:</span> {{ $device->owner->name }}</div>
                <div><span>Número de Teléfono:</span> {{ $device->owner->phone_number }}</div>
            </div>
        </div>
        
        <div class="section">
            <div style="font-weight: bold; margin-bottom: 5px;">Información del Producto:</div>
                <div class="section-info">
                    
                    <div><span>Tipo de dispositivo:</span> {{ $device->device_type }}</div>
                    <div><span>Marca:</span> {{ $device->brand }}</div>
                    <div><span>Técnico:</span> {{ $device->technican }}</div>
                    
                </div>
        </div>

        <div class="section">
        <div style="font-weight: bold; margin-bottom: 5px;">Información del Problema:</div>
        <div class="section-info">
            <div><span>Daño:</span> {{ $device->damage }}</div>
            <div><span>Accesorios:</span> {{ $device->accesories }}</div>
            <div><span>Observaciones:</span> {{ $device->observations }}</div>
            </div>
        </div>
        
        
    </div>
</body>
</html>
