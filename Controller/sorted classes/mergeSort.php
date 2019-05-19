<?php
require_once("Controller\controleArray.class.php");

class MergeSort extends ControleArray{

    public function ordenarArray($arraParaOrdenar)
    {
        $mergeOrdenado = new MergeSort();
        $mergeOrdenado->numeroDeElementos = count($arraParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();

        $mergeOrdenado->array = $this->merge_sort($arraParaOrdenar, $mergeOrdenado);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;

        $mergeOrdenado->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        return $mergeOrdenado;
    }

    private function merge_sort($array, &$objMergeSort)
    {
        if(count($array) == 1 ) return $array;
    
        $mid = count($array) / 2;
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);
    
        $left = $this->merge_sort($left, $objMergeSort);
        $right = $this->merge_sort($right, $objMergeSort);
        
        return $this->merge($left, $right, $objMergeSort);
    }
    
    private function merge($left, $right, &$objMergeSort)
    {
        $result=array();
        $leftIndex=0;
        $rightIndex=0;
    
        while($leftIndex<count($left) && $rightIndex<count($right))
        {
            $objMergeSort->numeroComparacoes++;
            if($left[$leftIndex]>$right[$rightIndex])
            {
                $result[]=$right[$rightIndex];
                $rightIndex++;
            }
            else
            {
                $result[]=$left[$leftIndex];
                $leftIndex++;
            }
        }

        while($leftIndex<count($left))
        {
            $result[]=$left[$leftIndex];
            $leftIndex++;
        }
        while($rightIndex<count($right))
        {
            $result[]=$right[$rightIndex];
            $rightIndex++;
        }
        return $result;
    }
}
