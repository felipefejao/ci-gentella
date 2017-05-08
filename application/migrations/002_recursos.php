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
            'controller' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ),
            'pai' => array(
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ),
            'nivel' => array(
                'type' => 'int',
                'constraint' => 1,
                'null' => false
            ),
            'index' => array(
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ),
            'scriptJS' => array(
                'type' => 'VARCHAR',
                'constraint' => 1024,
                'null' => false
            )
        ));
        $this->dbforge->add_key('id_recurso');
        $this->dbforge->create_table('recursos');

    }

    public function down(){
        $this->dbforge->drop_table('recursos');
    }
}