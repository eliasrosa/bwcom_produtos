<?

defined('BW') or die("Acesso negado!");

class bwProdutos extends bwComponent
{
    // variaveis obrigatórias
    var $id = 'produtos';
    var $nome = 'Produtos';
    var $adm_url_default = 'adm.php?com=produtos&view=lista';
    var $adm_visivel = true;
    
    
    // getInstance
    function getInstance($class = false)
    {
        $class = $class ? $class : __CLASS__;
        return bwObject::getInstance($class);
    }
    
}
?>
