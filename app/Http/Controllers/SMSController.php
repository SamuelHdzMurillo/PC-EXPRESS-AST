<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\device;
use App\Models\owner;

class SMSController extends Controller
{   
    
    public function sendReceivedMessage($id)
    {
        $device = Device::find($id);
       

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $message = "¡Hola! Tu dispositivo {$device->device_type} fue recibido por {$device->technican} pronto pasara a revision!, Puedes ver el progreso en tiempo real en: https://pcexpressadmin-wffil.ondigitalocean.app/#/devices/{$device->id}";
        
        $this->sendMessage($device->owner->phone_number, $message);

        return response()->json(['message' => 'Mensaje enviado con éxito']);
    }

    public function sendInProgressMessage($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $message = "¡Hola! Tu dispositivo {$device->device_type} se encuentra actualmente en reparación. Entra para mas detalles en:  https://pcexpressadmin-wffil.ondigitalocean.app/#/devices/{$device->id}";
        
        $this->sendMessage($device->owner->phone_number, $message);

        return response()->json(['message' => 'Mensaje enviado con éxito']);
    }

    private function sendMessage($to, $message)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $token);

        $client->messages->create(
            $to,
            [
                'from' => $twilioNumber,
                'body' => $message,
            ]
        );
        return response()->json(['message' => 'Mensaje enviado con éxito']);
    }

    public function sendCompletedMessage($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $message = "¡Hola! Tu dispositivo {$device->device_type} a nombre de {$device->owner->name}  ha sido reparado y está listo para su recoleccion. Entra para mas detalles en:  https://pcexpressadmin-wffil.ondigitalocean.app/#/devices/{$device->id}";

        
        $this->sendMessage($device->owner->phone_number, $message);

        return response()->json(['message' => 'Mensaje enviado con éxito']);
    }

   
}
