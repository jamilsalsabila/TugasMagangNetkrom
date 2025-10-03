<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('Hello world');

$dompdf-> setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();
?>
