<?php

$this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);
$this->PhpExcel->setMetaData('Matriz Global de Horarios');
$this->PhpExcel->setSheetName('Matriz Global de Horarios');
$table = [0 => ['label' => '', 'width' => 3, 'wrap' => true], 1 => ['label' => '', 'width' => 15, 'wrap' => true]];
foreach ($aulas as $aula) {
    $table[] = ['label' => $aula, 'width' => 25, 'wrap' => true];
}
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
$data = [];
$dia = NULL;
$horario = NULL;
$contHorario = 0;
$rowI = 2;
foreach ($asignaciones as $asignacion) {
    if ($horario != $asignacion['Horario']['id']) {
        $horario = $asignacion['Horario']['id'];
        $data = [0 => $asignacion['Dia']['nombre'], 1 => $asignacion['Horario']['hora'] . ' ' . $asignacion['Horario']['periodo']];
    }
    if ($dia != $asignacion['Dia']['id']) {
        $contHorario = 0;
        $dia = $asignacion['Dia']['id'];
    }
    if (!empty($asignacion['Asignatura']['id'])) {
        $data[] = $asignacion['Asignatura']['nombre'] . "\n0" . $asignacion['Asignacione']['seccion'];
    } else {
        $data[] = "";
    }

    if (count($data) == (count($aulas) + 2)) {
        $this->PhpExcel->addTableRow($data);
        $contHorario++;

        if ($contHorario == $totalHorarios) {
            $dia = $asignacion['Dia']['id'];
            $this->PhpExcel->mergeCells('A' . $rowI, 'A' . ($this->PhpExcel->getRow() - 1));
            $rowI = (int) $this->PhpExcel->getRow();
        }
    }
}
$estilo = [
    'alignment' => [
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 90
    ],
    'font' => [
        'bold' => true,
        'size' => 14
    ],
    'fill' => [
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => ['rgb' => 'dce6f1']
    ]
];
$this->PhpExcel->setStyleToRange('A1:A' . $this->PhpExcel->getRow(), $estilo);

$estilo = [
    'alignment' => [
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'wrap' => true
    ]
];
$this->PhpExcel->setStyleToRange('B2:' . $this->PhpExcel->getColumn() . $this->PhpExcel->getRow(), $estilo);
$this->PhpExcel->addTableFooter()->output('Matriz Global de Horarios.xlsx');
