<?
defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/produtos');
bwRouter::addUrl('/produtos/destaques', array());
bwRouter::addUrl('/produtos/busca');
bwRouter::addUrl('/produtos/detalhes/:alias/:id', array('nome', 'id'));
bwRouter::addUrl('/produtos/categoria/:alias/:id', array('nome', 'id'));


// ADM
bwRouter::addUrl('/produtos/task', array(), 'task');
bwRouter::addUrl('/produtos/lista');
bwRouter::addUrl('/produtos/cadastro/:id', array('id'));
bwRouter::addUrl('/produtos/categorias/lista');
bwRouter::addUrl('/produtos/categorias/cadastro/:id', array('id'));
