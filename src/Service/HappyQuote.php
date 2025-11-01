<?php

namespace App\Service;

final readonly class HappyQuote
{
    public static function getHappyMessage(): string
    {
        $messages = [
        'Believe you can and you are halfway there',
        'The best way to predict the future is to create it.',
        'Every day may not be good... but there’s something good in every day ! ',
        'Great work! Keep going!',
        'Hello It\'s Me Omar :)'
        ];
        return $messages[array_rand($messages)];
    }
}
