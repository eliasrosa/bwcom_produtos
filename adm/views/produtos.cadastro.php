<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(0);

$id = bwRequest::getVar('id', 0, 'get');
$i = bwComponent::openById('Produto', $id);

$blockEdit = $i->status >= 0 ? false : true;

$form = new bwForm($i, '', 'post', $blockEdit);
$form->addH2('Dados do produto');
$form->addInputID();
$form->addInput('nome');
$form->addInput('referencia');
$form->addTextArea('descricao');
$form->addBoolean('destaque');
$form->addStatus();

$form->addH2('Imagem principal');
$form->addInputFileImg();

$form->addH2('Categorias relacionadas ao produto');
$form->addCustonFile('produtos.categorias.php');

$form->addSeo();

$form->addBottonSalvar('produtoSalvar');
$form->addBottonRemover('produtoRemover');
$form->show();

