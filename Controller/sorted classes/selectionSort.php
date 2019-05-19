<?php
require_once("Controller\controleArray.class.php");

class SelectionSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $selectionOrdenado = new SelectionSort();
        $selectionOrdenado->numeroDeElementos = count($arrayParaOrdenar);
        $tempoDeInicio = $this->microtime_float();

        $selectionOrdenado->array = $this->selection_sort($arrayParaOrdenar, $selectionOrdenado);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = self::microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;
        
        $selectionOrdenado->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        
        return $selectionOrdenado;
    }

    private function selection_sort($arrayParaOrdenar, &$objSelectionSort)
    {
        /*
            Selection sort divide o array em duas partes:
            Uma parte ordenada e a outra desordenada
        */

        //Será necessário percorrer todo o array
        for($i = 0; $i < count($arrayParaOrdenar) ; $i++) 
        { 
            $indiceDoMenorNumero = $i; 

            //Percorro o array a partir de $i + 1 para encontrar o menor
            //Número presente nele
            for($j = $i + 1; $j < count($arrayParaOrdenar) ; $j++) 
            { 
                $objSelectionSort->numeroComparacoes++;
                if ($arrayParaOrdenar[$j] < $arrayParaOrdenar[$indiceDoMenorNumero]) 
                { 
                    $indiceDoMenorNumero = $j; 
                } 
            } 
            
            //Com o indice do menor número nas mãos,
            //coloco ele na posição $i do array
            $objSelectionSort->numeroComparacoes++;
            if ($arrayParaOrdenar[$i] > $arrayParaOrdenar[$indiceDoMenorNumero]) 
            { 
                $tmp = $arrayParaOrdenar[$i]; 
                $arrayParaOrdenar[$i] = $arrayParaOrdenar[$indiceDoMenorNumero]; 
                $arrayParaOrdenar[$indiceDoMenorNumero] = $tmp; 
            } 
        } 

        return $objSelectionSort;
    }
}
