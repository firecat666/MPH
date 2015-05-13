<?php

//var_dump($asignaciones);
// create new empty worksheet and set default font

$this->PhpExcel->createWorksheet()
        ->setDefaultFont('Calibri', 12);
$this->PhpExcel->setMetaData('Horarios Por Aula');
$table = [];
foreach ($dias as $dia) {
    $table[] = ['label' => $dia];
}

foreach ($asignaciones as $asignacione) {
    $this->PhpExcel->mergeCells('A' . $this->PhpExcel->getRow(), 'F' . $this->PhpExcel->getRow());
    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ],
        'font' => [
            'bold' => true,
            'size' => 22
        ]
    ];
    $this->PhpExcel->setStyleToRange('A' . $this->PhpExcel->getRow() . ':F' . $this->PhpExcel->getRow(), $estilo);

    $this->PhpExcel->addTableHeader([['label' => $asignacione['Aula']['nombre']]], array('name' => 'Cambria', 'bold' => true));
    $this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
    $this->PhpExcel->addTableRow();
}


// add data
/* foreach ($data as $d) {
  $this->PhpExcel->addTableRow(array(
  $d['User']['name'],
  $d['Type']['name'],
  $d['User']['date'],
  $d['User']['description'],
  $d['User']['modified']
  ));
  } */

//$this->PhpExcel->mergeCells('A3', 'A5');
// close table and output
$this->PhpExcel->addTableFooter()->output();
?>