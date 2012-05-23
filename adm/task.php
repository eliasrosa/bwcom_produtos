<?
defined('BW') or die("Acesso negado!");

$dados = bwRequest::getVar('dados', array(), 'post');
$imagem = bwRequest::getVar('imagem', array(), 'post');
$textosOrdem = bwRequest::getVar('ordem-textos', array(), 'post');
$imagensOrdem = bwRequest::getVar('ordem-imagens', array(), 'post');



// PRODUTOS
////////////////////////////////////////////////////////////////////////

if($task == 'produtoLista')
{
	$r = bwProdutos::getInstance()->produtoLista();
}

if($task == 'produtoSave')
{
	$r = bwProdutos::getInstance()->produtoSave($dados);
}

if($task == 'produtoRemover')
{
	$r = bwProdutos::getInstance()->produtoRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&view=lista");
}



// IMAGENS
////////////////////////////////////////////////////////////////////////

if($task == 'imagemLista')
{
	$r = bwProdutos::getInstance()->imagemLista();
}

if($task == 'imagemSave')
{
	$r = bwProdutos::getInstance()->imagemSave($imagem);
}

if($task == 'imagemOrdem')
{
	$r = bwProdutos::getInstance()->imagemOrdem($imagensOrdem);
}

if($task == 'imagemRemover')
{
	$r = bwProdutos::getInstance()->imagemRemover($imagem);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=imagens&view=lista");
}




// TEXTOS
////////////////////////////////////////////////////////////////////////

if($task == 'textoLista')
{
	$r = bwProdutos::getInstance()->textoLista();
}

if($task == 'textoSave')
{
	$r = bwProdutos::getInstance()->textoSave($dados);
}

if($task == 'textoRemover')
{
	$r = bwProdutos::getInstance()->textoRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=textos&view=lista");
}

if($task == 'textoOrdem')
{
	$r = bwProdutos::getInstance()->textoOrdem($textosOrdem);
}




// CATEGORIAS
////////////////////////////////////////////////////////////////////////

if($task == 'categoriaSave')
{
	$r = bwProdutos::getInstance()->categoriaSave($dados);
}

if($task == 'categoriaRemover')
{
	$r = bwProdutos::getInstance()->categoriaRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=categorias&view=lista");
}




// FABRICANTES
////////////////////////////////////////////////////////////////////////

if($task == 'fabricanteLista')
{
	$r = bwProdutos::getInstance()->fabricanteLista();
}

if($task == 'fabricanteSave')
{
	$r = bwProdutos::getInstance()->fabricanteSave($dados);
}

if($task == 'fabricanteRemover')
{
	$r = bwProdutos::getInstance()->fabricanteRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=fabricantes&view=lista");
}




// MARCAS
////////////////////////////////////////////////////////////////////////

if($task == 'marcaLista')
{
	$r = bwProdutos::getInstance()->marcaLista();
}

if($task == 'marcaSave')
{
	$r = bwProdutos::getInstance()->marcaSave($dados);
}

if($task == 'marcaRemover')
{
	$r = bwProdutos::getInstance()->marcaRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=marcas&view=lista");
}




// PRAZOS
////////////////////////////////////////////////////////////////////////

if($task == 'prazoLista')
{
	$r = bwProdutos::getInstance()->prazoLista();
}

if($task == 'prazoSave')
{
	$r = bwProdutos::getInstance()->prazoSave($dados);
}

if($task == 'prazoRemover')
{
	$r = bwProdutos::getInstance()->prazoRemover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=prazos&view=lista");
}




die(json_encode($r));
?>
