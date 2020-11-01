<?php require_once 'modifier-supprimer/suprimer.php';?>
<!DOCTYPE html>
<html>
	<head>
  <title>rechercher un etudiant</title>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <link rel="stylesheet" href="../css/style_etud.css"/>
    <link rel="stylesheet" href="../css/style_login.css" />
    <style>
.alert {
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
      <a href="insertEtudiant.php">Ajouter un étudiant</a>
      <a href="searchEtudiant.php">Chercher un étudiant</a>
      <a href="listerEtudiant.php">La liste des étudiants</a>
      
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
      <a href="../filiere/listerFiliere.php">Liste des filières</a>
      
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des matieres
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../matiere/insertMat.php">Ajouter une matiere</a>
      <a href="../matiere/listerMat.php">La liste des matieres</a>
    </div>
  
  </div>

  <a href="../logout.php">Déconnexion</a>
</div>

<?php
//require_once 'modifier-supprimer/suprimer.php';

if(isset($_SESSION['message'])):?>
<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<?php

echo $_SESSION['message'];
unset($_SESSION['message']);

?>
</div>
<?php endif?>


<div class="main"><br/>
<header>
    <h1>Rechercher Un Etudiant</h1>
    <div class="sucess"></div>
</header>
<form align="center" method="post" action="searchEtudiant.php" >
 
<input  name="keyword" type="text"class="inpp" Maxlength="20" placeholder="CIN,CNE OU NOM ">
<input type="submit" name="rechercher" value="Rechercher" class="right-btn"> 
 
</form>

<br/><br/>

   <?php if(isset($_POST['rechercher'])){ ?>
<table class="t01">
    
   <?php
        
  
        $keyword=$_POST['keyword'];
        $sql=("SELECT etudiant.ID_ETUD,etudiant.CIN,etudiant.CNE,etudiant.NOM_ETUD,etudiant.PRENOM_ETUD,etudiant.DATE_NAISS,etudiant.LIEU_NAISS,etudiant.TEL_ETUD,etudiant.EMAIL_ETUD,classe.CLASSE FROM etudiant,classe WHERE etudiant.CIN LIKE '$keyword' or etudiant.CNE LIKE '$keyword' or etudiant.NOM_ETUD LIKE '$keyword'  AND etudiant.ID_CLASSE=classe.ID_CLASSE");
        $result=$conn->query($sql);
        if($result->num_rows>0){ ?>
            
            <thread class="alert-info">
        <tr>
            <th>CNE</th>
            <th>PRENOM</th>
            <th>NOM</th>
            <th>CIN</th>
            <th>DATE DE NAISSANCE</th>
            <th>LIEU DE  NAISSANCE</th>
            <th>TELEPHONE</th>
            <th>EMAIL</th>
            <th>Modifier/<br/>suprrimer</th>
        </tr>
            </thread>
    <tbody> 
      <?php  while($row=$result->fetch_assoc()) {  ?>
          <tr>
            <td><?php echo $row['CNE']; ?></td>
             <td><?php echo $row['PRENOM_ETUD']; ?></td>
             <td><?php echo $row['NOM_ETUD']; ?></td>
             <td><?php echo $row['CIN']; ?></td>
             <td><?php echo $row['DATE_NAISS']; ?></td>
             <td><?php echo $row['LIEU_NAISS']; ?></td>
             <td><?php echo $row['TEL_ETUD']; ?></td>
             <td><?php echo $row['EMAIL_ETUD']; ?></td>
             <td>
               <a href="modifier-supprimer/modifier.php?edit=<?php echo $row['ID_ETUD'];?>" ><i class="material-icons" style="font-size:18px;color:green">update</i></a>  /
               
               <a href="modifier-supprimer/suprimer.php?delete=<?php echo $row['ID_ETUD'];?>"  onclick=" alert('Vous etes sur de vouloir supprimer cet etudiant?')"   ><i class="material-icons" style="font-size:18px;color:red">delete</i></a>
            </td>
             
          </tr>
          
          
     <?php  
         }?>
        
        <?php 


        
        }else{
            echo "<strong>aucune resultat.</strong>";
        }       
        $conn->close();
    }
?>
    
    </tbody>
</table>
</div> 

</body>
</html>
