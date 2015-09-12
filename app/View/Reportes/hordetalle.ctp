<?php
//echo json_encode($asignaciones);
//die();
$ultima_asignatura='';
foreach ($asignaciones as $asignacion) {
    $as[$asignacion['Asignatura']['id']][$asignacion['Asignacione']['seccion']]['ciclo']=$ciclo['Ciclo']['tipo'].'/'.$ciclo['Ciclo']['anio'];
    $as[$asignacion['Asignatura']['id']][$asignacion['Asignacione']['seccion']]['codigo']=$asignacion['Asignatura']['codigo'];
    $as[$asignacion['Asignatura']['id']][$asignacion['Asignacione']['seccion']]['detalle'][]='H0'.$asignacion['Dia']['id'].$asignacion['Horario']['codigofox'];
}

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=hordetalle.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// output the column headings
fputcsv($output, array('F1', 'F2', 'F3', 'F4'));


foreach($as as $id_asig => $datos_as)
{
    foreach($datos_as as $seccion => $datos_as1)
    {
        $row=['0'.$datos_as1['ciclo'],'0'.$seccion, $datos_as1['codigo'], detallehor($datos_as1['detalle'])];
        fputcsv($output, $row);        
    }
}

//print_r($as);

function detallehor($detalles)
{
    $cuenta=count($detalles);
    $ret='';
    
    foreach($detalles as $d)
    {
        $ret.="$d-";
    }
    
    if($cuenta == 1)
    {
        $ret.="    -    ";
    }
    elseif($cuenta == 2)
    {
        $ret.="    -";
    }        
    elseif($cuenta >= 3)
    {
        $ret=corta_final($ret,1);
    }    
    
    return $ret;
}

function corta_final($cadena, $numc)
{
    return substr($cadena, 0, strlen($length) - $numc);
}

exit;

