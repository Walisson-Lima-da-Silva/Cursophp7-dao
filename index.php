<?php 

	require_once("config.php");

	// $sql = new Sql();

	// $usuarios = $sql->select("SELECT * FROM tb_usuarios");

	// echo json_encode($usuarios);


	$user = new Usuario();

	$user->buscarDados(1);

	echo $user;
?>