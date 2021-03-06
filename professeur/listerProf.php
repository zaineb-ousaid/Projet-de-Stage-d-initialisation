<?php
require('../config.php');
$qr = "SELECT * FROM `classe`";
$resu= mysqli_query($conn, $qr);
?>

<!DOCTYPE html>
<html>
	<head>
  <title>lister</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../css/style_etud.css"/>
    <link rel="stylesheet" href="../css/style_login.css" />
    <style>
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
      <a href="insertProf.php">Ajouter un professeur</a>
      <a href="searchProf.php">Chercher un professeur</a>
      <a href="listerProf.php">La liste des professeurs</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des absences
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../absence/insertAbsence.php">Ajouter absence</a>
      <a href="../absence/consulterAbsence.php">Consulter absence</a>
	  <a href="../absence/listerAbsence.php">Liste d'absence</a>
      <a href="../absence/afiche.php">La fiche d'absence</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des filières
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
        <a href="../matiere/insertMat.php">Ajouter une matiere</a>
        <a href="../matiere/listerMat.php">Liste des matieres</a>
        
      </div>
    </div>

  <a href="../logout.php">Déconnexion</a>
</div>


<div class="main"><br/>
<header>
    <h1>Liste des professeurs</h1>
    <div class="sucess"></div>
</header>
<form align="center" method="post" action="listerProf.php" >
 
<input  name="keyword" type="text"class="inpp" Maxlength="20" placeholder="CLASSE*">

<input type="submit" name="lister" value="lister" class="right-btn"> 
 
</form>

<br/><br/>

   <?php if(isset($_POST['lister'])){ ?>
<table class="t01">
    
   <?php
    
        $keyword=$_POST['keyword'];
        $sql=("SELECT DISTINCT professeur.ID_PROF,professeur.NOM_PROF,professeur.PRENOM_PROF,professeur.TEL_PROF,professeur.EMAIL_PROF,professeur.SPECIALITE,CLASSE FROM professeur,coordonner,classe WHERE classe.CLASSE LIKE '$keyword'  AND coordonner.ID_CLASSE=classe.ID_CLASSE AND professeur.ID_PROF=coordonner.ID_PROF");
        $result=$conn->query($sql);
        if($result->num_rows>0){ ?>
            
            <thread class="alert-info">
        <tr>
        
            <th>ClASSE</th>
            <th>PRENOM</th>
            <th>NOM</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>Spécialité</th>
            <th>Modifier/<br/>supprimer</th>
        </tr>
            </thread>
    <tbody> 
      <?php  while($row=$result->fetch_assoc()) {  ?>
          <tr>
          
             <td><?php echo $row['CLASSE']; ?></td>
             <td><?php echo $row['PRENOM_PROF']; ?></td>
             <td><?php echo $row['NOM_PROF']; ?></td>
             <td><?php echo $row['TEL_PROF']; ?></td>
             <td><?php echo $row['EMAIL_PROF']; ?></td>
             <td><?php echo $row['SPECIALITE']; ?></td>
             <td>
               <a href="modifier-supprimer/modifier.php?edit=<?php echo $row['ID_PROF'];?>" ><i class="material-icons" style="font-size:18px;color:green">update</i></a>  /
               
               <a href="modifier-supprimer/suprimer.php?delete=<?php echo $row['ID_PROF'];?>" onclick=" alert('Vous etes sur de vouloir supprimer ce professeur?')"><i class="material-icons" style="font-size:18px;color:red">delete</i></a>
            </td>
             
          </tr>
          
          
     <?php  
         }?>
        
        <?php 


        
        }else{
            echo "<strong>Classe n'existe pas</strong>";
        }       
        $conn->close();
    }
?>    
</tbody>
</table>
</div>
</body>
</html>

