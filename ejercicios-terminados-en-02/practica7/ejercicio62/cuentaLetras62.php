<?php
//Elaborar un programa que permita leer una frase u oración y que imprima la palabra
//más larga, contemplar la posibilidad de que haya más de una palabra con la longitud
//más larga, en tal caso utilizar un arreglo para guardarlas y al final imprimir todas las
//palabras que tuvieron la máxima longitud. Utilizar distintos métodos para cada una de
//las acciones.

class cuentaLetras
{
    private string $sentence;

    public function __construct($sentence)
    {
        $this->sentence = $sentence;
    }

    public function getTheLongestWord()
    {
        //Devuelve la palabra mas larga encontrada, si hay mas de una devuelve la primera
        $words = explode(' ', $this->sentence);
        $longestWord = "";
        foreach ($words as $word) {
            if (strlen($word) > strlen($longestWord)) {
                $longestWord = $word;
            }
        }
        return $longestWord;
    }

    public function getTheLongestsWords()
    {
        $words = explode(' ', $this->sentence);
        $longetsWords = [];
        $maxLength = 0;
        foreach ($words as $word) {
            $wordLength = strlen($word);
            if ($wordLength > $maxLength) {
                $maxLength = $wordLength;
                $longetsWords = [$word];
            } elseif ($wordLength == $maxLength) {
                $longetsWords[] = $word;
            }
        }
        return $longetsWords;
    }

}