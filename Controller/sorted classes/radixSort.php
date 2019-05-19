<?php
require_once("Controller\controleArray.class.php");
require_once("Controller\sorted classes\countSort.php");

class RadixSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $radixOrdenation = new RadixSort();
        $radixOrdenation->numeroDeElementos = count($arrayParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();

        $radixOrdenation->array = $this->radix_sort($arrayParaOrdenar, $radixOrdenation);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;

        $radixOrdenation->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        return $radixOrdenation;
    }

    private function radix_sort($arrayParaOrdenar, &$objRadixSort)
    {
        $bucket = array_fill(0, 9, array());
        $maiorNumDeDigito = 0;
        
        //Determinamos o número máximo de digitos no array recebido
        foreach($arrayParaOrdenar as $value)
        {
            $numeroDeDigitos = strlen((string)$value);
            if($numeroDeDigitos > $maiorNumDeDigito)
                $maiorNumDeDigito = $numeroDeDigitos;
        }

        $nextSigFig = false;
        for($k = 0; $k < $maiorNumDeDigito; $k++)
        {
            for($i=0; $i < $objRadixSort->numeroDeElementos; $i++)
            {
                $objRadixSort->numeroComparacoes++;
                if(!$nextSigFig)
                    $bucket[ $arrayParaOrdenar[$i]%10] [] =  $arrayParaOrdenar[$i];
                else
                    $bucket[floor(($arrayParaOrdenar[$i]/pow(10,$k)))%10][] =  $arrayParaOrdenar[$i];
            }

            //Resetamos o array de entrada e carregamos
            //os valores do bucket
            $arrayParaOrdenar = array();
            for($j = 0; $j < count($bucket); $j++)
            {
                foreach($bucket[$j] as $value){
                    $arrayParaOrdenar[] = $value;
                }
            }
            //Resetamos o bucket
            $bucket = array_fill(0, 9, array());

            //Pegamos o próximo digito significativo
            $nextSigFig = true;
        }
        return $arrayParaOrdenar;
    }
}