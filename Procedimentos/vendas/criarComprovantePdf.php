<?php
// Carregar dompdf
require_once '../../lib/dompdf/autoload.inc.php';


use Dompdf\Dompdf;

$id=$_GET['idvenda']; // Via URL - Método GET

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $dados = curl_exec($ch);
    curl_close($ch);

    return $dados;
}

 $html=file_get_contents("http://localhost:8050/SistemaVendas/Views/vendas/comprovanteVendaPdf.php?idvenda=".$id);

// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF();
 
// Definimos o tamanho do papel e orientação.
$pdf->set_paper("a4", "portrait");
 
// Carregar o conteúdo html.
$pdf->load_html(utf8_decode($html));
 
// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('ComprovanteVenda.pdf', array("Attachment"=>0));
// 1 = Download
// 0 = Preview

?>




