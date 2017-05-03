<?php
class Setup extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->dbforge();
    }

    public function migrate($version = null){
        $this->load->library('migration');

        if($version != null){
            if($this->migration->version($version) === FALSE){
                show_error($this->migration->error_string());
            }else{
                echo "Migration executada com sucesso!" . PHP_EOL;
            }
            return;
        }
        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migrations run successfully" . PHP_EOL;
        }
    }
}