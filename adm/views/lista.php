<?

defined('BW') or die("Acesso negado!");

class bwGridProdutos extends bwGrid
{

    function col0($i)
    {
        return sprintf('<a href="%s">%s</a>', $i->getUrl('/produtos/cadastro'), $i->id);
    }

    function col1($i)
    {
        return sprintf('<img src="%s" />', $i->bwImagem->produto->resize(100, 100));
    }

    function col2($i)
    {
        return $i->nome;
    }

    function col3($i)
    {
        return $i->referencia;
    }

    function col4($i)
    {
        return '<a href="' .$i->bwGaleria->getAdmUrl('produto') . '">Galeria de imagens</a>';
    }

    function __construct()
    {
        //
        $this->orderColDefault = 1;

        //
        $sql = Doctrine_Query::create()
            ->from('Produto');

        //
        parent::__construct($sql);

        //
        $this->addCol('ID', 'id', 'tac', 50);
        $this->addCol('Imagem', NULL, 'tac', 100);
        $this->addCol('Nome', 'nome');
        $this->addCol('Referência', 'referencia', NULL, 200);
        $this->addCol('Galeria de imagens', NULL, 'tac', 200);
        
        //
        $this->show();
    }

}

echo bwAdm::createHtmlSubMenu(0);
echo bwButton::redirect('Criar novo produto', '/produtos/cadastro/0');

new bwGridProdutos();