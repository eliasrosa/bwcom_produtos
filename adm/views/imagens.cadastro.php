<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(1);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('ProdutoImagem', $id);

$form = new bwForm($i);
$form->attrName = 'imagem[%s]';
$form->addInputID();
$form->addSelectDB('idproduto', 'Produto', array('where' => 'status >= 0'));
$form->addInput('nome');
$form->addInput('alt');
$form->addInputFileImg();
$form->addInputInteger('ordem');
$form->addStatus();

$form->addBottonSalvar('imagemSave');
$form->addBottonRemover('imagemRemover');
$form->show();
?>
