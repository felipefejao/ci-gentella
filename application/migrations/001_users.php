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
                'unsigned' => true
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'unique' => true
            ),
            'senha' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'unsigned' => true
            ),
            'datadd' => array(
                'type' => 'datetime',

            )
        ));
        $this->dbforge->add_key('id_user',true);


        $this->dbforge->create_table('users');

    }

    public function down(){
        $this->db_forge->drop_table('users');
    }
}