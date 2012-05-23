	<div id="categorias">
		<?
		$categorias = bwProdutos::getInstance()->findCategoriaByIdpai(0);
		?>
		<div class="campo block">
			<span>Categoria:</span>
			<select class="w100 cat" name="categoria">
				<? foreach($categorias as $k=>$c): ?>
				<option value="<?= $c['id'] ?>" class="prod<?= $c['id'] ?>" rel="<?= $k; ?>"><?= str_repeat('&nbsp;&nbsp;&nbsp;', $c['nivel']); ?><?= $c['nome']; ?></option>
				<? endforeach; ?>
			</select>
			<br class="clearfix"/>
		</div>
		
		<div class="campo block">
			<span></span>
			<a href="javascript:void(0);" class="add">Adicionar categoria</a>
			<br class="clearfix"/>
		</div>
		<br />
		<? 
		$r = Doctrine::getTable('ProdutoCategoriaRel')->findByIdproduto($i->id);
		$v = ($r) ? $r->toArray() : array() ;	
		?>
		
		<script type="text/javascript">
			window.baseProdutosCategoriasOk = <?= json_encode($v)?>;
			window.baseProdutosCategorias = <?= json_encode($categorias)?>;
		</script>
	</div>