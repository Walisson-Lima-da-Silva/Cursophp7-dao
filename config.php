<?php

	// Função que registra automaticamente todos os arquivos que serão utilizados aqui nesse projeto(Nota pessoal: Sempre colocar o nome dos arquivos.php exatamente igual o nome das classes que estão dentro dela).
	spl_autoload_register(function($nomeClasse){

		$filename = "Classes". DIRECTORY_SEPARATOR .$nomeClasse.".php";
		
			if (file_exists(($filename))) {
		 		require_once($filename);
		 	} 
	});

?>