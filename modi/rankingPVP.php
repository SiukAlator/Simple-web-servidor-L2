<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<style>
			@font-face 
			{
				font-family: "SAO UI";
				font-style: normal;
				font-weight: normal;
				src: local('?'), url('../font-sao/sword_art_online.woff') format('woff'), url('../font-sao/sword_art_online.ttf') format('truetype');
			}
			body {
				background-color: rgba(255,255,255, 0.7); 
			}
			.titulo
			{
				font: 22px 'SAO UI';
				color: #0404B4;
			}
			.fecha
			{
				font: 20px 'SAO UI'; 
				color:#81BEF7;
			}
			.descripcion
			{
				font: 14px "Open Sans", Helvetica, Arial, sans-serif;
			}
		</style>

	</head>
	<body>
	
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
			header('Location: ../error_conexion.html');
		@mysql_select_db($L2JBS_config['mysql_db'], $link)
			or die ('Error '.mysql_errno().': '.mysql_error());
		
		//se envia la consulta  
		$result = mysql_query("select char_name,pvpkills from characters where pvpkills > 1  ORDER BY pvpkills DESC LIMIT 0, 10", $link);  
		//se despliega el resultado  
		echo "<table>";  
		echo "<tr>";  
		echo "<td margin-right: 25px;><div class='titulo'>Personaje</div></td>";  
		echo "<td><div class='titulo'>PvP</div></td>";   
		echo "</tr>";  
		while ($row = mysql_fetch_row($result)){   
			echo "<tr>";  
			echo "<td><div class='fecha'>$row[0]</div></td>";  
			echo "<td>$row[1]</td>";  
			echo "</tr>";  
		}  
		echo "</table>";  
	?>  

	<!--
	
		<a>
			<div class="titulo">Cierre temporal</div>
			<div class="fecha">03-12-2015  22:36</div>
			<div class="descripcion">El servidor L2 SAO cerrara sus puertas hasta nuevo aviso</div>
		</a>
		<a>
			<div class="titulo">Nueva versión del System</div>
			<div class="fecha">09-11-2015  23:57</div>
			<div class="descripcion">Se ha creado una nueva versión del System versión 1.2, para descargar el Parche o System solo debes ingresar <a href="../descargar.html" target="_blank">aquí</a>.</div>
		</a>
		<a>
			<div class="titulo">Evento 100 likes!</div>
			<div class="fecha">31-10-2015  00:14</div>
			<div class="descripcion">Gracias a nuestros usuarios estamos creciendo día, ¿y qué mejor que celebrarlo con un evento?. Enterate <a href="https://www.facebook.com/l2sao/photos/a.480376002132495.1073741828.465425496960879/480365955466833/?type=3" target="_blank">aquí</a> en que consiste.</div>
		</a>
		<a>
			<div class="titulo">Sistema de cuentas</div>
			<div class="fecha">07-09-2015  10:27</div>
			<div class="descripcion">El sistema de cuentas: registro de cuentas y login; estará habilitado para el día de la inaguración.</div>
		</a>
-->
	</body>
</html>