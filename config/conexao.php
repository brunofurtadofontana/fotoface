<?php

	$conexao= mysql_connect("localhost","root","")or die(mysql_error());
	$dados = mysql_select_db("msg",$conexao)or die(mysql_error());

?>