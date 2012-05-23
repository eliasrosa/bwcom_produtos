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
$form->addEditorHTML('descricao');
$form->addSelectDB('idfabricante', 'ProdutoFabricante');
$form->addSelectDB('idmarca', 'ProdutoMarca');
$form->addBoolean('destaque');
$form->addInputRadio('disponibilidade', array('Indisponível', 'Disponível', 'Sob encomenda'));
$form->addStatus();

$form->addH2('Informações extras');
$form->addInputInteger('quantidade');
$form->addInputMoeda('valorde');
$form->addInputMoeda('valor');

$form->addH2('Informações para o frete');
$form->addSelectDB('idprazo', 'ProdutoPrazo');
$form->addInputInteger('peso');
$form->addInputMoeda('frete');

if($i->id)
{
	$form->addH2('Categorias relacionadas ao produto');
	$form->addCustonFile('produtos.categorias.php');

	$form->addH2('Imagens do produto');
	$form->addCustonFile('produtos.imagens.php');
	
	$form->addH2('Textos adicionais');
	$form->addCustonFile('produtos.textos.php');		
	
	$form->addH2('Opções de escolha');
	$form->addCustonFile('produtos.opcoes.php');
}

$form->addH2('SEO - Buscadores de sites');
$form->addSeo();

$form->addBottonSalvar('produtoSave');
$form->addBottonRemover('produtoRemover');
$form->show();

?>
