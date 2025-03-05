<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    require_once('session.php');
    $proyek = $_REQUEST['uid'];
    $_COOKIE['uid'] = $proyek;
    $query1 = "SELECT * FROM proyek WHERE id_proyek='$proyek'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($result1);

    include dirname(__FILE__) . '/kajiulangrev_getpdf.php';
    $content = ob_get_clean();
    $html2pdf = new Html2Pdf('L', 'A4', 'en');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->setDefaultFont('helvetica');
    $html2pdf->pdf->setTitle($row1['no_proyek'] . '-Kajiulang Permintaan');
    // $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->output($row1['no_proyek'] . '-Kajiulang Permintaan.pdf', 'I');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}