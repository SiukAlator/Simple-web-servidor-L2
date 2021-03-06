<?  session_start();
	if ($_SESSION["session"] != "Si")
	{
		header("location: index.html");
	} ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"><link rel="shortcut icon" href="images/logoweb.png" type="image/png" />
    <title>Lineage II SAO</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
	<link rel="stylesheet" href="style_login.css" type="text/css" media="screen">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" ></script>
    <script src="js/menu.js" type="text/javascript"></script> 
	
</head>
  
 <body>

	  
	

	<div class="mainWrap" style="position: relative;">
		
		
		<center>
			<img src="images/logoweb.png" width="25%" height="25%" style="margin-top:10px"/>
		</center>

		<a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menu</a>
		
		<nav>
			<ul class="menu">
				<li><a href="index.html"><i class="icon-home"></i>INICIO</a>
				</li>
				<li><a  href="#"><i class="icon-camera"></i>¿CÓMO COMENZAR?</a>
				  <ul class="sub-menu">
					   <li><a href="instalacion.html"><img  src="images/iconos/Option.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/Option_on.png';" onmouseout="this.src='images/iconos/Option.png';"></img>Instalación</a></li>
					   <!--<li><a href="#"><img  src="images/iconos/BattleHealing.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/BattleHealing_on.png';" onmouseout="this.src='images/iconos/BattleHealing.png';"></img>Historia</a></li>-->
					   <li><a href="#"><img  src="images/iconos/QuestMessageBox.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/QuestMessageBox_on.png';" onmouseout="this.src='images/iconos/QuestMessageBox.png';"></img>Guia del juego</a>
						  <ul>
								<li><a href="clases.html"><img  src="images/iconos/DualBlades.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/DualBlades_on.png';" onmouseout="this.src='images/iconos/DualBlades.png';"></img>Razas y Clases</a></li>
								<li><a href="leveo.html"><img  src="images/iconos/Skills.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/Skills_on.png';" onmouseout="this.src='images/iconos/Skills.png';"></img>Zonas de leveo</a></li>
								<!--<li><a href="#"><img  src="images/iconos/PartyProfile.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/PartyProfile_on.png';" onmouseout="this.src='images/iconos/PartyProfile.png';"></img>Razas</a></li> -->
								<li><a href="equipo.html"><img  src="images/iconos/Equipment.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/Equipment_on.png';" onmouseout="this.src='images/iconos/Equipment.png';"></img>Equipamiento</a></li>
						   </ul>
						</li>
						<li><a href="requerimientos.html" ><img  src="images/iconos/List.png" width="30px" height="30px"  style="position: relative; margin-right: 5px; top:5px;" onmouseover="this.src='images/iconos/List_on.png';" onmouseout="this.src='images/iconos/List.png';"></img>Requerimientos</a></li>
				   </ul>
				</li>
				<li><a  href="descargar.html"><i class="icon-bullhorn"></i>DESCARGAR</a></li>
				<li><a  href="proyecto.html"><i class="icon-bullhorn"></i>PROYECTO L2 SAO</a></li>
				<li><a  href="registrarse.html"><i class="icon-envelope-alt"></i>REGISTRARSE</a></li>
				<li><a  href="donar.html"><i class="icon-envelope-alt"></i>DONAR</a></li><a href="#" target="_blank"> <a href="https://www.facebook.com/l2sao" target="_blank"> <input type="image" src="images/fb.png" align="right" width="50px" height="50px" onmouseover="this.src='images/fb_01.png';" onmouseout="this.src='images/fb.png';" style="margin-right: 8px;"/>	</a>
			</ul>
		</nav>
		
		<center>
			<br/>

			<div class="cuerpo" >
				<br />
				<br />
				<div align="right" style="margin-left: 2cm; margin-right: 2cm;">
					<a href="logout.php">Cerrar Sesión</a>
				</div>
				<div class="cuerpoTitulo">
					<b>Panel de control</b>
				</div>
				<br />
				<br />
				<div align="left" style="margin-left: 2cm; margin-right: 2cm;">
					<p style="font: 25px 'SAO UI'; margin-left: 5cm;">
					<b>
					Cambiar contraseña
					</b>
					</p>
					<form action="cambiar_pass.php" method="POST" id="cambio_pass">
						<table style=" margin-left: 5cm;">
							<tr>
								<td style=" padding-right: 10px;">
								Nueva contraseña
								</td>
								<td>
								<input type="password" name="pass1" class="pass1"/>
								</td>
							</tr>
							<tr>
								<td>
								Repita contraseña
								</td>
								<td>
								<input type="password" name="pass2" class="pass2"/>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
								<div align="right">
								<input class="form-btn" name="submit1" type="submit" value="Guardar" align="right"/>
								</div>
								</td>
							</tr>
						</table>
					</form>
					<br />
					<br />
					<p style="font: 25px 'SAO UI'; margin-left: 5cm;">
					<b>
					Modificar correo
					</b>
					</p>
					<form action="cambiar_correo.php" method="POST" id="cambio_correo">
						<table style=" margin-left: 5cm;">
							<tr>
								<td  style=" padding-right: 40px;">
								Nuevo correo
								</td>
								<td>
								<input type="email" name="correo" class="correo"/>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
								<div align="right">
								<input class="form-btn" name="submit2" type="submit" value="Guardar" align="right"/>
								</div>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="panel" >
			
				<div class="login" >
					<form action="login.php" method="POST" id="login">
						<input type="text" name="usuario" class="usuario"/>
						<br />
						<input type="password" name="password" class="password"/>
						<br/>
						<br/>
						<br/>
						<a href="recuperar_pass.html" style="font: 10px 'Open Sans', Helvetica, Arial, sans-serif; margin-top:60px; color: #000000;">¿Olvidaste tu clave?</a>
						<input type="image" src="images/boton_login.png" style="margin-right:20px; margin-top:-10px" align="right" width="40%" height="25%" onmouseover="this.src='images/boton_login02.png';" onmouseout="this.src='images/boton_login.png';" onclick="login.submit();"/>
					</form>
				</div>
				<br/>
				<div class="estado">		
					<div style="background-color: rgba(95,95,95, 0.7);  width:280px; color: white; height:30px;" >Estado del servidor
						<iframe src="modi/estado_server.html" width="60px" height="30px" frameBorder="0" align="right" scrolling="no">
						</iframe>
					</div>	
				</div>
				<p></p>
				<div class="estado_2">		
					<div style="background-color: rgba(95,95,95, 0.7);  width:280px; color: white; height:30px;margin-top:-10px;" >Sistema de cuentas
						<iframe src="modi/estado_ccuenta.html" width="60px" height="30px" frameBorder="0" align="right" scrolling="no">
						</iframe>
					</div>	
				</div>
				<br/>
				<div class="noticias">
					 <script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-page" data-href="https://www.facebook.com/l2sao" data-tabs="timeline" data-width="280" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/l2sao"><a href="https://www.facebook.com/l2sao">L2 SAO</a></blockquote></div></div>	 
				</div>
				
				<br/>
				 
			</div>

		</center>
	</div>
	<!--
	<div style=" position: relative; top: 420px;"></div>-->
	<!--
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />-->
	
	<center>
		<div class="pie" align="center">
			<img src="images/kirito_asuna.png" />
			<p>Copyright © 2015 Lineage II Sword Art Online. All rights reserved. Desarrollado por Siuk.</p>
		</div>
	</center>

</body>
</html>