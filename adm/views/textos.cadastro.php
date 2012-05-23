<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(2);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoTexto', $id);

$form = new bwForm($i);
$form->addInputID();
$form->addSelectDB('idproduto', 'Produto', array('where' => 'status >= 0'));
$form->addInput('titulo');
$form->addEditorHTML('html');
$form->addInputFileImg();
$form->addInputInteger('ordem');
$form->addStatus();

$form->addBottonSalvar('textoSave');
$form->addBottonRemover('textoRemover');
$form->show();
?>
