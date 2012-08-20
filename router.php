<?

defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/produtos/destaques', array(
    'title' => 'Produtos em destaque'
));

bwRouter::addUrl('/produtos/busca', array(
    'title' => 'Buscar produtos'
));

bwRouter::addUrl('/produtos/detalhes/:alias/:id', array(
    'fields' => array('nome', 'id')
));

bwRouter::addUrl('/produtos/categoria/:alias/:id', array(
    'fields' => array('nome', 'id')
));


// ADM
bwRouter::addUrl('/produtos');
bwRouter::addUrl('/produtos/task', array('type' => 'task'));
bwRouter::addUrl('/produtos/lista');
bwRouter::addUrl('/produtos/cadastro/:id', array('fields' => array('id')));
bwRouter::addUrl('/produtos/categorias/lista');
bwRouter::addUrl('/produtos/categorias/cadastro/:id', array('fields' => array('id')));
