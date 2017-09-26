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
		

	$usuario = utf8_decode($_POST['usuario']);
	$pass = utf8_decode($_POST['password']);


	if(ereg("^([a-zA-Z0-9_-])*$", $usuario) && ereg("^([a-zA-Z0-9_-])*$", $pass))
	{
		if (strlen($usuario)<1 )
		{
			mysql_close($link);
			header('Location: error_login01.html'); 
		}
		else if (strlen($pass)<1)
		{
			mysql_close($link);
			header('Location: error_login02.html');
		}
		else
		{	
			$check=mysql_query("select * from accounts where login='".$usuario."'");
			$check1=mysql_num_rows($check);
			if($check1<1)
			{
				mysql_close($link);
				header('Location: error_login03.html');				
			}
			else
			{
				$check00=mysql_query("select * from accounts where login='".$usuario."' and password='".base64_encode(pack('H*', sha1($pass)))."'");
				$check001=mysql_num_rows($check00);
				if($check001>0)
				{
					$var = "Si";
					session_start();
					$_SESSION["session"]=$var;
					$_SESSION["usuario_session"]=$usuario;
					header('Location: login_h.php');
				}
				else
				{
					mysql_close($link);
					header('Location: error_login03.html');	
				}
				
			}
		}
	}
	else
	{
		mysql_close($link);
		header('Location: error_login04.html');	
	}
	
?>