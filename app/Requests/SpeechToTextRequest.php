<?php

namespace App\Requests;

use Anik\Form\FormRequest;

class SpeechToTextRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "file" => "required|mimes:mp3,waw,flac",
        ];
    }
}
