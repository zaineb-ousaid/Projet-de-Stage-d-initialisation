<?php

require('../config.php');

// mysql select query  [filliere]
$query = "SELECT * FROM `filiere` ";
$result1 = mysqli_query($conn, $query);
// mysql select query [professeur]
$q = "SELECT DISTINCT * FROM `professeur`";
$res = mysqli_query($conn, $q);


if (isset($_POST["btn"])) {
     
        $f=$_POST['drp'];
        $p=$_POST['se'];
        $ma=$_POST['mat'];
        
        
			$sql="INSERT INTO matiere (ID_MATIERE,ID_FILLIERE,ID_PROF,MATIERE) VALUES (NULL ,'$f','$p','$ma')";
			$ola=mysqli_query($conn,$sql);
				if($ola){
				echo '<script type="text/javascript">   alert("Ajouté avec success") </script>';

			}
			else{
				echo '<script type="text/javascript">   alert("Echec d\'ajout") </script>';
			}	
			}


//mysql_close();



?>




<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" >
	<title>Ajouter</title>
	<link rel="stylesheet" type="text/css" href="../css/style_login.css">
	<link rel="stylesheet" type="text/css" href="../css/style_etud.css">
	<style type="text/css">
		
			.main{

					width: 600px;
					background-color: #eee;
					margin: 50px auto;
					padding: 10px;
					box-shadow: 2px 3px 10px #555;
					border-radius: 5px;
					text-align: center;
					padding-left: 1px;

		}
		.inp{
				width: 38em;
		}
		label{
			text-align: right;
		}
		h1{
			margin-bottom: 20px;
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
      <a href="../absence/consulter.php">Consulter absence</a>
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
      <a href="insertMat.php">Ajouter une matieres</a>
      <a href="listerMat.php">Liste des matieres</a>
      
    </div>
  </div>

  <a href="logout.php">Déconnexion</a>
</div>
<div class="main">
		<header >
			
			<div class="success"></div>
			<h1>Ajouter Une Matière</h1>
		</header>
		
				
<!-- *************************************************************-->
<!-- *************************************************************-->
<form action=""  method="POST" enctype="multipart/form-data" autocomplete="off">
				<table>
 
    <tbody>
        <tr>
            <td class="pd"><label>Filière :</label></td>
				<td>
					<select  class="inp"  name="drp">
          <option value="">--- Select ---</option>  

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[2];?></option>

            <?php endwhile;?>

       			 </select>
       			</td>
       			</tr>
       			<tr>
            <td class="pd"><label> Professeur :</label></td>
            	<td><select  class="inp"  name="se" >
              <option value="">--- Select ---</option>  

            <?php while($ro = mysqli_fetch_array($res)):;?>

            <option value="<?php echo $ro[0];?>"><?php echo $ro[1];?></option>

            <?php endwhile;?>

       			 </select>  </td>
				
        </tr>
        			<tr>
            <td class="pd"><label> Matière :</label></td>
            	<td><input type="text" name="mat" class="inp"  required>
            		  </td>
				
        </tr>
       
  </tbody>
        </table>

       
        <input  type="submit" name="btn" value="Ajouter" class="sub-btn">
        <input type="reset" class="btn" />

			</form>
	</div>
</body>
</html>
