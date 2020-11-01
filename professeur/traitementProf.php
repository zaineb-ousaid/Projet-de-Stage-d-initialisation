<?php
require('../config.php');


			if (isset($_POST["btn"])) {	
					$ci=$_POST['cin'];
					$nom=$_POST['nom'];
					$splt=$_POST['splt'];
                    $tel=$_POST['tel'];
                    $prn=$_POST['prn'];
					$eml=$_POST['eml'];
					$cl=$_POST['se'];
	$tiw = $conn->query("SELECT * FROM professeur INNER JOIN coordonner ON professeur.ID_PROF=cordonner.ID_PROF WHERE Action='Non Supprime' && CIN_PROF='$_POST[cin]' ");
	
                    
					$req="INSERT INTO professeur(ID_PROF,CIN_PROF,NOM_PROF,PRENOM_PROF,TEL_PROF,EMAIL_PROF,SPECIALITE) values (NULL,'$ci','$nom','$prn',$tel,'$eml','$splt')";
                   
						if (mysqli_query($conn,$req)) {
							$re="SELECT ID_PROF FROM professeur WHERE CIN_PROF='$ci' AND NOM_PROF='$nom' AND PRENOM_PROF='$prn' AND TEL_PROF='$tel' AND EMAIL_PROF='$eml' AND SPECIALITE='$splt' ";
	                        $rsuu= mysqli_query($conn, $re);
	                        while($row1=mysqli_fetch_assoc($rsuu)){
		                          $prof= $row1["ID_PROF"];
	                            
	                              }
     
							$r="INSERT INTO coordonner(ID_CLASSE,ID_PROF) values('$cl','$prof')";
							mysqli_query($conn,$r);
}
					

				//	mysql_close();
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
				padding-top: 10px;
				padding-bottom: 10px;
				
				}
				form{
					background-color: white;
				}	
	</style>
</head>

<body>
	<form>
			<div align="center"> 
				<h3>Le professeur :</h3>
				<table align="center">
					
					<tr style="color:#6C2673; font-size:20px; font-style:bold;" > 

						<td><?php echo ($nom."\t".$prn) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A;"  > CIN :</td>
						<td><?php echo ($ci) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A;"  > Specialité :</td>
						<td><?php echo ($splt) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A; "> Telephone :</td>
						<td><?php echo ($tel) ?></td>
					</tr>
					<tr>
						<td style="color:#2E688A; "> Email :</td>
						<td><?php echo ($eml) ?></td>
					</tr>
				</table>
				<h3>est bien enregistrer</h3>
				<h2><a href="insertProf.php">Ajouter un nouveau professeur</a></h2>
				<h2><a href="../index.php">retour à L'acceuil</a></h2>
			</div>
	</form>
</body>
</html>
<?php


	}
		
					

					?>