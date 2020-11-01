<?php
session_start();
require('../config.php');

$qr1 = "SELECT * FROM `filiere`";
$resu= mysqli_query($conn, $qr1);
$qr2 = "SELECT * FROM `professeur`";
$resu= mysqli_query($conn, $qr2);

if(isset($_GET['delete'])){
  
  $id=$_GET['delete'];
  $conn->query("DELETE FROM matiere WHERE ID_MATIERE=$id");
   
$_SESSION['messageSupr']="Matière est suprimée!";
header("location:listerMat.php");
}


if(isset($_GET['edit'])){
$id=$_GET['edit'];


$result=$conn->query("SELECT *FROM matiere,professeur,filiere WHERE matiere.ID_MATIERE=$id AND matiere.ID_PROF=professeur.ID_PROF AND matiere.ID_FILLIERE=filiere.ID_FILLIERE");
if(count($result)==1){
  $row=$result->fetch_array();
  $m=$row['MATIERE'];
  $f=$row['FILIERE'];
  $p=$row['NOM_PROF'];
  

}
?>

<!DOCTYPE html>
<html>
	<head>
  <title>Lister</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../css/style_etud.css"/>
    <link rel="stylesheet" href="../css/style_login.css" />
    <style>
       body {
        background-color: #eee;
      }
      input {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: hidden;
        background-color: #eee;
      }
      
      .no-outline:focus {
        outline: none;
      }
      .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

      }
        table {
		width:100%;
    }
    
	  table, th, td {
		border: 1px solid black;
    border-collapse: collapse;
	  }
	  th, td {
		padding: 9px;
    text-align: left;
    }
    th{
      background-color: rgb(30, 8, 153);
      color:white;
    }
	  #t01 tr:nth-child(even) {
		background-color: #eee;
	  }
	  #t01 tr:nth-child(odd) {
	   background-color: #fff;
	  }
	  #t01 th {
		background-color: blue;
		color: white;
	  }
    </style>
	</head>
<body>
	<div class="logos">
	<img src="../image/logo.png" alt="logo" class="imgl">
	</div>
	<div class="topnav">
  <a class="active" href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Gestion des étudiants
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../etudiant/insertEtudiant.php">Ajouter un étudiant</a>
      <a href="../etudiant/searchEtudiant.php">Chercher un étudiant</a>
      <a href="../etudiant/listerEtudiant.php">La liste des étudiants</a>
      
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des professeurs
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../professeur/insertProf.php">Ajouter un professeur</a>
      <a href="../professeur/searchProf.php">Chercher un professeur</a>
      <a href="../professeur/listerProf.php">La liste des professeurs</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des absences
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../absence/insertAbsence.php">Ajouter absence</a>
      <a href="../absence/afficherAbsence.php">Consulter absence</a>
	  <a href="../absence/listerAbsence.php">Liste d'absence</a>
      <a href="../absence/afiche.php">La fiche d'absence</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des filliers
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../filiere/listerFiliere.php">Liste des filières</a>
      
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Gestion des matieres
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="insertMat.php">Ajouter une matiere</a>
        <a href="listerMat.php">Liste des matieres</a>
        
      </div>
    </div>

  <a href="../logout.php">Déconnexion</a>
</div>


<div class="main"><br/>
<header>
    <h1>Liste des Matières</h1>
    <div class="sucess"></div>
</header>
<br/><br/>

<table class="t01">
    
          <form action="modifierTrait.php" method="post">
            
            <thread class="alert-info">
        <tr>
            
            
            <th>Matière</th>
            <th>Nom de Professeur</th>
            <th>Filière</th>
          
            
        </tr>
            </thread>
         <tbody> 
      
          <tr>
          
             <td><input name="matiere" onClick="this.select();" class="no-outline" type="text"  value="<?php echo $m; ?>" ></td>
             <td><input name="professeur" onClick="this.select();" class="no-outline" type="text" value="<?php echo $p; ?>"></td>
             <td><input name="filiere" onClick="this.select();" class="no-outline" type="text" value="<?php echo $f; ?>"></td>
             <input name="id" onClick="this.select();" class="no-outline" type="hidden"  value="<?php echo $id; ?>" >
             
             <td>
               <input type="submit" name="modifier" value="modifier" class="button" >
               
            </td>
             
          </tr>
             
</tbody>
</table>
  </form>
  <?php
}
?>
</body>
</html>
