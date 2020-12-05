<?php

namespace App\Helpers;

use App\Contracts\SpeechToTextInterface;

class SpeechToText
{
    private SpeechToTextInterface $service;

    public function __construct(SpeechToTextInterface $service)
    {
        $this->service = $service;
    }

    public function getService(): SpeechToTextInterface
    {
        return $this->service;
    }
}
