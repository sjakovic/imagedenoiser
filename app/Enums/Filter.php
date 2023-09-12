<?php

namespace App\Enums;

enum Filter: string
{
    case AVERAGE = 'average';
    case MEDIAN = 'median';
    case GAUSSIAN = 'gaussian';
    case BILATERAL = 'bilateral';
    case WAVELET = 'wavelet';


    public function name(): string
    {
        return match ($this) {
            self::AVERAGE => 'Mean filtering',
            self::MEDIAN => 'Median filtering',
            self::GAUSSIAN => 'Gaussian blur',
            self::BILATERAL => 'Bilateral filtering',
            self::WAVELET => 'Wavelet transformation',
        };
    }

    public static function all(): array
    {
        return array_reduce(self::cases(), function ($carry, $case) {
            $carry[$case->value] = $case->name();
            return $carry;
        }, []);
    }
}
