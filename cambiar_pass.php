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
		

	$pass1 = utf8_decode($_POST['pass1']);
	$pass2 = utf8_decode($_POST['pass2']);


	if(ereg("^([a-zA-Z0-9_-])*$", $pass1) && ereg("^([a-zA-Z0-9_-])*$", $pass2))
	{
		if (strlen($pass1)<1 )
		{
			mysql_close($link);
			header('Location: error_cpass01.html'); 
		}
		else if (strlen($pass2)<1)
		{
			mysql_close($link);
			header('Location: error_cpass01.html'); 
		}
		else if ($pass1 != $pass2)
		{
			mysql_close($link);
			header('Location: error_cpass01.html'); 
		}
		else
		{	
			session_start();
			$usuario = $_SESSION["usuario_session"];
			$check1=mysql_query("update accounts SET password='".base64_encode(pack('H*', sha1($_POST['pass1'])))."' WHERE login='".$usuario."'");
			
			if($check1 === TRUE)
			{
				$check2=mysql_query("update accounts_inf SET password='".$pass1."' WHERE usuario='".$usuario."'");
				mysql_close($link);
				header('Location: pass_cambiada.html');				
			}
	
		}
	}
	else
	{
		mysql_close($link);
		header('Location: error_cpass01.html'); 
	}
	
?>