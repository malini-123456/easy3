<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    require_once('session.php');
    $code = $_REQUEST['kode'];
    $_COOKIE['kode'] = $code;

    include dirname(__FILE__) . '/stiker_getpdf.php';
    $content = ob_get_clean();
    $html2pdf = new Html2Pdf('L', 'A3+', 'en');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->setDefaultFont('helvetica');
    $html2pdf->pdf->setTitle('Stiker_' . $code);
    // $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->output('Stiker_' . $code . '.pdf', 'I');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}