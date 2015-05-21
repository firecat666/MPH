<?php

if ($xls == 1) {
    $this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);
    $this->PhpExcel->setMetaData('Horarios Verticales');
    $this->PhpExcel->setSheetName('Horarios Verticales');

    $this->PhpExcel->mergeCells('A1', 'F1');
    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ],
        'font' => [
            'bold' => true,
            'size' => 18
        ]
    ];
    $this->PhpExcel->setStyleToRange('A1:F1', $estilo);
    $this->PhpExcel->addTableHeader([['label' => "UNIVERSIDAD POLITECNICA DE EL SALVADOR"]], array('name' => 'Cambria', 'bold' => true));

    $this->PhpExcel->mergeCells('A2', 'F2');
    $this->PhpExcel->addTableHeader([['label' => "HORARIOS DE CLASES CICLO " . $tipos[$asignaciones[0]['Ciclo']['tipo']] . ' ' . $asignaciones[0]['Ciclo']['anio']]], array('name' => 'Cambria', 'bold' => true));
    $this->PhpExcel->mergeCells('A3', 'F3');
    $this->PhpExcel->addTableHeader([['label' => $carrera['Facultade']['nombre']]], array('name' => 'Cambria', 'bold' => true));
    $this->PhpExcel->mergeCells('A4', 'F4');
    $this->PhpExcel->addTableHeader([['label' => "ESCUELA: " . $carrera['Carrera']['nombre']]], array('name' => 'Cambria', 'bold' => true));
    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ],
        'font' => [
            'bold' => true,
            'size' => 14
        ]
    ];
    $this->PhpExcel->setStyleToRange('A2:F4', $estilo);

    $headers = [
        ['label' => 'Nivel', 'width' => 6, 'wrap' => true],
        ['label' => 'Asignatura', 'width' => 50, 'wrap' => true],
        ['label' => 'Seccion', 'width' => 10, 'wrap' => true],
        ['label' => 'Dias', 'width' => 15, 'wrap' => true],
        ['label' => 'Horas', 'width' => 25, 'wrap' => true],
        ['label' => 'Aulas', 'width' => 10, 'wrap' => true]
    ];
    $this->PhpExcel->addTableHeader($headers, array('name' => 'Cambria', 'bold' => true));

    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ],
        'font' => [
            'bold' => true
        ],
        'fill' => [
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => ['rgb' => 'dce6f1']
        ]
    ];
    $this->PhpExcel->setStyleToRange('A5:F5', $estilo);
    $mat = null;
    $sec = null;
    foreach ($asignaciones as $asignacion) {
        $data = [];
        $data[] = $nivelRomanos[$asignacion['Asignatura']['nivel']];

        if ($mat != $asignacion['Asignatura']['id'] || $sec != $asignacion['Asignacione']['seccion']) {
            $data[] = $asignacion['Asignatura']['nombre'];
            $data[] = $asignacion['Asignacione']['seccion'];
            $mat = $asignacion['Asignatura']['id'];
            $sec = $asignacion['Asignacione']['seccion'];
        } else {
            $data[] = '';
            $data[] = '';
        }

        $data[] = $asignacion['Dia']['nombre'];
        $data[] = $asignacion['Horario']['hora'] . ' ' . $asignacion['Horario']['periodo'];
        $data[] = $asignacion['Aula']['nombre'];
        $this->PhpExcel->addTableRow($data);
    }
    $this->PhpExcel->setFormatToRange('C6:C' . $this->PhpExcel->getRow(), '00');
    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ]
    ];
    $this->PhpExcel->setStyleToRange('A6:F' . $this->PhpExcel->getRow(), $estilo);
//var_dump($asignaciones);
    $this->PhpExcel->addTableFooter()->output('Horario Vertical (' . $carrera['Carrera']['nombre'] . ').xlsx');
} else {
    echo $this->Form->create('reporte');
    echo $this->Form->input('carrera', ['type' => 'select', 'options' => $carreras, 'empty' => 'Seleccione Escuela']);
    echo $this->Form->end('Generar');
}