<?php
    require_once("Controller\sorted classes\bubbleSort.php");
    require_once("Controller\sorted classes\insertionSort.php");
    require_once("Controller\sorted classes\selectionSort.php");
    require_once("Controller\sorted classes\heapSort.php");
    require_once("Controller\sorted classes\mergeSort.php");
    require_once("Controller\sorted classes\quickSort.php");
    require_once("Controller\sorted classes\countSort.php");
    require_once("Controller\sorted classes\bucketSort.php");
    require_once("Controller\sorted classes/radixSort.php");

    const QTD_ARRAY_PARA_CRIAR = 5;
    const QTD_ITENS_POR_ARRAY = [50, 100, 150, 200, 250];
    $arraysParaOrdenar = Array();

    for ($i=0; $i < QTD_ARRAY_PARA_CRIAR; $i++) { 
        $arraysParaOrdenar[] = ControleArray::montarArray(QTD_ITENS_POR_ARRAY[$i]);
        ControleArray::popularArray($arraysParaOrdenar[$i]);
    }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Comparação dos métodos de ordenação</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        
        <script src="code/highcharts.js"></script>
        <script src="code/modules/exporting.js"></script>
        <script src="code/modules/export-data.js"></script>
	</head>
	<body>
        <div class="container">
            <?php
                /*
                    Daqui para baixo começo a criar as instâncias
                    para cada método de ordenação. Para cada array
                    ordenado, é retornado um objeto do tipo do mé-
                    todo de ordenação, esse objeto é armazenado
                    numa lista de objetos e no fim de cada ordena-
                    ção os arrays ordenados ordeno a lista de ob-
                    jetos.
                */
        
                $bubbleList = Array(); //bubble Sort
                for ($bubble=0; $bubble < count($arraysParaOrdenar); $bubble++)
                { 
                    $bubbleSort = new bubbleSort();
                    $bubbleSort = $bubbleSort->ordenarArray($arraysParaOrdenar[$bubble]);
                    $bubbleList[] = $bubbleSort;
                }
                ControleArray::ordernarArrayDeObjetos($bubbleList);
                
                
                $insertionList = Array(); //Insertion Sort
                for ($insertion=0; $insertion < count($arraysParaOrdenar); $insertion++)
                { 
                    $insertionSort = new InsertionSort();
                    $insertionSort = $insertionSort->ordenarArray($arraysParaOrdenar[$insertion]);
                    $insertionList[] = $insertionSort;
                }
                ControleArray::ordernarArrayDeObjetos($insertionList);

                
                $selectionList = Array(); //Selection Sort
                for ($selection=0; $selection < count($arraysParaOrdenar); $selection++)
                { 
                    $selectionSort = new SelectionSort();
                    $selectionSort = $selectionSort->ordenarArray($arraysParaOrdenar[$selection]);
                    $selectionList[] = $selectionSort;
                }
                ControleArray::ordernarArrayDeObjetos($selectionSort);

                
                $heapList = Array(); //Heap Sort
                for ($heap=0; $heap < count($arraysParaOrdenar); $heap++)
                { 
                    $heapSort = new HeapSort();
                    $heapSort = $heapSort->ordenarArray($arraysParaOrdenar[$heap]);
                    $heapList[] = $heapSort;
                }
                ControleArray::ordernarArrayDeObjetos($heapList);

                
                $mergeList = Array(); //Merge Sort
                for ($merge=0; $merge < count($arraysParaOrdenar); $merge++)
                { 
                    $mergeSort = new MergeSort();
                    $mergeSort = $mergeSort->ordenarArray($arraysParaOrdenar[$merge]);
                    $mergeList[] = $mergeSort;
                }
                ControleArray::ordernarArrayDeObjetos($mergeList);

                
                $quickList = Array(); //Quick Sort
                for ($quick=0; $quick < count($arraysParaOrdenar); $quick++)
                { 
                    $quickSort = new QuickSort();
                    $quickSort = $quickSort->ordenarArray($arraysParaOrdenar[$quick]);
                    $quickList[] = $quickSort;
                }
                ControleArray::ordernarArrayDeObjetos($quickList);

            
                $countList = Array(); //Count Sort
                for ($count=0; $count < count($arraysParaOrdenar); $count++)
                { 
                    $countSort = new CountSort();
                    $countSort = $countSort->ordenarArray($arraysParaOrdenar[$count]);
                    $countList[] = $countSort;
                }
                ControleArray::ordernarArrayDeObjetos($countList);

                
                $bucketList = Array(); //Bucket Sort
                for ($bucket=0; $bucket < count($arraysParaOrdenar); $bucket++)
                { 
                    $bucketSort = new BucketSort();
                    $bucketSort = $bucketSort->ordenarArray($arraysParaOrdenar[$bucket]);
                    $bucketList[] = $bucketSort;
                }
                ControleArray::ordernarArrayDeObjetos($bucketList);

                
                $radixList = Array(); //Radix Sort
                for ($radix=0; $radix < count($arraysParaOrdenar); $radix++)
                { 
                    $radixSort = new BucketSort();
                    $radixSort = $radixSort->ordenarArray($arraysParaOrdenar[$radix]);
                    $radixList[] = $radixSort;
                }
                ControleArray::ordernarArrayDeObjetos($radixList);
            ?>

            <section id="line-graphic">
                <!-- Container do gráfico de linhas -->
                <div id="container-linha" style="min-width: 30px; height: 700px; margin: 0 auto">
                </div>
                
                <script type="text/javascript">
                    Highcharts.chart('container-linha', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Comparativo entre algoritmos de ordenação'
                        },
                        subtitle: {
                            text: 'Modelo dos gráficos: www.highcharts.com'
                        },
                        xAxis: {
                            title: {
                                text: 'Quantidade de entradas'
                            },
                            categories: [
                                
                                <?php
                                
                                    //O número de elementos é o mesmo para todos os métodos de ordenação
                                    //Como eu ordeno os arrays pelo número de elementos, então
                                    // não faz diferenteça de onde pegarei a quantidade de itens
                                    for ($j=0; $j < count($bubbleList); $j++) { 
                                        echo $bubbleList[$j]->numeroDeElementos . ', ';
                                    }
                                ?>
                            ]
                        },
                        yAxis: {
                            title: {
                                text: 'Tempo de execução aproximado (ms)'
                            }
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: true
                            }
                        },
                        series: [
                            {
                            name: 'Bubble Sort',
                            data: [
                            
                                <?php
                                    for ($i=0; $i < count($bubbleList); $i++) 
                                    { 
                                        echo $i == sizeof($bubbleList) - 1 ? 
                                            $bubbleList[$i]->tempoParaOrdenar . '' : $bubbleList[$i]->tempoParaOrdenar . ', ';
                                    }
                                ?>
                                ]
                        }, {
                            name: 'Insertion Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($insertionList); $i++) 
                                { 
                                    echo $i == sizeof($insertionList) - 1 ? 
                                        $insertionList[$i]->tempoParaOrdenar . '' : $insertionList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>
                            ]
                        }, {
                            name: 'Selection Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($selectionList); $i++) 
                                { 
                                    echo $i == sizeof($selectionList) - 1 ? 
                                        $selectionList[$i]->tempoParaOrdenar . '' : $selectionList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>
                            ]
                        }, {
                            name: 'Heap Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($heapList); $i++) 
                                { 
                                    echo $i == sizeof($heapList) - 1 ? 
                                        $heapList[$i]->tempoParaOrdenar . '' : $heapList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>

                            ]
                        }, {
                            name: 'Merge Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($mergeList); $i++) 
                                { 
                                    echo $i == sizeof($mergeList) - 1 ? 
                                        $mergeList[$i]->tempoParaOrdenar . '' : $mergeList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>
                            ]
                        }, {
                            name: 'Quick Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($quickList); $i++) 
                                {  
                                    echo $i == sizeof($quickList) - 1 ? 
                                        $quickList[$i]->tempoParaOrdenar . '' : $quickList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>
                            ]
                        }, {
                            name: 'Count Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($countList); $i++) 
                                {  
                                    echo $i == sizeof($countList) - 1 ? 
                                        $countList[$i]->tempoParaOrdenar . '' : $countList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>   
                            ]
                        }, {
                            name: 'Bucket Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($bucketList); $i++) 
                                {  
                                    echo $i == sizeof($bucketList) - 1 ? 
                                        $bucketList[$i]->tempoParaOrdenar . '' : $bucketList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>  
                            ]
                        }, {
                            name: 'Radix Sort',
                            data: [
                            <?php
                                for ($i=0; $i < count($radixList); $i++) 
                                {  
                                    echo $i == sizeof($radixList) - 1 ? 
                                        $radixList[$i]->tempoParaOrdenar . '' : $radixList[$i]->tempoParaOrdenar . ', ';
                                }
                            ?>    
                            ]
                            }
                        ]
                    });
                </script>
            </section>

            <br/>
            <hr/>
            
            <section id="column-graphic">
                <h3 class="text-center">Média de comparação</h3>
                <br/>
                
                <!-- Links de navegação -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php 
                        for ($i = 0; $i < count(QTD_ITENS_POR_ARRAY); $i++):     
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($i == 0) echo 'active'; ?>" 
                            id="<?= 'array'.QTD_ITENS_POR_ARRAY[$i].'-tab' ?>" 
                            data-toggle="tab" 
                            href="<?= '#array'.QTD_ITENS_POR_ARRAY[$i] ?>" role="tab" 
                            aria-controls="<?= 'array'.QTD_ITENS_POR_ARRAY[$i] ?>" 
                            aria-selected="true">Array [<?=number_format(QTD_ITENS_POR_ARRAY[$i], ((int) QTD_ITENS_POR_ARRAY[$i] == QTD_ITENS_POR_ARRAY[$i] ? 0 : 2), ',', '.') ?>]</a>
                        </li>

                    <?php
                        endfor;
                    ?>
                </ul>

                <!-- Tabela com a legenda e gráfico de barras -->
                <div class="tab-content" id="myTabContent">
                    <?php 
                        for ($i = 0; $i < count(QTD_ITENS_POR_ARRAY); $i++):  
                    ?>

                    <div class="tab-pane fade <?php if($i == 0) echo 'show active'; ?>" id="array<?=QTD_ITENS_POR_ARRAY[$i] ?>" 
                        role="tabpanel" aria-labelledby="array<?=QTD_ITENS_POR_ARRAY[$i] ?>-tab">
                        
                        <!-- Tabela de legenda -->
                        <div class="container mt-5 mb-3">
                            <div class="row inline">
                                <table class="table">
                                
                                <tbody>
                                    <tr>
                                        <td>Bubble Sort <span><strong>Média(</strong><?= number_format((double) $bubbleList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i] , 2, '.','')?><strong>)</strong></span></td>
                                        <td>Insertion Sort <span><strong>Média(</strong><?= number_format((double) $insertionList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                        <td>Selection Sort <span><strong>Média(</strong><?= number_format((double) $selectionList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Heap Sort <span><strong>Média(</strong><?= number_format((double) $heapList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                        <td>Merge Sort <span><strong>Média(</strong><?= number_format((double) $mergeList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                        <td>Quick Sort <span><strong>Média(</strong><?= number_format((double) $quickList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                    </tr>

                                    <tr>
                                        <td>Count Sort <span><strong>Média(</strong><?= number_format((double) $countList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                        <td>Bucket Sort <span><strong>Média(</strong><?= number_format((double) $bucketList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                        <td>Radix Sort <span><strong>Média(</strong><?= number_format((double) $radixList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i], 2, '.','') ?><strong>)</strong></span></td>
                                    </tr>
                                </tbody>
                                </table>

                            </div>   
                        </div>

                        <!-- Gráfico de barras -->
                        <div id="container-<?=QTD_ITENS_POR_ARRAY[$i] ?>bar" style="min-width: 30px; height: 500px; margin: 0 auto">
                        </div>
                    </div>

                    <?php
                        endfor;
                    ?>
                </div>
            </section>

        </div>

        <script type="text/javascript">
            <?php 
                for ($i = 0; $i < count(QTD_ITENS_POR_ARRAY); $i++):       
            ?>
            Highcharts.chart('container-<?=QTD_ITENS_POR_ARRAY[$i] ?>bar', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Vetores de tamanho <?=QTD_ITENS_POR_ARRAY[$i] ?>'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Média de comparações'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Média de comparações: <b>{point.y:.1f}</b>'
                },
                series: [{
                    name: 'Média',
                    data: [
                        ['Bubble Sort', 
                        <?=
                            (double) $bubbleList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                         ],

                        ['Insertion Sort', 
                        <?=
                           (double) $insertionList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Selection Sort', 
                        <?=
                            (double)$selectionList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Heap Sort', 
                        <?=
                            (double)$heapList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Merge Sort', 
                        <?=
                            (double)$mergeList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Quick Sort', 
                        <?=
                            (double)$quickList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],
                        
                        ['Count Sort', 
                        <?=
                            (double)$countList[$i]->numeroComparacoes  / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Bucket Sort', 
                        <?=
                            (double)$bucketList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ],

                        ['Radix Sort', 
                        <?=
                            (double)$radixList[$i]->numeroComparacoes / QTD_ITENS_POR_ARRAY[$i]
                        ?>
                        ]
                    ],
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
            <?php
                endfor;
            ?>
            </script>
	</body>
</html>
