<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\device;

class DeviceTicketController extends Controller
{
    public function generateTicket($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        // Generar el contenido del ticket en HTML
        $html = view('device.ticket', compact('device'))->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Opcional: Puedes ajustar las opciones de configuración de Dompdf aquí

        // Renderizar el contenido HTML en PDF
        $dompdf->render();

        // Generar el nombre del archivo PDF
        $filename = 'device_ticket_' . $device->id . '.pdf';

        // Descargar el archivo PDF
        return $dompdf->stream($filename);
    }
}