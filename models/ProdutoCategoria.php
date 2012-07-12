<?php

class ProdutoCategoria extends bwRecord
{

    var $labels = array(
        'idpai' => 'Categoria pai',
        'nome' => 'Nome da categoira',
        'descricao' => 'Descrição',
        'ordem' => 'Ordem',
    );

    public function setTableDefinition()
    {
        $this->setTableName('bw_produtos_categorias');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('idpai', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('nome', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'notblank' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('descricao', 'string', NULL, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('status', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('ordem', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagalias', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagkeywords', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('metatagdescription', 'string', 180, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
    }

    public function setUp()
    {
        parent::setUp();

        $this->hasMany('Produto as Produtos', array(
            'local' => 'idcategoria',
            'foreign' => 'idproduto',
            'refClass' => 'ProdutoCategoriaRel'
        ));

        $this->hasMany('ProdutoCategoria as Subcategorias', array(
            'local' => 'id',
            'foreign' => 'idpai'
        ));

        $this->hasOne('ProdutoCategoria as CategoriaPai', array(
            'local' => 'idpai',
            'foreign' => 'id'
        ));

        $this->setBwImagem('produtos', 'categorias');
    }

    public function salvar($dados)
    {
        $db = bwComponent::save(__CLASS__, $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function remover($dados)
    {
        $filho = Doctrine_Query::create()
            ->from('ProdutoCategoria')
            ->where('idpai = ?', $dados['id'])
            ->fetchOne();

        if ($filho) {
            return array(
                'retorno' => false,
                'msg' => 'Exite uma ou mais subcategorias relacionada com esta categoria!'
            );
        }

        $db = bwComponent::remover(__CLASS__, $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function getAllIndexIdpai($status = NULL)
    {
        $dql = Doctrine_Query::create()
            ->from('ProdutoCategoria')
            ->orderBy('ordem, idpai, nome');

        if (!is_null($status))
            $dql->where('status = ?', $status);

        $r = array();
        foreach ($dql->execute() as $i)
            $r[$i->idpai][] = $i;

        return $r;
    }

    public function createMenu($idpai)
    {
        $categorias = Doctrine_Query::create()
            ->select('*')
            ->addSelect('(SELECT COUNT(*) FROM ProdutoCategoria cc WHERE cc.idpai = c.id AND cc.status = 1) AS filhos')
            ->from('ProdutoCategoria c')
            ->where('c.status = 1 AND c.idpai = ?', $idpai)
            ->orderBy('c.ordem, c.idpai, c.nome')
            ->execute();

        $m = '';
        if ($categorias) {

            $m .= '<ul class="menu">';

            foreach ($categorias as $c) {

                $submenu = '';
                if ($c->filhos > 0) {
                    $submenu = self::createMenu($c->id);
                }

                $class = sprintf('cat%s', $c->id);
                if (!is_null($submenu)) {
                    $class .= ' pai';
                }

                $m .= sprintf('<li class="%s"><a href="%s">%s</a>%s</li>', $class, $c->getUrl('/produtos/categoria'), $c->nome, $submenu);
            }

            $m .= "</ul>";

            return $m;
        }

        return NULL;
    }

}