<?php

namespace App\Http\Controllers;

use App\Helpers\SpeechToText;
use App\Helpers\Google\SpeechToText as GoogleSpeechToText;
use App\Requests\SpeechToTextRequest;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function speechToText(SpeechToTextRequest $request)
    {
        $GoogleSpeechToText = new GoogleSpeechToText();

        $speechToText = (new SpeechToText($GoogleSpeechToText))->getService();

        $result = $speechToText->setAudio($request->file)->recognize();

        return response()->json([
            'result' => $result,
        ]);
    }

}
