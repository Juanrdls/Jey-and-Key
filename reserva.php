<?PHP
if (!isset($_REQUEST['enviar'])){
	$mensaje="No se han enviado datos en el formulario";
}
else{
	$mensaje="";
	if ($mysqli=mysqli_connect("localhost","root")){
		if($mysqli->select_db("test")){
			$query='insert into registro values (NULL, "'.$_REQUEST['nombre'].'", "'.$_REQUEST['apellidos'].'", "'.$_REQUEST['recomendación'].'", "'.$_REQUEST['Plato'].'", "'.$_REQUEST['Bebidas'].'")';
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