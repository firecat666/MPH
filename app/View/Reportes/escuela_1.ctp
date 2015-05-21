<?php
if ($xls == 1) {
    $this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);
    $this->PhpExcel->setMetaData('Horarios por Escuela y Nivel');
    $this->PhpExcel->setSheetName('Horarios por Escuela y Nivel');
    $table = [];
    foreach ($dias as $dia) {
        $table[] = ['label' => $dia, 'width' => 25, 'wrap' => true];
    }
    $level = 0;
    $horario = null;
    $data = [];
    $dia = 1;
    $first = 1;
    foreach ($asignaciones as $asignacion) {
        var_dump($data);
        if ($asignacion['Asignacione']['horario_id'] != $horario) {
            if (count($data) < count($dias) && $first != 1) {
                $diferencia = count($dias) - count($data);
                for ($i = 0; $i < $diferencia; $i++) {
                    $data[] = "";
                }
                $this->PhpExcel->addTableRow($data);
            }
            $first++;
            $horario = $asignacion['Asignacione']['horario_id'];
            $data = [];
            $dia = 1;
        }
        if ($asignacion['Asignatura']['nivel'] != $level) {
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

            $level = $asignacion['Asignatura']['nivel'];
            $this->PhpExcel->addTableRow(['']);
            $this->PhpExcel->mergeCells('A' . $this->PhpExcel->getRow(), 'E' . $this->PhpExcel->getRow());
            $this->PhpExcel->setStyleToRange('A' . $this->PhpExcel->getRow() . ':F' . $this->PhpExcel->getRow(), $estilo);
            $this->PhpExcel->addTableHeader([
                ['label' => $carrera['Carrera']['nombre']],
                ['label' => ''],
                ['label' => ''],
                ['label' => ''],
                ['label' => ''],
                ['label' => 'Ciclo ' . $nivelRomanos[$asignacion['Asignatura']['nivel']], 'width' => 25, 'wrap' => true]
                    ], array('name' => 'Cambria', 'bold' => true));
            $this->PhpExcel->setStyleToRange('A' . $this->PhpExcel->getRow() . ':F' . $this->PhpExcel->getRow(), $estilo);
            $this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
        }

        if ($asignacion['Asignacione']['dia_id'] == $dia) {
            $data[] = $asignacion['Asignatura']['nombre'] .
                    "\n " . $asignacion['Horario']['hora'] .
                    " " . $asignacion['Horario']['periodo'] .
                    "\n" . $asignacion['Aula']['nombre'] .
                    "      -0" . $asignacion['Asignacione']['seccion'] . '-' . $asignacion['Asignatura']['nivel'];
            $dia++;
        } else {
            $diferencia = $asignacion['Asignacione']['dia_id'] - $dia;
            for ($i = 0; $i < $diferencia; $i++) {
                $dia++;
                $data[] = '';
            }
            $data[] = $asignacion['Asignatura']['nombre'] .
                    "\n " . $asignacion['Horario']['hora'] .
                    " " . $asignacion['Horario']['periodo'] .
                    "\n" . $asignacion['Aula']['nombre'] .
                    "      0" . $asignacion['Asignacione']['seccion'] . '-' . $asignacion['Asignatura']['nivel'];
            $dia++;
        }
        if (count($data) == count($dias)) {
            $this->PhpExcel->addTableRow($data);
        }
    }
    if (count($data) < count($dias) && $first != 1) {
        $diferencia = count($dias) - count($data);
        for ($i = 0; $i < $diferencia; $i++) {
            $data[] = "";
        }
        $this->PhpExcel->addTableRow($data);
    }
    $estilo = [
        'alignment' => [
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'wrap' => true
        ]
    ];
    $this->PhpExcel->setStyleToRange('A1:F' . $this->PhpExcel->getRow(), $estilo);

    $this->PhpExcel->addTableFooter()->output('Horarios por Escuela y Nivel('
            . $carrera['Carrera']['nombre']
            . ' ' . $asignaciones[0]['Ciclo']['anio'] . ' 0' . $asignaciones[0]['Ciclo']['tipo'] . ').xlsx');
} else {
    echo $this->Html->script('reporteEscuela', array('block' => 'mphjs'));
    echo $this->Form->create('reporte');
    echo $this->Form->input('carrera', ['type' => 'select', 'empty' => 'Seleccione Carrera', 'options' => $carreras, 'div' => false, 'label' => false]);
    ?>
    <select id="cbAnio" disabled="disabled">
        <option value="">Seleccione Año</option>
        <?php
        foreach ($ciclos as $ciclo):
            ?>
            <option value="<?php echo $ciclo['Ciclo']['anio']; ?>"><?php echo $ciclo['Ciclo']['anio']; ?></option>
        <?php endforeach; ?>
    </select>
    <?php
    echo $this->Form->input('cbCiclo', ['type' => 'select', 'empty' => 'Seleccione Ciclo', 'div' => false, 'label' => false, 'disabled']);
    echo $this->Form->end('Generar');
}
