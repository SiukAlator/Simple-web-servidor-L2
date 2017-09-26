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
		
	$nombre = utf8_decode($_POST['nombre']);
	$usuario = utf8_decode($_POST['usuario']);
	$email = utf8_decode($_POST['email']);
	$resp = utf8_decode($_POST['resp']);
	$pass = utf8_decode($_POST['pass']);
	$pass_re = utf8_decode($_POST['pass_re']);
	$recaptcha = $_POST['g-recaptcha-response'];
	$msg='';
	if(!empty($recaptcha))
	{
		include("getCurlData.php");
		$google_url="https://www.google.com/recaptcha/api/siteverify";
		$secret='6LeXWQoTAAAAABXjy1TuPxNrOgOVuHzQXOvztze6';
		$ip=$_SERVER['REMOTE_ADDR'];
		//$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
		$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip="."l2sao.ddns.net";
		$res= getCurlData($url);
		//$res= curl_exec($url);
		$res= json_decode($res, true);
 
		if(strcmp($res['success'],"false") !== 0)
		{
			if(ereg("^([a-zA-Z0-9_-])*$", $_POST['usuario']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['pass']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['pass_re']))
			{
				if (strlen($_POST['nombre'])<1 )
				{
					mysql_close($link);
					header('Location: error05.html');
				}
				else if (strlen($_POST['usuario'])>15 ||  strlen($_POST['usuario'])<3)
				{
					mysql_close($link);
					header('Location: error03.html');
				}
				else if (strlen($_POST['pass'])<1 || $_POST['pass']!=$_POST['pass_re'])
				{
					mysql_close($link);
					header('Location: error04.html');
				}
				else if (strlen($_POST['email'])<1 )
				{
					mysql_close($link);
					header('Location: error06.html');
				}
				else if (strlen($_POST['resp'])<1 )
				{
					mysql_close($link);
					header('Location: error08.html');
				}
				else if ($page="registro.php" && $_POST['usuario'] && strlen($_POST['usuario'])<16 && strlen($_POST['usuario'])>3 && $_POST['pass'] && $_POST['pass_re'] && $_POST['pass']==$_POST['pass_re'])
				{	
					$check=mysql_query("select * from accounts where login='".$_POST['usuario']."'");
					$check1=mysql_num_rows($check);
					if($check1>0)
					{
						mysql_close($link);
						header('Location: error01.html');
					}
					else
					{
						mysql_query("INSERT INTO accounts (login, password, access_level) VALUES ('".$_POST['usuario']."', '".base64_encode(pack('H*', sha1($_POST['pass'])))."', 0)", $link);
						mysql_query("INSERT INTO accounts_inf (nom_completo, usuario, email, password, resp) VALUES ('".$_POST['nombre']."', '".$_POST['usuario']."', '".$_POST['email']."', '".$_POST['pass']."', '".$_POST['resp']."')", $link);
						mysql_close($link);
						//print '<p class="error"><b><h4>Resgistro Completo... Conta Criada</h4> </b></p>';
						header('Location: cuenta_creada.html');
					}
				}
				else
				{
					mysql_close($link);
					header('Location: error02.html');
				}
			}
			else
			{
				mysql_close($link);
				header('Location: error02.html');
				
			}
		
		}
		else
		{
			mysql_close($link);
			header('Location: error07.html');
		}
	}
	else
	{
		mysql_close($link);
		header('Location: error07.html');
	}

?>