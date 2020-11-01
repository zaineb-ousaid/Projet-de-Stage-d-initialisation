<?php
require('../config.php');
$qr = "SELECT * FROM `classe`";
$resu= mysqli_query($conn, $qr);
?>

<!DOCTYPE html>
<html>
  <title>ajouter un etudiant</title>
	<head>
    <link rel="stylesheet" href="../css/style_etud.css"/>
	<link rel="stylesheet" href="../css/style_login.css" />
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
      <a href="../filiere/listerFiliere.php">Liste des filieres</a>
      
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

    <div class="main">
		<header >
			<h1>Ajouter Un Etudiant</h1>
			<div class="success"></div>
		</header>

		<form action="trait_etud.php" method="POST" enctype="multipart/form-data" autocomplete="off">

				<table>
 
    <tbody>
        <tr>
            <td><label>N° Carte d'identité nationale </label></td>
				<td><input type="text" name="CIN" Maxlength="8" class="inp" placeholder="CIN*" required></td>
            <td class="pd"><label> Code national de l'étudiant</label></td>
            	<td><input type="text" name="CNE" Maxlength="10" class="inp" placeholder="CNE*" required>  </td>
				
        </tr>
        <tr>
        	<td> Le Nom de l'étudiant      </td>
				<td><input type="text" name="nom" class="inp" placeholder="Nom*" required></td>
        	<td class="pd">  Le Prenom de l'étudiant </td>
				<td><input type="text" name="pren" class="inp" placeholder="Prenom*" required></td>
        </tr>	

        <tr>
        	<td>Date de Naissance de l'étudiant </td>
        	<td><input type="date" class="inp"   name="datenais" value="0000-00-00" min="1990-01-01" max="2020-12-31"></td>
			<td class="pd"> lieu de Naissance      </td>
			<td><input type="text" name="lieu" class="inp" placeholder="Lieu*" required></td>

        	
        </tr>
         <tr>
        	<td>Telephone  </td>
        	<td><input type="text" name="tel" Maxlength="10" class="inp" placeholder="Tel*"  required></td>
        	<td class="pd"> Email de l'étudiant </td>
        	<td><input type="email" name="eml" class="inp" placeholder="NomPrenom@email.com*" required></td>
        </tr>
         <tr>
        <td > Classe </td>
        	<td><select  class="inp"  name="drp" value="classe">

            <?php while($row1 = mysqli_fetch_array($resu)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select></td>
        </tr>
      
       
    </tbody>
</table>
	
			
				<input type="submit" name="btn" value="Ajouter" class="sub-btn"> 
			</form>
	</div>


	</body>
</html>
