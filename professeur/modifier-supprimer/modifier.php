<?php
session_start();
require('../../config.php');
$qr = "SELECT * FROM `classe`";
$resu= mysqli_query($conn, $qr);

if(isset($_GET['edit'])){
$id=$_GET['edit'];

$result=$conn->query("SELECT *FROM professeur,classe,coordonner WHERE professeur.ID_PROF=$id AND coordonner.ID_CLASSE=classe.ID_CLASSE AND professeur.ID_PROF=coordonner.ID_PROF ");
if($result->num_rows){
  $row = $result->fetch_array();

  $cin=$row['CIN_PROF'];
  $nom=$row['NOM_PROF'];
  $pren=$row['PRENOM_PROF'];
  $spec=$row['SPECIALITE'];
  $tel=$row['TEL_PROF'];
  $eml=$row['EMAIL_PROF'];
  $class=$row['CLASSE'];
  $cl=$row['ID_CLASSE'];

}

}
?>

<!DOCTYPE html>
<html>
  <title>modifier</title>
	<head>
    <link rel="stylesheet" href="../../css/style_etud.css"/>
	<link rel="stylesheet" href="../../css/style_login.css" />
	</head>
	<body>
	<div class="logos">
	<img src="../../image/logo.png" alt="logo" class="imgl">
	</div>
	<div class="topnav">
  <a class="active" href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Gestion des étudiants
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../etudiant/insertEtudiant.php">Ajouter un étudiant</a>
      <a href="../../etudiant/searchEtudiant.php">Chercher un étudiant</a>
      <a href="../../etudiant/listerEtudiant.php">La liste des étudiants</a>
      
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des professeurs
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../insertProf.php">Ajouter un professeur</a>
      <a href="../searchProf.php">Chercher un professeur</a>
      <a href="../listerProf.php">La liste des professeurs</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des absences
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../absence/insertAbsence.php">Ajouter absence</a>
      <a href="../../absence/afficherAbsence.php">Consulter absence</a>
	  <a href="../../absence/listerAbsence.php">Liste d'absence</a>
      <a href="../../absence/afiche.php">La fiche d'absence</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des filières
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../filiere/listerFiliere.php">Liste des filières</a>
      
      
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des matieres
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../../matiere/insertMat.php">Ajouter une matiere</a>
      <a href="../../matiere/listerMat.php">La liste des matieres</a>
    </div>
  
  </div>

  <a href="../../logout.php">Déconnexion</a>
</div>

    <div class="main">
		<header >
			<h1>Modifier Un professeur</h1>
			<div class="success"></div>
		</header>

		<form action="modifierTrait.php" method="POST" enctype="multipart/form-data" autocomplete="off">

				<table>
 
        <tbody>
        <tr>
        	 <td><label>N° Carte d'identité nationale </label></td>
				<td><input type="text" name='CIN'  Maxlength="8"  class="inp" value="<?php echo $cin?>" placeholder="CIN*" required></td>
            <td class="pd"><label>Nom </label></td>
				<td><input type="text" name='nom' class="inp" value="<?php echo $nom?>" placeholder="Nom*" required></td>
            
				
        </tr>
        <tr>
        	<td > Spécialité   </td>
				<td><input type="text" name='spec' class="inp" value="<?php echo $spec?>" placeholder="Specialité*" required></td>
				<td class="pd"> Prenom   </td>
			<td><input type="text" name='pren' class="inp" value="<?php echo $pren?>" placeholder="Prenom*" required></td>
        	
        </tr>	

        <tr>
        	
        	<td>Email </td>
        	<td>	<input type="email" name='eml' class="inp" value="<?php echo $eml?>" placeholder="NomPrenom@email.com" required></td>
			<td class="pd">  Telephone </td>
			<td><input type="text" name='tel' class="inp" Maxlength="10" value="<?php echo $tel?>" placeholder="Tel*"  required></td>

        </tr>
        
        <tr>
        	
        	<td > Classe </td>
        	<td><select  class="inp" value="classe" name="drp">
          <option value="<?php echo $cl ?>">---<?php echo $class?>---</option>

            <?php while($row1 = mysqli_fetch_array($resu)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

       			 </select></td>
        </tr>	
       
    </tbody>
</table>
  
			
        <input type="submit" name="modifier" value="Modifier" class="sub-btn"> 
        
			</form>
	</div>


	</body>
</html>