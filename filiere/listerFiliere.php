<?php
require('../config.php');
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
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}


.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
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
     
      <a href="listerFiliere.php">Liste des filières</a>
      
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
    <h1>Liste des Filières</h1><br/><br/>
    <div class="sucess"></div>
</header>

<table class="t01">
    
   <?php
        $sql=("SELECT * FROM filiere,departement WHERE filiere.ID_DEPAR=departement.ID_DEPAR ");
        $result=$conn->query($sql);
        if($result->num_rows>0){ ?>
            
            <thread class="alert-info">
        <tr>
            
        <th>Filière</th>
            <th>Département</th>
            <th>Chef de département</th>
            
        </tr>
            </thread>
    <tbody> 
      <?php  while($row=$result->fetch_assoc()) {  ?>
          <tr>
          <td><?php echo $row['FILIERE']; ?></td>
             <td><?php echo $row['NOM_DEPAR']; ?></td>
             <td><?php echo $row['CHEF_DEPAR']; ?></td>
             
          </tr>
          
          
     <?php  
         }?>
        
        <?php 

       
        $conn->close();
    }
?>    
</tbody>
</table>
</body>
</html>
