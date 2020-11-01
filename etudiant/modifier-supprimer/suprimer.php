<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query("DELETE FROM etudiant WHERE ID_ETUD=$id");
     
$_SESSION['message']="Etudiant est suprimé!";

header("location:../searchEtudiant.php");


}


?>