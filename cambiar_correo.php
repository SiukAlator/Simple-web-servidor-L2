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
		

	$correo = utf8_decode($_POST['correo']);

	if (strlen($correo)<1 )
	{
		mysql_close($link);
		header('Location: error_ccorreo01.html'); 
	}
	else
	{	
		session_start();
		$usuario = $_SESSION["usuario_session"];
		$check1=mysql_query("update accounts_inf SET email='".$correo."' WHERE usuario='".$usuario."'");
		
		if($check1 === TRUE)
		{
			mysql_close($link);
			header('Location: correo_cambiado.html');				
		}

	}
	
	
?>