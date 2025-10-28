<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function cleanUpperCaseString($string): string {
        // Remover os espaços em branco no início e fim de uma string.
        // Converter a string para uppercase. (maiúsculas)
        return strtoupper(trim($string));
    }
}
