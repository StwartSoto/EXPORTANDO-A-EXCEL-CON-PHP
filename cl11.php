<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Listado de Electrotecnia Industrial</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
</head>
<body>
<?php  
$servidor="localhost";
$usuario="root";
$clave="";
$bdd="tecnologico";
$conexion=mysqli_connect($servidor,$usuario,$clave,$bdd);
$tabla="SELECT * FROM cursos where codcur like 'EC%'";
$conectar=mysqli_query($conexion,$tabla);
$cursos=array();
while($filas=mysqli_fetch_array($conectar))
{
	$cursos[]=$filas;
}
	
?>
<div class="container">
	<table class="table table-hover table-bordered table-condensed table-responsive">
		<h1>Listado de Electrotécnia Industrial</h1>
		<tr>
			<td>Codigo Curso</td><td>Nombre</td><td>Créditos</td><td>Horas</td>
		</tr>
		<tbody>
			<?php  
				
				foreach($cursos as $curso)
				{
					
			?>
				<tr>
					
					<td><?php echo $curso["codcur"]; ?></td>
					<td><?php echo $curso["nombre"];?></td>
					<td><?php echo $curso["cred"];?></td>
					<td><?php echo $curso["horas"];?></td>
				</tr>
			<?php		
				}
			?>

		</tbody>
	</table>
<?php  
		 if(!empty($cursos)) 
		 {
		 	$filename ="ListadodeElectrotecnia.xls";
		 	header("Content-Type: application/vnd.ms-excel; name='excel'");
		 	header("Content-Disposition: attachment; filename=".$filename);
			header('Pragma: public');
			header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1 
			header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1 
			header('Pragma: no-cache');
			header('Expires: 0');
			header('Content-Transfer-Encoding: none');
			//header('Content-type: application/vnd.ms-excel;charset=utf-8');// This should work for IE & Opera 
			header('Content-type: application/x-msexcel; charset=utf-8'); // This should work for the rest 
			header("Content-Disposition: attachment; filename=".$filename);
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=$filename");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-type: application/x-msdownload");
		 }
		 else
		 {
		 	echo 'No hay datos a exportar';
		 }
		 exit;
?>
</div>
</body>
</html>