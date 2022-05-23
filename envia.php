<?php 
$usuario=addslashes($_POST['usuario']); //recibe parametros
//$usuario1=mysql_real_escape_string($usuario);
//$usuario1_noespasio=trim($usuario1);
$pass=addslashes($_POST['contrasena']);	//recibe parametros
//$pass1=mysql_real_escape_string($pass);
//$pass1_noespasio=trim($pass1);

if(($usuario=="")||($pass=="")){
			echo "  <script language='JavaScript'>
            alert('Ingrese Nombre de Usuario o Contraseña.-');
            </script>";	
			?> 
			<script type="text/javascript">
			<!--
			window.location = "../index.php"
			//-->
			</script>
<?php
			}else{
			include("cone.php");
			$link=Conecta();
			//$result=mysql_query("select nombre_usuario,apellido_usuario,id_usuario,tipo_usuario from tb_usuarios where login_user='".$usuario."' and pass_user = '".$pass."'",$link);
			$consulta=mysql_query("select * from tb_usuarios where login_user='$usuario' and pass_user='$pass'");
			//$respuesta=mysql_query("SELECT * FROM tb_usuarios WHERE login_user='".mysql_real_escape_string($usuario)."' AND pass='".mysql_real_escape_string($pass)."'")
			
			if(mysql_num_rows($consulta))
			{
				$arreglo=mysql_fetch_array($consulta);
				//$_SESSION["usuario"]=$arreglo["usuario"];
				//header("location: index.php");				
				////Codigo para errror de CHROME
				session_cache_limiter('private, must-revalidate');
				session_cache_expire(60);
				session_start();
				/////Cierre 
				$_SESSION["autentificado"]= "SI";
				$_SESSION['usuario'] = $arreglo['login_user'];
				$_SESSION['nombre'] = $arreglo['nombre_usuario'];
				$_SESSION['apellido'] = $arreglo['apellido_usuario'];
				$_SESSION['id'] = $arreglo['id_usuario'];
				$_SESSION['tipousuario'] = $arreglo['tipo_usuario'];
				$_SESSION['nombrecompleto'] = $arreglo['nombre_completo'];
				$_SESSION['moduloBoletas'] = $arreglo['moduloBoletas'];
				$_SESSION['asignarArquitecto'] = $arreglo['asignarArquitecto'];
				$_SESSION['revisarExpedientesOtros'] = $arreglo['revisarExpedientesOtros'];
 				$habilitado=$arreglo['habilitado'];		
				$tipousuario = $arreglo['tipo_usuario'];
					if ($habilitado=='no'){
					echo "  <script language='JavaScript'>
            			alert('Usuario Deshabilitado. Consulte al Administrador de Sistema.-');
            			</script>";						
						session_start();
						session_unset();
						session_destroy();						
						?> 
						<script type="text/javascript">
						<!--
						window.location = "../index.php"
						//-->
						</script>
						<?				
					}else{									
					if($tipousuario=='revisor'){
					header("location: ../revisor/index.php");
					}else if($tipousuario=='meson'){
					header("location: ../meson/index.php");
					}else if($tipousuario=='archivo'){
					header("location: ../archivo/index.php");
					}else if($tipousuario=='seguimiento'){
					header("location: ../seguimiento/index.php");
					}else if($tipousuario=='visitante'){
					header("location: ../visitante/index.php");
					}else if($tipousuario=='director'){
					header("location: ../director/index.php");
					}else if($tipousuario=='invitado'){
					header("location: ../invitado/index.php");
					}else if($tipousuario=='apoyo'){
					header("location: ../apoyo/index.php");
					}else if($tipousuario=='revisorEistu'){
					header("location: ../revisor_eistu/index.php");
					}else{
					header("location: ../admin/index.php");
					}
					}
			}else{
				//$error[3]="Usuario o contrase&ntilde;a incorrecta";
			echo "  <script language='JavaScript'>
            alert('Nombre de usuario o contraseña Incorrectos.-');
            </script>";	
			?> 
			<script type="text/javascript">
			<!--
			window.location = "../index.php"
			//-->
			</script>
			<?			
			}
			
} //Cierre Primer if
?>