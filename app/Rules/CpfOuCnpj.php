<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfOuCnpj implements Rule
{
    public function passes($attribute, $value)
    {
        $value = preg_replace('/[^0-9]/', '', $value); // Remove caracteres não numéricos

        return $this->isValidCpf($value) || $this->isValidCnpj($value);
    }

    public function message()
    {
        return 'O :attribute deve ser um CPF ou CNPJ válido.';
    }

    private function isValidCpf($value)
    {
        if (strlen($value) != 11) {
            return false;
        }


        $cpf = array_map('intval', str_split($value));

        // Verifica se todos os dígitos são iguais
        if (count(array_unique($cpf)) == 1) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $cpf[$i] * (10 - $i);
        }
        $remainder = $sum % 11;
        $firstDigit = $remainder < 2 ? 0 : 11 - $remainder;

        if ($cpf[9] != $firstDigit) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += $cpf[$i] * (11 - $i);
        }
        $remainder = $sum % 11;
        $secondDigit = $remainder < 2 ? 0 : 11 - $remainder;

        return $cpf[10] == $secondDigit;
    }

    private function isValidCnpj($value)
    {
        if (strlen($value) != 14) {
            return false;
        }


        $cnpj = array_map('intval', str_split($value));

        $sum = 0;
        $multipliers = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0; $i < 12; $i++) {
            $sum += $cnpj[$i] * $multipliers[$i];
        }
        $remainder = $sum % 11;
        $firstDigit = $remainder < 2 ? 0 : 11 - $remainder;

        if ($cnpj[12] != $firstDigit) {
            return false;
        }

        $sum = 0;
        $multipliers = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0; $i < 13; $i++) {
            $sum += $cnpj[$i] * $multipliers[$i];
        }
        $remainder = $sum % 11;
        $secondDigit = $remainder < 2 ? 0 : 11 - $remainder;

        return $cnpj[13] == $secondDigit;
    }
}
