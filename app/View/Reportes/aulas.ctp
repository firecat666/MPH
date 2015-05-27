<?php

if ($xls == 1) {
    $this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);
    $this->PhpExcel->setMetaData('Horarios Por Aula');
    $this->PhpExcel->setSheetName('Horarios Por Aula');
    $table = [];
    foreach ($dias as $dia) {
        $table[] = ['label' => $dia, 'width' => 25, 'wrap' => true];
    }
    $aula = null;
    $horario = null;
    $data = [];
    foreach ($asignaciones as $asignacione) {
        if ($asignacione['Asignacione']['estado'] == 1) {
            if ($asignacione['Asignacione']['aula_id'] != $aula) {
                $this->PhpExcel->addTableRow([]);
                $aula = $asignacione['Asignacione']['aula_id'];
                $this->PhpExcel->mergeCells('A' . $this->PhpExcel->getRow(), 'F' . $this->PhpExcel->getRow());
                $estilo = [
                    'alignment' => [
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
                    ],
                    'font' => [
                        'bold' => true,
                        'size' => 22
                    ],
                    'fill' => [
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => ['rgb' => 'dce6f1']
                    ]
                ];
                $this->PhpExcel->setStyleToRange('A' . $this->PhpExcel->getRow() . ':F' . $this->PhpExcel->getRow(), $estilo);

                $this->PhpExcel->addTableHeader([['label' => $asignacione['Aula']['nombre']]], array('name' => 'Cambria', 'bold' => true));
                $this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
            }
            if ($asignacione['Asignacione']['horario_id'] != $horario) {
                $horario = $asignacione['Asignacione']['horario_id'];
                $data = [];
            }
            if (!empty($asignacione['Asignacione']['asignatura_id'])) {
                $data[] = $asignacione['Asignatura']['nombre'] .
                        "\n0" . $asignacione['Asignacione']['seccion'] .
                        "\n " . $asignacione['Horario']['hora'] .
                        " " . $asignacione['Horario']['periodo'];
            } else {
                $data[] = "";
            }
            if (count($data) == count($dias)) {
                $this->PhpExcel->addTableRow($data);
            }
        }
    }

    $this->PhpExcel->setWrapToRange("A1:F" . $this->PhpExcel->getRow());
    $estilo2 = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        ]
    ];
    $this->PhpExcel->setStyleToRange("A1:F" . $this->PhpExcel->getRow(), $estilo2);

    $this->PhpExcel->addTableFooter()->output('Horarios por Aula.xlsx');
} else {
    echo $this->Form->create('reporte');
    echo $this->Form->input('aula', ['type' => 'select', 'options' => $aulas, 'empty' => 'Seleccione Aula']);
    echo $this->Form->end('Generar');
}