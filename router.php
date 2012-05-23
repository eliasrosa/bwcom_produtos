<?
defined('BW') or die("Acesso negado!");

function produtosBuildRoute(&$query)
{
	$segments = array();

	if(preg_match('#^categoria$|^detalhes$#', $query['view']))
	{
		$segments[] = $query['view'];
		$segments[] = $query['id'];
		$segments[] = $query['alias'];
		unset($query['id'], $query['alias']);
	}
	
	elseif(preg_match('#^destaques$|^busca$#', $query['view']))
	{
		$segments[] = $query['view'];
	}
	
	return $segments;
}

function produtosParseRoute($segments)
{
	$vars = array();
	
	if(preg_match('#^categoria$|^detalhes$#', $segments[0]) && count($segments) == 3)
	{
		$vars['view'] = $segments[0];
		$vars['id'] = $segments[1];
		$vars['alias'] = $segments[2];
	}
	
	elseif(preg_match('#^destaques$|^busca$#', $segments[0]) && count($segments) == 1)
	{
		$vars['view'] = $segments[0];
	}
		
	return $vars;	
}
?>
