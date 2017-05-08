<?php
class Migration_Users extends CI_Migration{
    public function up(){


        $this->dbforge->add_field(array(
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'login' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'null' => false
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'unique' => true
            ),
            'senha' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'null' => false
            ),
            'id_tipo_usuario' => array(
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ),
            'datadd' => array(
                'type' => 'datetime',

            )
        ));
        $this->dbforge->add_key('id_user',true);

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario)');
        $this->dbforge->create_table('users');


    }

    public function down(){
        $this->dbforge->drop_table('users');
    }
}