<?php 

// FUNÇÃO QUE EXIBE APENAS O PRIMEIRO NOME DO USUÁRIO
function showName($name){
	$name = explode(' ',$name);
	return $name[0];
}

// FUNÇÃO QUE RETORNA A CHAVE DO DIA DA SEMANA
function diaAtendimento(){
	return date('w',time());
}

// FUNÇÃO QUE TRANSFORMA O HORÁRIO DE ATENDIMENTO VINDO DO BANCO DE DADOS EM UM ARRAY
function formataAtd($atd){
	return implode(',',$atd);
}

// FUNÇÂO PARA EXIBIT O DIA E HORÁRIO DE ATENDIMENTO
function exibeAtd($abre,$fecha){

	$semana = ['Domingo','Segunda-Feira','Terça-Feira','Quarta-Feira','Quinta-Feira','Sexta-Feira','Sábado'];
	$array = array();

	foreach($abre as $k => $v){
		if($v == 00 || $v == null || $fecha[$k] == 00){
			$array[] = '<strong>'.$semana[$k].'</strong> Não Abre';
		}else{
			$array[] = '<strong>'.$semana[$k].'</strong> Aberto '.$v.':00 às '.$fecha[$k].':00';
		}	
	}

	return $array;
}