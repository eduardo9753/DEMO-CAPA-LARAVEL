<?php

namespace App\Http\Controllers\Chatbot\chat;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotManController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    //
    public function handle(Request $request)
    {
        /*$config = [];

        // Creando una instancia de BotMan
        DriverManager::loadDriver(WebDriver::class);
        $botman = BotManFactory::create($config);

        $botman->hears('{pregunta}', function (BotMan $bot, $pregunta) {
            $respuesta = DB::connection('mysql')->table('conversation')
                ->where('pregunta', 'LIKE', '%' . $pregunta . '%')
                ->value('respuesta');

            if ($respuesta) {
                $bot->reply($respuesta);
            } else {
                $bot->reply('Lo siento, no tengo una respuesta para tu pregunta.');
            }
        });

        $botman->listen();*/
        $respuesta = Conversation::where('pregunta', 'LIKE', '%' . $request->message . '%')
            ->value('respuesta');

        if ($respuesta) {
            $messages = [];

            // Expresión regular para encontrar URLs de imágenes
            $pattern = '/(https?:\/\/\S+\.(jpg|jpeg|png|gif))/i';
            $parts = preg_split($pattern, $respuesta, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

            foreach ($parts as $part) {
                if (filter_var($part, FILTER_VALIDATE_URL) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $part)) {
                    $messages[] = ['type' => 'image', 'content' => $part];
                } else {
                    $messages[] = ['type' => 'text', 'content' => $part];
                }
            }

            return response()->json([
                'code' => 1,
                'messages' => $messages
            ]);
        } else {
            $conversation = Conversation::create([
                'pregunta' => $request->message,
                'respuesta' => '',
                'estado' => 'SI RESPONDER'
            ]);

            if ($conversation) {
                return response()->json([
                    'code' => 0,
                    'messages' => [['type' => 'text', 'content' => 'Lo siento, por ahora no tengo la respuesta, pero lo he guardado en mi base de datos para futuras respuestas']]
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'messages' => [['type' => 'text', 'content' => 'Lo siento, por ahora no tengo la respuesta, tratare de alertar a mis administradores']]
                ]);
            }
        }
    }
}
