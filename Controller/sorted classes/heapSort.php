<?php
require_once("Controller\controleArray.class.php");

class HeapSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $heapOrdenado = new HeapSort();
        $heapOrdenado->numeroDeElementos = count($arrayParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();

        $heapOrdenado->array = $this->heap_sort($arrayParaOrdenar, $heapOrdenado);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;
        $heapOrdenado->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        
        return $heapOrdenado;
    }

    private function heap_sort($arrayParaOrdenar, &$objHeapSort)
    {
        // Construo a árvore (rearranja o array) 
        for ($i = $objHeapSort->numeroDeElementos / 2 - 1; $i >= 0; $i--) 
        $this->heapify($arrayParaOrdenar, $objHeapSort->numeroDeElementos, $i, $objHeapSort); 

        // Um por um extrai um elemento da árvore
        for ($i = $objHeapSort->numeroDeElementos-1; $i >= 0; $i--) 
        { 
            // Move o nó corrente para o fim
            $temp = $arrayParaOrdenar[0]; 
            $arrayParaOrdenar[0] = $arrayParaOrdenar[$i]; 
            $arrayParaOrdenar[$i] = $temp; 

            // Chama o max heapify na pilha reduzida
            $this->heapify($arrayParaOrdenar, $i, 0, $objHeapSort); 
        } 
    }

    // Para "amontoar" uma sub árvore raiz com o nó $i o qual 
    // é um indice no array[]. $n é o tamanho da árvore
    private function heapify(&$arr, $n, $i, &$objHeapSort) 
    { 
        $maiorIndice = $i; // Initialize maiorIndice as root 
        $esquerda = 2*$i + 1; // left = 2*i + 1 
        $direita = 2*$i + 2; // right = 2*i + 2 
    
        $objHeapSort->numeroComparacoes++;
        // If left child is larger than root 
        if ($esquerda < $n && $arr[$esquerda] > $arr[$maiorIndice]) 
            $maiorIndice = $esquerda; 
        
        $objHeapSort->numeroComparacoes++;
        // If right child is larger than maiorIndice so far 
        if ($direita < $n && $arr[$direita] > $arr[$maiorIndice]) 
            $maiorIndice = $direita; 
    
        $objHeapSort->numeroComparacoes++;
        // If maiorIndice is not root 
        if ($maiorIndice != $i) 
        { 
            $swap = $arr[$i]; 
            $arr[$i] = $arr[$maiorIndice]; 
            $arr[$maiorIndice] = $swap; 
    
            // Recursively heapify the affected sub-tree 
            $this->heapify($arr, $n, $maiorIndice, $objHeapSort); 
        } 
    }
}
