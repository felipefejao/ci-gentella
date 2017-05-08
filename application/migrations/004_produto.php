<?php
class Migration_produto extends CI_Migration {
    public function up(){


        $this->dbforge->add_field(array(
            "id_produto" => array(
                "type" => "int",
                "constraint" => "11",
                "auto_increment" => true
            ),
            "cod_interno" => array(
                "type" => "varchar",
                "constraint" => 50,
                "null" => true
            ),
            "desc_produto" => array(
                "type" => "varchar",
                "constraint" => 250,
                "null" => true
            ),
            "preco" => array(
                "type" => "decimal",
                "constraint" => "10,2"
            ),
            "qtde" => array(
                "type" => "int",
                "constraint" => 3,
                "null" => true
            ),
            "observacao" => array(
                "type" => "text",
                "null" => true
            )

        ));

        $this->dbforge->add_key('id_produto',true);
        $this->dbforge->create_table('produto');
    }

    public function down(){
        $this->dbforge->drop_table('produto');
    }
}