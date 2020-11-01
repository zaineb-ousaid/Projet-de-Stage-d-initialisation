<?php 

session_start();
      require('../../config.php');
        
        if(isset($_POST['modifier'])){
        
          $cin=$_POST['CIN'];
          $cne=$_POST['CNE'];
          $nom=$_POST['nom'];
          $prn=$_POST['pren'];
          $nais=$_POST['datenais'];
          $li=$_POST['lieu'];
          $tl=$_POST['tel'];
          $el=$_POST['eml'];
          $clc=$_POST['drp'];

          $plm = $conn->query("SELECT * FROM etudiant WHERE action='Non supprime' && CIN='$cin");
    
          $sql="UPDATE etudiant SET CIN='$cin',CNE='$cne',NOM_ETUD='$nom',PRENOM_ETUD='$prn',DATE_NAISS='$nais',LIEU_NAISS='$li',TEL_ETUD='$tl',EMAIL_ETUD='$el',ID_CLASSE='$clc' WHERE CNE='$cne'";
        mysqli_query($conn,$sql);  
        ?>
        <html>
<head>
	<title>Modification</title>
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
				<h3>est bien modifiee.</h3>
				<h2><a href="../listerEtudiant.php">Retour au liste</a></h2>
				<h2><a href="../../index.php">Retour à L'accueil</a></h2>
			</div>
	</form>
</body>
</html>
<?php


	}
		
					

				?>
        
      
          
    