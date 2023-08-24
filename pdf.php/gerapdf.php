<?php

include_once '../controller/ClienteController.php';
include_once '../controller/LocacaoController.php';
include_once 'mpdf/mpdf.php';

$cc = new ClienteController();
$cliente = $cc->listaClienteId($_REQUEST['id']);

$endereco = $cliente->getEndereco();
$telefones = $cliente->getTelefones();
$telefone1 = $telefones[0];
$telefone2 = $telefones[1];

$nomeCliente = $cliente->getNome();
$cpf = $cliente->getCpf();
$tel1 = $telefone1;
$tel2 = $cc->validaTelefone($telefone2);
$cidade = $endereco->getCidade();
$rua = $endereco->getRua();
$numero = $endereco->getNumero();

$lc = new LocacaoController();
$objetos = $lc->listaLocacoesFitaId($_REQUEST['id']);
$locacao = $objetos[0];

$cliente = $locacao->cliente();
$filme = $locacao->midia();
$valor = "R$" . number_format($locacao->getValor(), 2);
$multa = "R$" . number_format($locacao->getMulta(), 2);
$dataL = $locacao->getDataLocacao();
$dataE = $locacao->getDataEntrega();


$pagina ="
<html>
<body>
<h1>Vintage Locadora</h1>
<h2>Histórico de Locações de Clientes</h2>

<h3>Dados do Cliente</h3>

<table>
  <tr>
    <th>Nome</th>
    <th>CPF</th>
    <th>Telefone 1</th>
    <th>Telefone 2</th>
    <th>Cidade</th>
    <th>Rua</th>
    <th>Numero</th>
  </tr>
  <tr>
    <td>$nomeCliente</td>
    <td>$cpf</td>
    <td>$tel1</td>
    <td>$tel2</td>
    <td>$cidade</td>
    <td>$rua</td>
    <td>$numero</td>
  </tr>
</table>

<h3>Histórico de Locações de Fita</h3>

<table>
  <tr>
    <th>Nome do Cliente</th>
    <th>Filme Locado</th>
    <th>Valor da Locação</th>
    <th>Multa</th>
    <th>Data da Locação</th>
    <th>Data de Entrega</th>
  </tr>
  <tr>
    <td>$cliente</td>
    <td>$filme</td>
    <td>$valor</td>
    <td>$multa</td>
    <td>$dataL</td>
    <td>$dataE</td>
  </tr>
</table>
</body>
</html>
";

$arquivo ='vintage.pdf';
$pdf = new mPDF();
$css = file_get_contents('css/estilo.css');
$pdf->WriteHTML($css, 1);
$pdf->WriteHTML($pagina);
$pdf->Output($arquivo, 'I');

?>


https://pt.stackoverflow.com/questions/185249/gerando-pdf-com-a-classe-mpdf