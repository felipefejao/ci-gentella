<?php
class Migration_Tipo_usuario extends CI_Migration{
    public function up(){

        $this->dbforge->add_field(array(
            'id_tipo_usuario' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'desc_tipo' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ),

        ));
        $this->dbforge->add_key('id_tipo_usuario');
        $this->dbforge->create_table('tipo_usuario');

    }

    public function down(){
        $this->dbforge->drop_table('tipo_usuario');
    }
}