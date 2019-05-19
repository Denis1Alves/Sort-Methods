<?php
require_once("Controller\controleArray.class.php");

class InsertionSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $InsertionOrdenado = new InsertionSort();
        $InsertionOrdenado->numeroDeElementos = count($arrayParaOrdenar);
        $tempoDeInicio = self::microtime_float();
        
        $InsertionOrdenado->array = 
        $this->insertion_sort($arrayParaOrdenar, $InsertionOrdenado);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = self::microtime_float();
        
        $diferencaTempo = $tempoFinal - $tempoDeInicio;
        $InsertionOrdenado->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        
        return $InsertionOrdenado;
    }

    private function insertion_sort($arrayParaOrdenar, &$objInsertionSort)
    {
        //Insertion sort prejulga que o primeiro
        //Elemento já está em seu lugar, por isso começamos
        //Do elemento 1
        for ($i = 1; $i < $objInsertionSort->numeroDeElementos; $i++) 
        { 
            //Gravo num variável auxiliar o valor que vamos comparar
            $valorAux = $arrayParaOrdenar[$i]; 

            //$j se inicia em $i-1 pois precisamos comparar
            //Desde o item anterior ao item de comparação vigente:
            /*
                Se $i é 1, devemos começar a olhar o array 
                a patir do 0.
                
                Se $i é 2, devemos começar a olhar o array 
                a patir do 1
            */
            $j = $i-1; 
        
            $objInsertionSort->numeroComparacoes++;
            // Movo os elementos dos array[0..i-1], 
            // que são maiores que o valorAux, para uma posição 
            // a frente da sua posição atual
            while ($j >= 0 && $arrayParaOrdenar[$j] > $valorAux) 
            { 
                $arrayParaOrdenar[$j + 1] = $arrayParaOrdenar[$j]; 
                $j = $j - 1; 
            } 
            //Depois de ter ordenado todos os valores após
            //a casa do valorAux, recoloco ele no array na posição
            //em que J parou
            $arrayParaOrdenar[$j + 1] = $valorAux; 
        }
    }
}
