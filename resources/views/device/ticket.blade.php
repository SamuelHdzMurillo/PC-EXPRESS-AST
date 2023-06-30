<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        .ticket {
            width: 250px;
            max-width: 250px;
            padding: 10px;
            border: 1px solid #000;
            margin: 10px;
        }

        .label {
            font-weight: bold;
        }

        .customer-info,
        .device-info {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .date {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="customer-info">
            <div>
                <p class="label">Cliente:</p>
                <p>{{ $device->owner->name }}</p>
            </div>
            <div>
                <p class="label">Teléfono:</p>
                <p>{{ $device->owner->phone_number }}</p>
            </div>
            <div>
                <p class="label">Email:</p>
                <p>{{ $device->owner->email }}</p>
            </div>
        </div>

        <div class="device-info">
            <div>
                <p class="label">Equipo:</p>
                <p>{{ $device->brand }}</p>
            </div>
            <div>
                <p class="label">Estado:</p>
                <p>{{ $device->state }}</p>
            </div>
        </div>

        <div class="date">
            <p>{{ $device->created_at }}</p>
        </div>
    </div>
</body>
</html>