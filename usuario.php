<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }
    
    public function getDessenha(){
        return $this->dessenha;
    }
    
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    
    public function setIdusuario($value){
        $this->idusuario = $value;
    }
    
    public function setDeslogin($value){
        $this->deslogin = $value;
    }
    
    public function setDessenha($value){
        $this->dessenha = $value;
    }
    
    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if (isset($result[0])) {
            
            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro($row['dtcadastro']);

        }
    }

    public static function getList()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login)
    {
        $sql = new Sql();

        return $sql->select("select * from tb_usuarios where deslogin like :SEARCH order by deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login, $senha)
    {
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$senha
        ));

        if (isset($result[0])) {
            
            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro($row['dtcadastro']);

        } else {

            throw new Exception("Login e/ou senha Inválidos...");

        }
    }


    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "desenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()
        ));
    }

}

?>