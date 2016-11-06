<?php
class Main extends CI_Controller{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header('Content-type: text/html; charset=utf-8');
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        parent::__construct();
    }

    function index(){
        $this->callView('home');
    }

    function callView($view){
        $this->load->view($view);
    }

    function login(){
        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);
        
        //print_r($result);
        
        $this->load->model('general');

        $arr = $this->general->select_where('tb_usuario',array('email_usu' => $result->email_usu,'senha_usu' => $result->senha_usu));
        echo json_encode($arr);
    }

    function newTicket(){
        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);

        $arr = array(
            'desc_ticket' => $result->desc_ticket,
            'id_usuario' => $result->id_usuario,
            'obs_ticket' => $result->obs_ticket,
            'status_ticket' => $result->status_ticket,
            'datatu_ticket' => date('Y-m-d H:i:s'),
            'categoria_ticket' => $result->categoria_ticket
        );

        $this->load->model('general');

        $ret = $this->general->insert('tb_ticket',$arr,true);
        echo $ret;
    }

    function  updateTicket($id){
        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);

        $arr = array(
            'obs_ticket' => $result->obs_ticket,
            'status_ticket' => $result->status_ticket
        );

        $this->load->model('general');

        $ret = $this->general->update('tb_ticket',$arr,array('id_ticket' => $id));
        echo $ret;
    }


    function getDados($table,$id){
        $chave = '';
        $this->load->model('general');

        if($table == 'tb_usuario'){
            $chave = 'id_usuario';
        }elseif ($table == 'tb_anexo'){
            $chave = 'id_ticket';
        }

        $arr = $this->general->select_where($table,array($chave => $id));
        echo json_encode($arr);
    }

    function getAllTickets(){
        $this->load->model('general');
        $arr = $this->general->select('tb_ticket');
        echo json_encode($arr);

    }

    function getAllUsers(){
        $this->load->model('general');
        $arr = $this->general->select('tb_usuario');
        echo json_encode($arr);

    }

    function getTicketbyUser($id){
        $this->load->model('general');

        $arr = $this->general->select_where('tb_ticket',array('id_usuario' => $id));
        echo json_encode($arr);
    }

    function getTicketbyID($id){
        $this->load->model('general');

        $arr = $this->general->select_where('tb_ticket',array('id_ticket' => $id));
        echo json_encode($arr);
    }

    function getTicketbyCat($id){
        $this->load->model('general');

        $arr = $this->general->select_where('tb_ticket',array('categoria_ticket' => $id));
        echo json_encode($arr);
    }

    function getStatistics($id,$tipo){
        $sql = '';

        if($tipo == '2'){
            $sql = "select count(id_ticket) totais,
                    (select count(id_ticket) from tb_ticket where status_ticket = 0 and id_usuario = $id) abertos,
                    (select count(id_ticket) from tb_ticket where status_ticket = 1 and id_usuario = $id) ag_tec ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 2 and id_usuario = $id) ag_cli ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 3 and id_usuario = $id) final 
                    from tb_ticket  where id_usuario = $id";
        }
        elseif ($tipo == 1){
            $sql = "select count(id_ticket) totais,
                    (select count(id_ticket) from tb_ticket where status_ticket = 0 and categoria_ticket = $id) abertos,
                    (select count(id_ticket) from tb_ticket where status_ticket = 1 and categoria_ticket = $id) ag_tec ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 2 and categoria_ticket = $id) ag_cli ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 3 and categoria_ticket = $id) final 
                    from tb_ticket  where categoria_ticket = $id";
        }
        else{
            $sql = "select count(id_ticket) totais,
                    (select count(id_ticket) from tb_ticket where status_ticket = 0) abertos ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 1) ag_tec ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 2) ag_cli ,
                    (select count(id_ticket) from tb_ticket where status_ticket = 3) final 
                    from tb_ticket ";
        }

        $this->load->model('general');

        $arr = $this->general->customQuery($sql);
        echo json_encode($arr);
    }

    function newUser(){
        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);

        $arr = array(
            'nome_usu' => $result->nome_usu,
            'email_usu' => $result->email_usu,
            'senha_usu' => $result->senha_usu,
            'tipo_usu' => $result->tipo_usu,
            'categoria_usu' => $result->categoria_usu,
        );

        $this->load->model('general');

        $ret = $this->general->insert('tb_usuario',$arr,true);
        echo $ret;
    }

    function uploadFile($id_ticket){
        //$temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = md5(date('Y-m-d h:i:s')).'_'.$_FILES["file"]["name"];



        move_uploaded_file($_FILES['file']['tmp_name'], './asset/anexos/' . $newfilename);

        $this->load->model('general');
        $this->general->insert('tb_anexo',array('id_ticket' => $id_ticket, 'caminho_anexo' => $newfilename));

    }

    function finalizarTicket($id_ticket,$id_usu){
        $mensagem = "\n\n---------------------------------------------------------------------------------------------------------------------------\n\n Ticket finalizado " . date('Y-m-d H:i:s');


        $this->load->model('general');
        $this->general->update('tb_ticket',array('status_ticket' => 3, 'finaldata_ticket' => date('Y-m-d H:i:s'), 'finalusu_ticket' => $id_usu, "obs_ticket" => $mensagem), array('id_ticket' => $id_ticket));
    }

    function updateUsuario($id){
        $entityBody = file_get_contents('php://input');
        $result = json_decode($entityBody);

        $arr = array(
            'nome_usu' => $result->nome_usu,
            'email_usu' => $result->email_usu,
            'tipo_usu' => $result->tipo_usu,
            'categoria_usu' => $result->categoria_usu,
        );

        $this->load->model('general');

        $ret = $this->general->update('tb_usuario',$arr,array('id_usuario' => $id));


    }



}