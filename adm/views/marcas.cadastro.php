<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(5);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoMarca', $id);

$form = new bwForm($i);
$form->addH2('Dados do marca');
$form->addInputID();
$form->addInput('nome');
$form->addEditorHTML('descricao');
$form->addInputFileImg();
$form->addStatus();

$form->addBottonSalvar('marcaSave');
$form->addBottonRemover('marcaRemover');
$form->show();
?>
