<?

defined('BW') or die("Acesso negado!");
require('helper.php');

bwHtml::js2css(BW_URL_JAVASCRIPTS . '/treeview/jquery.treeview');
bwHtml::js(BW_URL_JAVASCRIPTS .'/cookie/cookie.js');
?>

<script>
    $(document).ready(function(){
        $(".menu").treeview({
            persist: "cookie",
            cookieId: "treeview-catMenu"
        });
    });
</script>

<?

echo bwButton::redirect('Criar nova categoria', '/produtos/categorias/cadastro/0');

new helperTreeCategorias();
