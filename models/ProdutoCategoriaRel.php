<?php

class ProdutoCategoriaRel extends bwRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bw_produtos_categorias_rel');
        $this->hasColumn('idproduto', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('idcategoria', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'notnull' => true,
            'autoincrement' => false,
        ));
    }

    public function setUp()
    {
        parent::setUp();
    }
    
}