<?php
require_once("Controller\controleArray.class.php");

class bubbleSort extends ControleArray{

    public function ordenarArray($arraParaOrdenar)
    {
        $bubbleOrdenado = new bubbleSort();
        $bubbleOrdenado->numeroDeElementos = count($arraParaOrdenar); 
        
        $tempoDeInicio = $this->microtime_float();
        
        $bubbleOrdenado->array = $this->bubble_Sort($arraParaOrdenar, $bubbleOrdenado);;

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;
        $bubbleOrdenado->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        
        return $bubbleOrdenado;
    }

    private function bubble_Sort($arraParaOrdenar, &$objbubbleSort)
    {
        // Percorre todos os elementos do array 
        for($i = 0; $i < $objbubbleSort->numeroDeElementos; $i++)  
        { 
            // Os últimos elementos 'i' já estão no lugar, ou seja
            // Parte do pré suposto que os ultimós elementos já estão ordenados
            for ($j = 0; $j < $objbubbleSort->numeroDeElementos - $i - 1; $j++)  
            { 
                // Percorre o array a partir do indece 0 até (numeroDeElementos - i - 1)
                // Troca se o elemento encontrado e maior do 
                // que o próximo elemento
                $objbubbleSort->numeroComparacoes++;
                if ($arraParaOrdenar[$j] > $arraParaOrdenar[$j+1]) 
                { 
                    $elementoAtual = $arraParaOrdenar[$j]; //Crio um auxiliar
                    $arraParaOrdenar[$j] = $arraParaOrdenar[$j+1]; //Na posição atual, coloco o próximo elemento que é menor
                    $arraParaOrdenar[$j+1] = $elementoAtual; //Na próxima posição, insiro o elementoAtual
                } 
            } 
        }
    }
}
