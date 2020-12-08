<?php

namespace App\Jobs;

use App\Helpers\Google\SpeechToText as GoogleSpeechToText;
use App\Helpers\SpeechToText;

class SpeechToTextJob extends Job
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function handle(): string
    {
        $GoogleSpeechToText = new GoogleSpeechToText();

        $speechToText = (new SpeechToText($GoogleSpeechToText))->getService();

        return $speechToText->setAudio($this->file)->recognize();
    }
}
