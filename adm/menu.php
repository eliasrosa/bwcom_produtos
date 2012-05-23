<?
defined('BW') or die("Acesso negado!");

$tituloPage = "Administração de Produtos";

$menu = array(
	'0' => array(
		'url' => 'adm.php?com=produtos&view=lista',
		'tit' => 'Produtos'
	),
	'1' => array(
		'url' => 'adm.php?com=produtos&sub=categorias&view=lista',
		'tit' => 'Categorias'
	)
);

?>
