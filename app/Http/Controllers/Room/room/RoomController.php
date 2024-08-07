<?php

namespace App\Http\Controllers\Room\room;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    //

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('room.index', $course);
    }

    public function index(Course $course)
    {
        return view('room.index', [
            'course' => $course
        ]);
    }

    public function firmar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'signature' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'  => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            // Depurar la firma
            $signature = $request->input('signature');
            // Puedes usar Log::info($signature) para verificar el valor en los logs

            $save = Signature::insert([
                'firma' => $signature,
                'fecha_firma' => date('Y/m/d H:i:s'),
                'user_id' => auth()->user()->id,
                'course_id' => $request->input('course_id'),
            ]);

            if ($save) {
                return response()->json([
                    'code' => 1,
                    'msg' => 'Firma Agregada Correctamente'
                ]);
            }
        }
    }
}
