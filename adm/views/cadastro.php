<?
defined('BW') or die("Acesso negado!");

// menu
echo bwAdm::createHtmlSubMenu(0);
$com = bwRequest::getVar('com');
$id = bwRequest::getInt('id');

//js
bwHtml::js(BW_URL_COMPONENTS . '/' . $com .'/adm/js/produtos/cadastro.js');

// form
$i = bwComponent::openById('Produto', $id);
$form = new bwForm($i, bwRouter::_('/produtos/task'));
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
$form->addCustonFile(dirname(__FILE__) .DS. 'select.php');
$form->addSeo();
$form->addBottonSalvar('produtoSalvar');
$form->addBottonRemover('produtoRemover');
$form->show();