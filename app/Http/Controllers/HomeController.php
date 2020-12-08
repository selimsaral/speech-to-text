<?php

namespace App\Http\Controllers;

use App\Jobs\SpeechToTextJob;
use App\Requests\SpeechToTextRequest;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function speechToText(SpeechToTextRequest $request): JsonResponse
    {
        $result = dispatch_now(new SpeechToTextJob($request->file));

        return response()->json([
            'result' => $result,
        ]);
    }

}
