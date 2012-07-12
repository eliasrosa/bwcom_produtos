<?
defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/produtos');
bwRouter::addUrl('/produtos/destaques');
bwRouter::addUrl('/produtos/busca');
bwRouter::addUrl('/produtos/detalhes/:metatagalias', '/produtos/detalhes', array(
    ':metatagalias' => '[\w\d-]+'
));
bwRouter::addUrl('/produtos/categoria/:metatagalias', '/produtos/categoria', array(
    ':metatagalias' => '[\w\d-]+'
));

