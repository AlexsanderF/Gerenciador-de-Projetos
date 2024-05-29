<?php

namespace App\Helpers;

/*
 * Classe static para não haver instancia da mesma
 */

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Class @DataHelpers
 */
class DataHelpers
{
    /**
     * Ccnverte uma data do padrão ISO8601 para o padrão Brasileiro.
     * @param string $data
     * @return string
     */
    static private function convertDateDb(string $data): string
    {
        return Carbon::make($data)->format('Y-m-d');
    }

    /**
     * Converte uma data do padrão Brasileiro para o padrão ISO8601
     * @param string $data
     * @return string
     */
    static private function convertDateBr(string $data): string
    {
        return Carbon::make($data)->format('d/m/Y');
    }

    /**
     * Faz o cast de data para entrada e saída do padrão brasileiro e iso8601
     * @return Attribute
     */
    static public function convertDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => DataHelpers::convertDateBr($value),
            set: fn($value) => DataHelpers::convertDateDb($value),
        );
    }
}
