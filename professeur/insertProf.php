<?php
require('../config.php');
$q = "SELECT * FROM `classe`";
$so = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html>
	<head>
  <link rel="stylesheet" href="../css/style_login.css" />
  <link rel="stylesheet" href="../css/style_etud.css" />

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
      <a href="../filiere/insertFiliere.php">Ajouter une filiere</a>
      <a href="../filiere/listeFiliere.php">Liste des filieres</a>
      
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

<div class="main">
		<header >
			<h1>Ajouter Un Professeur</h1>
			<div class="success"></div>
		</header>
		<form action="traitementProf.php" method="POST" enctype="multipart/form-data" autocomplete="off">

			<table>
 
    <tbody>
        <tr>
        	 <td><label>N° Carte d'identité nationale </label></td>
				<td><input type="text" name='cin'  Maxlength="8"  class="inp" placeholder="CIN*" required></td>
            <td class="pd"><label>Nom </label></td>
				<td><input type="text" name='nom' class="inp" placeholder="Nom*" required></td>
            
				
        </tr>
        <tr>
        	<td > Spécialité   </td>
				<td><input type="text" name='splt' class="inp" placeholder="Specialité*" required></td>
				<td class="pd"> Prenom   </td>
			<td><input type="text" name='prn' class="inp" placeholder="Prenom*" required></td>
        	
        </tr>	

        <tr>
        	
        	<td>Email </td>
        	<td>	<input type="email" name='eml' class="inp"  placeholder="NomPrenom@email.com" required></td>
          <td class="pd">Telephone  </td>
        	<td><input type="text" name="tel" Maxlength="10" class="inp" placeholder="Tel*"  required></td>
        </tr>
        
        <tr>
        	
        	<td > Classe </td>
        	<td><select  class="inp"  name="se">
          <option value="">--- Select ---</option>  

            <?php while($ro = mysqli_fetch_array($so)):;?>

            <option value="<?php echo $ro[0];?>"><?php echo $ro[1];?></option>

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