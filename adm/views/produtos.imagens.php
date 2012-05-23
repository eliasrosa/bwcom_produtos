	<div id="imagens">
		<?
		// busca imagens em ordem
		$imagens = Doctrine_Query::create()
				->from('ProdutoImagem i')
				->where('i.idproduto = ?', $i->id)
				->orderby('i.ordem ASC')
				->execute();

		if(count($imagens->toArray())):
		?>
		<div class="img">
			<?	
			foreach($imagens as $img):
					$url = bwUtil::resizeImage("[image src='{$img->bwImagem->getUrl()}' width='75' height='75']");
			?>
			<a href="<?= bwRouter::_("adm.php?com=produtos&sub=imagens&view=cadastro&id={$img->id}"); ?>" style="background: #FFF url(<?= $url; ?>) no-repeat center center; height: 75px; width: 75px; padding: 5px;" class="status<?= $img->status; ?>">
				<span>Mover/Editar</span>
				<input type="hidden" name="ordem-imagens[]" value="<?= $img->id; ?>" />
			</a>
			<?	endforeach; ?>
			<br class="clearfix"/>
			<fieldset>
				<legend>Legenda</legend>
				<p><span class="first"></span>Imagem principal do produto. O produto terá como imagem principal a primeira imagem 'ativa' encontrada.</p>
				<p><span class="status1"></span>Imagem do produto ativada. Essa imagem será exibida no site.</p>
				<p><span class="status0"></span>Imagem do produto desativada. Essa imagem NÃO será exibida no site.</p>
			</fieldset>
		</div>
		<br />
		<? endif; ?>
		<?= bwButton::redirect('Enviar nova imagem', "adm.php?com=produtos&sub=imagens&view=cadastro&idproduto={$i->id}"); ?>
	</div>
