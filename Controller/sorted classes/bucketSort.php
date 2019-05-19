<?php
require_once("Controller\controleArray.class.php");
require_once("Controller\sorted classes\countSort.php");

class BucketSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $bucketOrdenation = new BucketSort();
        $bucketOrdenation->numeroDeElementos = count($arrayParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();

        $bucketOrdenation->array = $this->bucket_sort($arrayParaOrdenar, $bucketOrdenation);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;

        $bucketOrdenation->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        return $bucketOrdenation;
    }

    private function bucket_sort($arrayParaOrdenar, &$objbucketSort)
    {
        $minValue = min($arrayParaOrdenar);
        $maxValue = max($arrayParaOrdenar);

        //Criamos o array de buckets
        $bucketArray = array();

        //Setamos o tamanho dele (maior valor de entrada - menor valor da entrada + 1)
        $bucketLength = $maxValue - $minValue + 1;
        
        //Para cada bucket, criamos um array vazio
        for ($i = 0; $i < $bucketLength; $i++)
        {
            $bucketArray[$i] = array();
        }

        //É aqui que ordenamos os buckets
        //Por exemplo:
        /*
            $i == 0
            $minValue == 14
            $arrayParaOrdenar[$i] == 20 
            $bucketArray [$arrayParaOrdenar[$i] - $minValue] == (20 - 14) = 6
            $bucketArray[6][lastIndex] = 20 ($arrayParaOrdenar[$i])

            $i == 1
            $minValue == 14
            $arrayParaOrdenar[$i] == 43 
            $bucketArray [$arrayParaOrdenar[$i] - $minValue] == (43 - 14) == 29
            $bucketArray[29][lastIndex] = 43 ($arrayParaOrdenar[$i])
        */
        for ($i = 0; $i < $objbucketSort->numeroDeElementos; $i++)
        {
            array_push(
                $bucketArray[$arrayParaOrdenar[$i] - $minValue], 
                $arrayParaOrdenar[$i]
            );
        }
        

        //Com o array ordenado, só colocamos
        // os buckets dentro do array final
        $k = 0;
        for ($i = 0; $i < $bucketLength; $i++)
        {
            
            $bucketCount = count($bucketArray[$i]);
            
            //Verificamos se a linha da matriz não está vazia
            //se ela não estiver, significa que há buckets
            $objbucketSort->numeroComparacoes++;
            if ($bucketCount > 0)
            {
                for ($j = 0; $j < $bucketCount; $j++)
                {
                    $arrayParaOrdenar[$k] = $bucketArray[$i][$j];
                    $k++;
                }
            }
        }
        return $arrayParaOrdenar;
    }
}