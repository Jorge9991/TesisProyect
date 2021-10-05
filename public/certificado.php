<?php

$id = $_POST['user'];
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];


require 'phpqrcode/qrlib.php';

$dir = 'temp/';
if(!file_exists($dir))
    mkdir($dir);

$filename = $dir.$id.$codigo.'krieger.png';
$tamano = 100;
$level = 'Q';
$frameSize = 3;
$contenido = 'http://localhost/TesisProyect/public/proceso_estudiante/'.$id;

QRcode::png($contenido,$filename,$level,$frameSize);



setlocale(LC_TIME, 'es_ES.UTF-8');
date_default_timezone_set('America/Guayaquil');
$fecha = strftime("%d de %B del %Y");
require('../app/libreria/fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
// create document

$pdf->AddPage();
// config document
$pdf->Image('img/pdf.png', 0, 0, 210, 0, 'PNG');
$pdf->Image($filename, 40, 220, 30, 0, 'PNG');
$pdf->SetTitle('Reporte');

$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 22, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 10, utf8_decode('Confiere el Presente Certificado a: '), 0, 1, "C");
$pdf->SetFont('Times', 'BI', 22);
$pdf->Cell(0, 16, utf8_decode($nombre), 0, 1, "C");
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 3, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('Al culminar con éxito las prácticas preprofesionales, según lo dispuesto'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('en el RPC-SO-08-No. lll-20 19 Reglamento de Régimen Académico (RRA)'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('y el Consejo de Educación Superior (CES) Artículo 53.- Prácticas'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('preprofesionales y pasantías en las carreras de tercer nivel.- Las prácticas'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('preprofesionales podrán realizarse a lo largo de toda la formación de la'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('carrera, de forma continua o no; mediante planes, programas y/o'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('proyectos cuyo alcance será definido por la IES. Las prácticas deberán ser'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('coherentes con los resultados de aprendizaje y el perfil de egreso de las'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('carreras y programas; y, podrán ser registradas y evaluadas según los'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('mecanismos y requerimientos que establezca cada IES.'), 0, 1, "C");
$pdf->Cell(0, 3, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('Según el Artículo 54 la duración de las Prácticas laborales son de 240'), 0, 1, "C");
$pdf->Cell(0, 7, utf8_decode('horas.'), 0, 1, "C");
$pdf->Cell(0, 3, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 7,'Daule, '.$fecha , 0, 1, "C");
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 9, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 10, utf8_decode('_______________________'), 0, 1, "C");
$pdf->Cell(0, 12, utf8_decode('Ing. Javier Sánchez Cegarra'), 0, 1, "C");
$pdf->Cell(0, 8, utf8_decode('Gestor de Practicas Pre profesionales de la Carrera Tecnología en'), 0, 1, "C");
$pdf->Cell(0, 8, utf8_decode('Desarrollo de Software y Programación de Sistemas del'), 0, 1, "C");
$pdf->Cell(0, 16, utf8_decode('IST "JUAN BAUTISTA AGUIRRE"'), 0, 1, "C");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 8, utf8_decode(''), 0, 1, "C");
$pdf->Cell(0, 10, utf8_decode($codigo.'                      '), 0, 1, "R");
$pdf->Ln();
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
// output file
$pdf->Output('', 'fpdf-complete.pdf');
$pdf = new PDF("P", "mm", "letter");
