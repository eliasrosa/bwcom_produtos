<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(4);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoFabricante', $id);

$form = new bwForm($i);
$form->addH2('Dados do fabricante');
$form->addInputID();
$form->addInput('nome');
$form->addEditorHTML('descricao');
$form->addInputFileImg();
$form->addStatus();

$form->addBottonSalvar('fabricanteSave');
$form->addBottonRemover('fabricanteRemover');
$form->show();
?>
