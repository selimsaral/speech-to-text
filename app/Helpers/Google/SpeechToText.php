<?php

namespace App\Helpers\Google;

use App\Contracts\SpeechToTextInterface;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognizeResponse;
use Google\Cloud\Speech\V1\SpeechClient;
use Illuminate\Support\Facades\Log;

class SpeechToText implements SpeechToTextInterface
{
    private RecognitionAudio $audio;

    public function getRecognitionConfig(): RecognitionConfig
    {
        $recognitionConfig = new RecognitionConfig();
        $recognitionConfig->setLanguageCode('tr-TR');

        return $recognitionConfig;
    }


    public function getSpeechClient(): SpeechClient
    {
        try {
            return new SpeechClient([
                'credentials' => config('google')
            ]);

        } catch (ValidationException $e) {

            Log::critical($e);

        }
    }

    public function recognize(): string
    {
        $speechClient      = $this->getSpeechClient();
        $recognitionConfig = $this->getRecognitionConfig();

        try {

            $result = $speechClient->recognize($recognitionConfig, $this->getAudio());

            $speechClient->close();

            return $this->getResult($result);

        } catch (ApiException $e) {

            Log::critical($e);

        }
    }

    /**
     * @param RecognizeResponse $response
     */
    public function getResult($response): string
    {
        $resultText = "";

        foreach ($response->getResults() as $result) {

            $alternatives = $result->getAlternatives();
            $mostLikely   = $alternatives[0];

            $resultText .= $mostLikely->getTranscript();

        }

        return $resultText;
    }


    public function setAudio(string $audio): SpeechToTextInterface
    {
        $audioFile = file_get_contents($audio);
        if ($audioFile !== false) {
            $this->audio = (new RecognitionAudio())->setContent($audioFile);
        }

        return $this;
    }


    public function getAudio(): RecognitionAudio
    {
        return $this->audio;
    }
}
