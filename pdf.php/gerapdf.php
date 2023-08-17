<?php
require_once 'vendor/autoload.php'; // Carrega as dependências do Composer

use Mpdf\Mpdf;

// Cria um objeto mPDF
$pdf = new Mpdf();

// Busca os dados do banco de dados (exemplo fictício)
$dadosDoBanco = [
    ['Nome do Produto 1', 'Descrição 1', 'Preço 1'],
    ['Nome do Produto 2', 'Descrição 2', 'Preço 2'],
    // ... e assim por diante
];

// Cria a estrutura HTML com os dados do banco
$html = '<table>';
foreach ($dadosDoBanco as $linha) {
    $html .= '<tr>';
    foreach ($linha as $celula) {
        $html .= '<td>' . $celula . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</table>';

// Gera o PDF a partir do HTML
$pdf->WriteHTML($html);

// Salva o PDF em um arquivo
$pdf->Output('pdf_com_dados_do_banco.pdf', 'F');
?>

