<?php
class Migration_Recursos extends CI_Migration{
    public function up(){
        $this->dbforge->add_field(array(
            'id_recurso' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'desc_recurso' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ),


        ));
        $this->dbforge->add_key('id_recurso');
        $this->dbforge->create_table('Recursos');

    }

    public function down(){
        $this->db_forge->drop_table('tipo_usuario');
    }
}