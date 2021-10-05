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
$convenio = $_POST['convenio'];
$sql = 'select * from asignacions where id_convenio = "' . $convenio . '"';
$cn = DataBase::getInstancia();
$stmp = $cn->prepare($sql);
$stmp->execute();
$reportes = $stmp->fetchAll();

$sql2 = 'select * from convenios where id = "' . $convenio . '"';
$stmp2 = $cn->prepare($sql2);
$stmp2->execute();
$reportes2 = $stmp2->fetchAll();

require('../app/libreria/fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
// create document
$pdf->AddPage();
// config document
$pdf->Image('https://itsjba.edu.ec/pwitsjba/wp-content/uploads/2021/06/logoT.png', 7, 7, 45, 0, 'PNG');
$pdf->Image('img/logopractica.png', 160, 7, 46, 0, 'PNG');
$pdf->Image('img/pie.png', 133, 277, 79, 0, 'PNG');
$pdf->SetTitle('Reporte');
$pdf->SetAuthor('Kodetop');
$pdf->SetCreator('FPDF Maker');

// add title
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode(' '), 0, 1, "C");
$pdf->Cell(0, 10, utf8_decode(' '), 0, 1, "C");
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('REPORTE DE LOS ESTUDIANTES DE PRACTICAS'), 0, 1, "C");
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Entidad receptora ' . $reportes2[0]['entidad_receptora']), 0, 1, "");
$pdf->Ln();
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont("Arial", "B", 8);

$pdf->Cell(25, 10, utf8_decode("ID"), 1, 0, "C");

$pdf->Cell(70, 10, utf8_decode("NOMBRE COMPLETO"), 1, 0, "C");

$pdf->Cell(45, 10, utf8_decode("CEDULA"), 1, 0, "C");

$pdf->Cell(50, 10, utf8_decode("CORREO ELECTRONICO"), 1, 1, "C");

foreach ($reportes as $reporte) {


    $sql3 = 'select * from users where id = "' . $reporte['id_estudiante'] . '"';
    $stmp3 = $cn->prepare($sql3);
    $stmp3->execute();
    $reportes3 = $stmp3->fetchAll();

    $pdf->SetFont("Arial", "", 8);

    $pdf->Cell(25, 10, utf8_decode($reportes3[0]['id']), 1, 0, "C");

    $pdf->Cell(70, 10, utf8_decode($reportes3[0]['name']), 1, 0, "C");

    $pdf->Cell(45, 10, utf8_decode($reportes3[0]['cedula']), 1, 0, "C");

    $pdf->Cell(50, 10, utf8_decode($reportes3[0]['email']), 1, 1, "C");
}
// output file
$pdf->Output('', 'fpdf-complete.pdf');
$pdf = new PDF("P", "mm", "letter");
