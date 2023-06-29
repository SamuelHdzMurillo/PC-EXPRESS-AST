<!DOCTYPE html>
<html>
<head>
    <title>Device Ticket</title>
    <style>
        /* Estilos CSS para el ticket */
        /* Agrega aquí los estilos que desees para personalizar el aspecto del ticket */
        body {
  font-family: "Arial", sans-serif;
  margin: 0;
  padding: 10px;
}

.ticket {
  width: 300px;
  background-color: #ffffff;
  padding: 20px;
  border: 2px solid #000000;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.ticket h1 {
  font-size: 20px;
  text-align: center;
  margin-bottom: 10px;
}

.ticket p {
  font-size: 14px;
  margin-bottom: 5px;
}

.ticket .label {
  font-weight: bold;
}

.ticket .owner {
  margin-top: 20px;
  border-top: 1px dashed #000000;
  padding-top: 10px;
}

.ticket .owner p {
  margin-bottom: 5px;
}

.ticket .footer {
  margin-top: 20px;
  text-align: center;
}

.ticket .footer p {
  font-size: 12px;
  color: #888888;
}
    </style>
</head>
<body>
<div class="ticket">
  <h1>Device Ticket</h1>
  <p class="label">ID:</p>
  <p>{{ $device->id }}</p>
  <p class="label">State:</p>
  <p>{{ $device->state }}</p>
  <!-- Agrega aquí el resto de las propiedades del dispositivo -->

  <div class="owner">
    <h2>Owner:</h2>
    <p class="label">Name:</p>
    <p>{{ $device->owner->name }}</p>
    <p class="label">Phone Number:</p>
    <p>{{ $device->owner->phone_number }}</p>
    <!-- Agrega aquí el resto de la información del propietario -->
  </div>

  <div class="footer">
    <p>Thank you for choosing our store!</p>
  </div>
</div>
</body>
</html>