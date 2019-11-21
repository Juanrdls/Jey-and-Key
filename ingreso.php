<?PHP
if (!isset($_REQUEST['Enviar'])){
	$mensaje="No se han enviado datos en el formulario";
}
else{
	$mensaje="";
	if ($mysqli=mysqli_connect("localhost","root")){
		if($mysqli->select_db("test")){
			$query='insert into registro values (NULL, "'.$_REQUEST['NPersonas'].'", "'.$_REQUEST['fecha_dia'].'", "'.$_REQUEST['fecha_mes'].'", "'.$_REQUEST['fecha_ano'].'", "'.$_REQUEST['Especiales'].'")';
			$resultado=$mysqli->query($query);
			if($resultado)
				$mensaje="Registro insertado con &eacute;xito";
			else 
				$mensaje="Imposible la inserci&oacute;n: ".$mysqli->error;	
		}
		else{
			$mensaje="Imposible seleccionar la BD";
		}
		$mysqli->close();
	}
	else{
		$mensaje="Imposible conectar con la BD";
	}
}
print"<HTML><HEAD></HEAD><BODY>";
print"<P>$mensaje<P>";
print"</BODY></HTML>";
?>