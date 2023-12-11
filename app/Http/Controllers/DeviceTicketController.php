<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options; 
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
        $filename = 'device_ticket_' . $device->id.'_' . $device->name .'_'. $device->created_at . '.pdf';

        // Descargar el archivo PDF
        return $dompdf->stream($filename);
    }

    public function generateServiceOrder($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        try {
            // Generar el contenido de la orden de servicio en HTML
            $html = view('device.service_order', compact('device'))->render();

            // Crear una instancia de Dompdf
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);

            // Cargar HTML en Dompdf
            $dompdf->loadHtml($html);

            // Renderizar el contenido HTML en PDF
            $dompdf->render();

            // Generar el nombre del archivo PDF
            $filename = 'service_order_' . $device->id . '_' . $device->name . '_' . $device->created_at . '.pdf';

            // Descargar el archivo PDF
            return $dompdf->stream($filename);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al generar el PDF: ' . $e->getMessage()], 500);
        }
    }
}