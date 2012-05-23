<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(6);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoPrazo', $id);

$form = new bwForm($i);
$form->addH2('Dados do prazo');
$form->addInputID();
$form->addInput('nome');
$form->addInputInteger('dias');

$form->addBottonSalvar('prazoSave');
$form->addBottonRemover('prazoRemover');
$form->show();
?>
