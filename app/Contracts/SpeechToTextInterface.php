<?php

namespace App\Contracts;

interface SpeechToTextInterface
{
    public function getRecognitionConfig();

    public function getSpeechClient();

    public function setAudio(string $audio): SpeechToTextInterface;

    public function recognize(): string;

    public function getResult($response): string;
}
