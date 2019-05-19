<?php
require_once("Controller\controleArray.class.php");

class CountSort extends ControleArray{

    public function ordenarArray($arrayParaOrdenar)
    {
        $countOrdenation = new CountSort();
        $countOrdenation->numeroDeElementos = count($arrayParaOrdenar); 
        $tempoDeInicio = $this->microtime_float();
        
        
        $countOrdenation->array = $this->count_Sort($arrayParaOrdenar, $countOrdenation);

        //Ordenei, coleto o tempo percorrido
        $tempoFinal = $this->microtime_float();
        $diferencaTempo = $tempoFinal - $tempoDeInicio;

        $countOrdenation->tempoParaOrdenar = number_format($diferencaTempo, 6, '.','');
        return $countOrdenation;
    }

    private function count_Sort($arrayParaOrdenar, &$objCountSort) 
    { 
        //Array auxiliar para contagem dos elementos
        $countArray = array();

        //MAIOR valor presente no array
        $menorValor = min($arrayParaOrdenar);

        //MAIOR valor presente no array
        $maiorValor = max($arrayParaOrdenar);

        //Preencho o array de contagem startando do indice $menorValor,
        //preenchendo todos os elementos dele ($maiorValor + 1)
        //com o valor 0
        $countArray = array_fill($menorValor, $maiorValor + 1, 0);
        
        //Percorremos o array de entrada olhando para o
        //número que está presente no indice
        foreach($arrayParaOrdenar as $number)
        {
            //O array de contagem vai armazenar quantas vezes
            //o número x se repete no array de entrada
            
            //Para tal, o indice do array de contagem equivale
            //ao número que está presente na leitura do array de entrada.
            //Por exemplo:

            /*
                indice                        0    1    2    3    4    
                array de ENTRADA (valore) = | 20 | 30 | 20 | 50 | 30 |

                indice                        20  30  50
                array de CONTAGEM (valore) = | 2 | 2 | 1 |
            */
            $countArray[$number]++; 
        }

        //Agora percorremos o array de contagem a partir
        //do MENOR valor do array de entrada até o
        //MAIOR valor do array de entrada
        $z = 0;
        for($i = $menorValor; $i <= $maiorValor; $i++) {

            //Enquanto a quantidade de repetição de um número
            //x presente no array de contagem[$i] for maior que 0

            //insiro o valor de $i no array de entrada na posição[$z]
            while( $countArray[$i]-- > 0 ) {
                $objCountSort->numeroComparacoes++;
                $arrayParaOrdenar[$z++] = $i;
            }
        }

        return $arrayParaOrdenar;
    }
}