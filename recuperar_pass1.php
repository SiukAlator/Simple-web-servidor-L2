<?php
	$L2JBS_config["mysql_host"]="l2sao.ddns.net";	// MySQL IP
	$L2JBS_config["mysql_port"]=3306;		// MySQP port
	$L2JBS_config["mysql_db"]="l2jdb";		// l2jdb or your lineage 2 server database name
	$L2JBS_config["mysql_login"]="root";		// MySQL Login name	
	$L2JBS_config["mysql_password"]="babytamocc01";		// MySQL Password

	error_reporting(0);
	
	
	$L2JBS_config["javascript_sort_method"]="bubble";
	$link = mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']);


	if (!$link)
		header('Location: error_conexion.html'); 
	@mysql_select_db($L2JBS_config['mysql_db'], $link)
		or die ('Error '.mysql_errno().': '.mysql_error());
		

	$user = utf8_decode($_POST['user']);
	$email = utf8_decode($_POST['email']);
	$resp = utf8_decode($_POST['resp']);

	if (strlen($user)<1 || strlen($email)<1 || strlen($resp)<1)
	{
		mysql_close($link);
		header('Location: error_recuperarpass01.html'); 
	}
	else
	{	
		$check=mysql_query("select * from accounts_inf where usuario='".$_POST['user']."' and  email='".$_POST['email']."' and  resp='".$_POST['resp']."'");
		$check1=mysql_num_rows($check);
		if($check1>0)
		{
			mysql_close($link);
			$var = "Si";
			session_start();
			$_SESSION["recuperar_pass"]=$var;
			$_SESSION["usuario_pass"]=$user;
			header('Location: recuperar_pass2_h.php');
		}

	}
	
	
?>