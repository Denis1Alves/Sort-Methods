<?php

abstract class ControleArray{
    

    public $numeroDeElementos = 0;
    public $numeroComparacoes = 0;
    public $tempoParaOrdenar = 0;
    public $array;

    private static $maxElementosPorLinha = 60;
    private static $numeroDeImpressoes = 0;
   

    public static function montarArray($numeroElementos)
    {
        //Preencho o array startando do indice 0,
        //preenchendo todos os elementos dele ($numeroDeElementos)
        //com o valor 0
        return array_fill(0, $numeroElementos, 0);
    }

    public static function popularArray(&$array)
    {
        for ($i = 0; $i < count($array); $i++) { 
            $array[$i] = self::gerarRandom();
        }
    }

    public static function gerarRandom()
    {
        return rand(1, 999);
    }

    protected function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public static function imprimeArray($array)
    {
        echo sizeof($array);
        for ($i=0; $i < sizeof($array); $i++) { 

            echo $i == sizeof($array) - 1 ? 
                $array[$i].'' : $array[$i].', ';

            if(self::$numeroDeImpressoes == self::$maxElementosPorLinha)
            {
                echo '<br/>';
                self::$numeroDeImpressoes = 0;
            }
            self::$numeroDeImpressoes++;
        }
        
    }

    public abstract function ordenarArray($arraParaOrdenar);

    //Ordena um array de objetos que foi herdado dessa mesma classe
    public static function ordernarArrayDeObjetos(&$arrayDeObjetos){

        for($i = 0; $i < count($arrayDeObjetos); $i++)  
        { 
            // Os últimos elementos 'i' já estão no lugar, ou seja
            // Parte do pré suposto que os ultimós elementos já estão ordenados
            for ($j = 0; $j < count($arrayDeObjetos) - $i - 1; $j++)  
            { 
                // Percorre o array a partir do indece 0 até (numElementos - i - 1)
                // Troca se o elemento encontrado e maior do 
                // que o próximo elemento
                if ($arrayDeObjetos[$j]->numeroDeElementos > $arrayDeObjetos[$j+1]->numeroDeElementos) 
                { 
                    $elementoAtual = $arrayDeObjetos[$j]; //Crio um auxiliar
                    $arrayDeObjetos[$j] = $arrayDeObjetos[$j+1]; //Na posição atual, coloco o próximo elemento que é menor
                    $arrayDeObjetos[$j+1] = $elementoAtual; //Na próxima posição, insiro o elementoAtual
                } 
            } 
        }
    }
}