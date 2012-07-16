<?

defined('BW') or die("Acesso negado!");
$task = bwRequest::getVar('task');

// PRODUTOS
////////////////////////////////////////////////////////////////////////
if ($task == 'produtoSalvar') {
    $r = Produto::salvar(bwRequest::getVar('dados', array()));
}

if ($task == 'produtoRemover') {
    $r = Produto::remover(bwRequest::getVar('dados', array()));
    $r['redirect'] = bwRouter::_("/produtos/lista");
}


// CATEGORIAS
////////////////////////////////////////////////////////////////////////
if ($task == 'categoriaSalvar') {
    $r = ProdutoCategoria::salvar(bwRequest::getVar('dados', array()));
}

if ($task == 'categoriaRemover') {
    $r = ProdutoCategoria::remover(bwRequest::getVar('dados', array()));
    $r['redirect'] = bwRouter::_("/produtos/categorias/lista");
}

die(json_encode($r));