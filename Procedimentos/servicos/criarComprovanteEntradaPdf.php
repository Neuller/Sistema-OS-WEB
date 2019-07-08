<?php
// Carregar dompdf
require_once '../../lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$id=$_GET['idserv']; // Via URL - Método GET

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

 $html=file_get_contents("http://localhost:8050/SistemaVendas/Views/servicos/comprovanteServicoEntradaPdf.php?idserv=".$id);

// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF();
 
// Definimos o tamanho do papel e orientação.
$pdf->set_paper("a4", "portrait");
 
// Carregar o conteúdo html.
$pdf->load_html($html);
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('ComprovanteEntrada.pdf', array("Attachment"=>0));

?>




