<?php
class General extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($tabela,$arrIns,$return_id = false){
        $ret = $this->db->insert($tabela,$arrIns);

        if($return_id){
            return $this->db->insert_id();
        }

        return $ret;

    }

    public function update($tabela,$arrUpd, $arrWhere){
        return $this->db->update($tabela,$arrUpd,$arrWhere);
    }
    public function delete($tabela, $arrWhere){
        return $this->db->delete($tabela,$arrWhere);
    }

    public function checkExists($tabela, $arrCheck){
        $query = $this->db->get_where($tabela,$arrCheck);
        $res = $query->result();
        if(!empty($res)){
            return true;
        }
        else
            return $this->db->error();

    }

    public function select($tabela){
        $query = $this->db->get($tabela);
        $res = $query->result();

        return (array)$res;
    }
    public function select_where($tabela,$arrWhere){
        $query = $this->db->get_where($tabela,$arrWhere);
        $res = $query->result();

        return (array)$res;
    }

    public function customQuery($sql){
        $query = $this->db->query($sql);
        $res = $query->result();

        return $res;
    }


}