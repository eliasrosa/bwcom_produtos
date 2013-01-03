<?

function montaMenu($idpai = 0, $categorias = array(), $i = -1, $n = '')
{
    $i++;
    if (count($categorias[$idpai])) {
        foreach ($categorias[$idpai] as $c) {
            $nome = str_replace('"', '&quot;', ($n == '') ? $c->nome : sprintf('%s > %s', $n, $c->nome));
            echo sprintf('<option value="%s" class="cat%s" idpai="%s" nome_completo="%s" style="padding-left: %spx;">%s</option>', $c->id, $c->id, $c->idpai, $nome, $i * 10, $c->nome);
            montaMenu($c->id, $categorias, $i, $nome);
        }
    }
}

$rel = array();
foreach ($i->Categorias as $c)
    $rel[] = $c->id;
?>

<div id="categorias">
    <div class="campo block">
        <span>Categoria:</span>
        <select class="w100" name="dados[idpai]">
            <option value="0" idpai="0">-- Selecione --</option>
            <? montaMenu(0, ProdutoCategoria::getAllIndexIdpai()); ?>
        </select>	
        <br class="clearfix"/>
    </div>

    <div class="campo block">
        <span></span>
        <a href="javascript:void(0);" rel="[<?= join(',', $rel); ?>]" class="add">Adicionar categoria</a>
        <br class="clearfix"/>
    </div>
    <br />

</div>