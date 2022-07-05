<?php

require_once("config.php");

// $sql = new Sql();

// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

// echo json_encode($usuarios);

# carrega um usuário

// $root = new Usuario();

// $root->loadById(8);

// echo $root;

# carrega uma lista de usuários

// $lista = Usuario::getList();

// echo json_encode($lista);

# carrega uma lista de usuário, buscando pelo login

// $search = Usuario::search("Mar");

// echo json_encode($search);

# carrega usuário usando o login e senha

$usuario = new Usuario();

$usuario->login("Marukone", "58785878");

echo $usuario;

?>