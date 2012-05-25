<?
defined('BW') or die("Acesso negado!");

$dados = bwRequest::getVar('dados', array(), 'post');


// PRODUTOS
////////////////////////////////////////////////////////////////////////

if($task == 'produtoSalvar')
{
	$r = Produto::salvar($dados);
}

if($task == 'produtoRemover')
{
	$r = Produto::remover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&view=lista");
}


// CATEGORIAS
////////////////////////////////////////////////////////////////////////

if($task == 'categoriaSalvar')
{
	$r = ProdutoCategoria::salvar($dados);
}

if($task == 'categoriaRemover')
{
	$r = ProdutoCategoria::remover($dados);
	$r['redirect'] = bwRouter::_("adm.php?com=produtos&sub=categorias&view=lista");
}



die(json_encode($r));
