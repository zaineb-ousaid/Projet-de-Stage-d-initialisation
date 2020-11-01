<?php
require('../config.php');
if (isset($_POST["btn"])) {

	$cin=$_POST['CIN'];
	$cne=$_POST['CNE'];
	$nom=$_POST['nom'];
	$prn=$_POST['pren'];
	$nais=$_POST['datenais'];
	$li=$_POST['lieu'];
	$tl=$_POST['tel'];
	$el=$_POST['eml'];
	$clc=$_POST['drp'];

	$plm = $conn->query("SELECT * FROM etudiant WHERE action='Non supprime' && CIN='$_POST[CIN]'");
    
	/*if($plm->num_rows > 0) {
		echo '<script type="text/javascript">   alert("deja exist") </script>';

	} else{ */
		$sql="INSERT INTO etudiant(CIN,CNE,NOM_ETUD,PRENOM_ETUD,DATE_NAISS,LIEU_NAISS,TEL_ETUD,EMAIL_ETUD,ID_CLASSE) VALUES ('$cin','$cne','$nom','$prn','$nais','$li','$tl','$el','$clc')";
		
		mysqli_query($conn,$sql);
	


?>

<html>
<head>
	<title>Inscription</title>
	<meta charset="UTF-8" >
	<style>
			body{background-color: #B0B0B0;}
			form{
				box-shadow: 1px 6px 17px white;
				margin-right:  35%;
				margin-left: 35%;
				margin-top: 80px;
				padding-top: 20px;
				padding-bottom: 20px;

				
				}
				form{
					background-color: white;
				}	
	</style>
</head>

<body>
	<form>
			<div align="center"> 
				<h3>L'etudiant :</h3>
				<table align="center">
					<tr style="color:#6C2673; font-size:20px; font-style:bold;" > 
						<td><?php echo ($nom) ?></td>
						<td><?php echo ($prn) ?></td>
					</tr>
					
					<tr>
						<td style="color:#2E688A;"  > CIN :</td>
						<td><?php echo ($cin) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A;"  > CNE :</td>
						<td><?php echo ($cne) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A;"  > Date de Naissance :</td>
						<td><?php echo ($nais) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A; "> Lieu de Naissance :</td>
						<td><?php echo ($li) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A; "> Telephone :</td>
						<td><?php echo ($tl) ?></td>
					</tr>

					<tr>
						<td style="color:#2E688A; "> Email :</td>
						<td><?php echo ($el) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A; "> Classe :</td> 
						<td><?php  
									$e=$_POST['drp'];
								$t="select CLASSE from classe where ID_CLASSE=$e";
								$y=mysqli_query($conn,$t);
						while($ro = mysqli_fetch_array($y)):;
									 echo $ro[0];
							?>
            

            <?php endwhile;?> 
					</td>
					</tr>
					
				</table>
				<h3>est bien enregistrer</h3>
				<h2><a href="insertEtudiant.php">Ajouter un nouveau Etudiant</a></h2>
				<h2><a href="../index.php">retour à L'accueil</a></h2>
			</div>
	</form>
</body>
</html>
<?php


	}
		//}
					

					?>