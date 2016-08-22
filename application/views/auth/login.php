<?php
 if(array_key_exists("HTTP_X_FORWARDED_FOR", $_SERVER) && $_SERVER["HTTP_X_FORWARDED_FOR"]){ 
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
	 }else{ 
			$ip = $_SERVER['REMOTE_ADDR'];
			} 
	$numeros = explode('.', $ip);
					
				    if($numeros[0] == '10' || $numeros[0] == '172'){
					//$this->set('ip' , '10.64.65.200');
					$config['base_url'] ='http://10.64.65.200:81/mspsj/';
				    } else {
					//$this->set('ip' , '200.0.236.210');
					$config['base_url'] ='http://200.0.236.210:81/mspsj/';
				    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">

	<head>
		<title>MSP </title>	
	</head>
	<body>
		<div class="login">			
			<form action="form_edit_encuestador" method="post">
			<?=$this->session->flashdata('error')?>
				<table class="form">
					<tr>
						<td>
							<?=form_label('Ingrese Documento','documento')?>
							<?=form_input(array('name' => 'documento',  'id' => 'documento'))?>
							</br>
							<?=form_label('Ingrese Clave','clave')?>
							<?=form_input(array('name' => 'clave',  'id' => 'clave'))?>
							
						</td>
					</tr>					
				</table>				
				 <INPUT type="submit" value="Enviar"> <INPUT type="reset">			
			</form>
		</div>
	</body>
</html>