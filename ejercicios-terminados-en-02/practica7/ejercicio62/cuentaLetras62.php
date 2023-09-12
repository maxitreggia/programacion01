<?php
//Elaborar un programa que permita leer una frase u oración y que imprima la palabra
//más larga, contemplar la posibilidad de que haya más de una palabra con la longitud
//más larga, en tal caso utilizar un arreglo para guardarlas y al final imprimir todas las
//palabras que tuvieron la máxima longitud. Utilizar distintos métodos para cada una de
//las acciones.


class cuentaLetras
{
    private $sentence;

    public function __construct($sentence)
    {
        $this->sentence = $sentence;
    }

    public function getTheLongestWord(){
        $sentence = explode(' ', $this->sentence);
        $longestWord = "";
        foreach ($sentence as $candidate){
            if(strlen($candidate)>strlen($longestWord)){
                $longestWord = $candidate;
            }
        }
        return $longestWord;
    }

    public function getTheLongestsWords(){
        $sentence = explode(' ', $this->sentence);
        $longetsWords = [];
        $maxLength = 0;
        foreach ($sentence as $word){
            $wordLegth = strlen($word);
            if($wordLegth > $maxLength){
                $maxLength = $wordLegth;
                $longetsWords = [$word];
            }elseif ($wordLegth == $maxLength){
                $longetsWords[] = $word;
            }
        }
        return $longetsWords;
    }

}