<?
defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/produtos');
bwRouter::addUrl('/produtos/destaques', array());
bwRouter::addUrl('/produtos/busca');
bwRouter::addUrl('/produtos/detalhes/:alias/:id', array('metatagalias', 'id'));
bwRouter::addUrl('/produtos/categoria/:alias/:id', array('nome', 'id'));


// ADM
//bwRouter::addUrl('/adm/produtos/task');
//bwRouter::addUrl('/adm/produtos/lista');
//bwRouter::addUrl('/adm/produtos/cadastro/:id', array('id'));
//bwRouter::addUrl('/adm/produtos/categorias/lista');
//bwRouter::addUrl('/adm/produtos/categorias/cadastro/:id', array('id'));
