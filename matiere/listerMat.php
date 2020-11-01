<?php 
require_once 'modifierSup.php';


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
      .alert1 {
  padding: 20px;
  background-color: #008000;
  color: white;
}
.alert2 {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

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
<?php 
if(isset($_SESSION['messageModi'])):?>
<div class="alert1"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<?php

echo $_SESSION['messageModi'];
unset($_SESSION['messageModi']);

?>
</div>
<?php endif?>

<?php 
if(isset($_SESSION['messageSupr'])):?>
  <div class="alert2"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <?php
  
  echo $_SESSION['messageSupr'];
  unset($_SESSION['messageSupr']);
  
  ?>
  </div>
  <?php endif?>

<div class="main"><br/>
<header>
    <h1>Liste des Matières</h1>
    <div class="sucess"></div>
</header>

<br/><br/>

<table class="t01">
    
   <?php
      
        $sql=("SELECT ID_MATIERE, MATIERE,NOM_PROF,FILIERE FROM matiere,professeur,filiere WHERE  matiere.ID_PROF=professeur.ID_PROF AND  matiere.ID_FILLIERE=filiere.ID_FILLIERE");
        $result=$conn->query($sql);
        if($result->num_rows>0){ ?>
            
            <thread class="alert-info">
        <tr>
            
            
            <th>Matiére</th>
            <th>Nom de Professeur</th>
            <th>Filière</th>
          
            
        </tr>
            </thread>
         <tbody> 
      <?php  while($row=$result->fetch_assoc()) {  ?>
          <tr>
          
             <td><?php echo $row['MATIERE']; ?></td>
             <td><?php echo $row['NOM_PROF']; ?></td>
             <td><?php echo $row['FILIERE']; ?></td>
          
             <td>
               <a href="modifierSup.php?edit=<?php echo $row['ID_MATIERE'];?>" ><i class="material-icons" style="font-size:18px;color:green">update</i></a>  /
               
               <a href="modifierSup.php?delete=<?php echo $row['ID_MATIERE'];?>" ><i class="material-icons" style="font-size:18px;color:red">delete</i></a>
            </td>
             
          </tr>
          
          
     <?php  
         }?>
        
        <?php 


        
        }     
        $conn->close();
    
?>    
</tbody>
</table>
</body>
</html>

