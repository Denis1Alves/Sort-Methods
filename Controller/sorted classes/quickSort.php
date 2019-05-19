<?php
require_once("Controller\controleArray.class.php");

class QuickSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $quickOrdenation = new QuickSort();
        $quickOrdenation->numeroDeElementos = count($arrayParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();

        $quickOrdenation->array = $this->quick_sort($arrayParaOrdenar, $quickOrdenation);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;

        $quickOrdenation->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        return $quickOrdenation;
    }

    private function quick_sort($arrayParaOrdenar, &$objquickSort)
    {
        $arrayLeft = $arrayRight = array();
        
        $objquickSort->numeroComparacoes++;
        if(count($arrayParaOrdenar) < 2)
        {
            return $arrayParaOrdenar;
        }
        
        //Pego a chave (indice) da posição atual do array
        $pivo_key = key($arrayParaOrdenar);
        
        //Retiro o primeiro elemento do array e o retorno para
        //a variavel pivo
        $pivo = array_shift($arrayParaOrdenar);
        
        //Percorro todo o array de entrada
        //olhando só para o seu valor
        foreach($arrayParaOrdenar as $val)
        {
            //Se o valor do array de entrada for MENOR ou IGUAL
            //ao indice pivo, adiciono o valor ao array da ESQUERDA
            if($val <= $pivo)
            {
                $objquickSort->numeroComparacoes++;
                $arrayLeft[] = $val;
            }
    
            //Se o valor do array de entrada for MAIOR
            //ao indice pivo, adiciono o valor ao array da DIREITA
            elseif ($val > $pivo)
            {
                $objquickSort->numeroComparacoes++;
                $arrayRight[] = $val;
            }
        }
        
        //Retorno o merge do array da esquerda + 
        //array da direita
        return array_merge(
            $this->quick_sort($arrayLeft, $objquickSort),
            array($pivo_key=>$pivo),
            $this->quick_sort($arrayRight, $objquickSort)
        );
    }
}