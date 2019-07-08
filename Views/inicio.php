<?php 

session_start();
if(isset($_SESSION['User'])){

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nserv Informática</title>
	<?php require_once "menu.php" ?>
</head>
<body>

</body>
</html>

<?php 

}else{
	header("location:../index.php");
}

 ?>