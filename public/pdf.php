<?php

define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASS', '');

define('DB_BASE', 'tesis_proyect');
class DataBase extends PDO
{

    protected static $instancia;

    public static function getInstancia()
    {
        if (empty(self::$instancia)) {
            self::$instancia = new self();
            self::$instancia->exec('SET NAMES utf8');
        }
        return self::$instancia;
    }

    public function __construct($bdtipo = 'mysql')
    {
        switch ($bdtipo) {
            case ' pgsql':
                //DSN (nombre de origen de datos)
                $dsn = 'pgsql:host=' . DB_HOST . ' dbname=' . DB_BASE . ' charset=UTF-8';
                break;
            default:
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_BASE;
                break;
        }
        parent::__construct(
            $dsn,
            DB_USER,
            DB_PASS,
            array(
                PDO::ATTR_PERSISTENT => false, /* Conexiones persistentes, no recomendable para el recolector */
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION /* Throw exception */
            )
        );
    }

    public function __destruct()
    {
        self::$instancia = null;
    }
}

$total = 0;
date_default_timezone_set('America/Lima');
$fecha = date('d-m-Y ');
$user = $_POST['user'];
$usuario = $_POST['usuario'];
$semana = $_POST['semana'];
$sql = 'select * from information where id_estudiante = "' . $user . '" and  semana = "' . $semana . '"';
$cn = DataBase::getInstancia();
$stmp = $cn->prepare($sql);
$stmp->execute();
$reportes = $stmp->fetchAll();

require('../app/libreria/fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
// create document
$dia = 0;

$numerodia = 1;
$celda = 69;
$totaldehoras = 0;
// 240 horas debe cumplir
$pdf->AddPage();
// config document
$pdf->Image('https://itsjba.edu.ec/pwitsjba/wp-content/uploads/2021/06/logoT.png', 7, 7, 45, 0, 'PNG');
$pdf->Image('img/logopractica.png', 243, 7, 46, 0, 'PNG');
$pdf->Image('img/pie.png', 215, 186, 79, 0, 'PNG');
$pdf->Image('img/pie2.png', 115, 189, 70, 0, 'PNG');
$pdf->Image('img/pie3.png', 7, 188, 65, 0, 'PNG');
$pdf->SetTitle('Reporte');

$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode(' '), 0, 1, "C");
$pdf->Cell(0, 10, utf8_decode(' '), 0, 1, "C");
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('REGISTRO SEMANAL DE PRÁCTICAS PRE-PROFESIONALES '), 0, 1, "C");
date_default_timezone_set('America/Lima');
$fecha = date('d-m-Y ');
$pdf->SetFont('Arial', '', 14);

$pdf->MultiCell(0, 7, utf8_decode('Apellidos y Nombres: ' . $usuario), 0, 1);

$pdf->Ln();
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont("Arial", "B", 8);
$pdf->Cell(20, 15, utf8_decode("DIA"), 1, 0, "C");

$pdf->Cell(20, 15, utf8_decode("FECHA"), 1, 0, "C");

$pdf->Cell(25, 15, utf8_decode("HORA ENTRADA"), 1, 0, "C");

$pdf->Cell(25, 15, utf8_decode("HORA SALIDA"), 1, 0, "C");

$pdf->Cell(25, 15, utf8_decode("HORAS DIARIA"), 1, 0, "C");

$pdf->Cell(130, 15, utf8_decode("ACTIVIDAD REALIZADA"), 1, 0, "C");

$pdf->Cell(35, 15, utf8_decode("FIRMA DE TUTOR"), 1, 1, "C");
foreach ($reportes as $reporte) {
    //datos
    $fecha1 = new DateTime($reporte['horas_inicio']); //fecha inicial
    $fecha2 = new DateTime($reporte['horas_fin']); //fecha de cierre
    $intervalo = $fecha1->diff($fecha2);
    $totalhoras =  $intervalo->format('%H'); //00 años 0 meses 0 días 08 horas 0 minutos 0 segundos


    //funcion del internet


    $pdf->SetFont("Arial", "", 8);
    $pdf->SetY($celda);
    
    $pdf->Cell(20, 16, utf8_decode($reporte['dia']), 1, 0, "C");
    
    $totaldehoras = $totalhoras + $totaldehoras;

    $pdf->Cell(20, 16, utf8_decode($reporte['fecha']), 1, 0, "C");

    $pdf->Cell(25, 16, utf8_decode($reporte['horas_inicio']), 1, 0, "C");

    $pdf->Cell(25, 16, utf8_decode($reporte['horas_fin']), 1, 0, "C");

    $pdf->Cell(25, 16, utf8_decode($totalhoras), 1, 0, "C");
    /* Inicio */

    $caracteres = strlen(utf8_decode($reporte['descripcion']));
    if ($caracteres > 101) {
        $pdf->MultiCell(130, 8, utf8_decode($reporte['descripcion']), 1, "C");
    } else {
        $pdf->MultiCell(130, 16, utf8_decode($reporte['descripcion']), 1, "C");
    }


    $pdf->SetY($celda); /* Set 20 Eje Y */
    $pdf->Cell(245, 16, '', 0, 0, "C");
    $pdf->Cell(35, 16, utf8_decode(' '), 1, 1, "C");
    $celda = $celda + 16;
     
   
}
$pdf->Cell(90, 10, utf8_decode("HORAS EN LA SEMANA"), 1, 0, "C");
$pdf->Cell(25, 10, utf8_decode($totaldehoras), 1, 1, "C");
$total = 0;


// output file
$pdf->Output('', 'fpdf-complete.pdf');
$pdf = new PDF("P", "mm", "letter");
