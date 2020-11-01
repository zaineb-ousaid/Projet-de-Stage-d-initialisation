<?php 

session_start();
      require('../../config.php');
        
        if(isset($_POST['modifier'])){

          $cin=$_POST['CIN'];
          $nom=$_POST['nom'];
          $prn=$_POST['pren'];
          $spec=$_POST['spec'];
          $tl=$_POST['tel'];
          $el=$_POST['eml'];
          $clc=$_POST['drp'];

          $plm = $conn->query("SELECT * FROM professeur WHERE action='Non supprime' && CIN='$cin'");
		  $sql="UPDATE professeur SET CIN_PROF='$cin',NOM_PROF='$nom',PRENOM_PROF='$prn',SPECIALITE='$spec',TEL_PROF='$tl',EMAIL_PROF='$el' WHERE CIN_PROF='$cin'";
		  if (mysqli_query($conn,$sql)) {
			$re="SELECT ID_PROF FROM professeur WHERE CIN_PROF='$cin' AND NOM_PROF='$nom' AND PRENOM_PROF='$prn' AND TEL_PROF='$tl' AND EMAIL_PROF='$el' AND SPECIALITE='$spec' ";
		  $rsuu=mysqli_query($conn,$re);  
		while($row1=mysqli_fetch_assoc($rsuu)){
			$idd= $row1["ID_PROF"];
		  
			}
		$sqll="UPDATE coordonner SET ID_CLASSE='$clc',ID_PROF='$idd' WHERE ID_PROF='$idd'";
		mysqli_query($conn,$sqll);  

	}
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
				<h3>Le professeur :</h3>
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
						<td style="color:#2E688A;"  > Spécialité :</td>
						<td><?php echo ($spec) ?></td>
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
				<h2><a href="../listerProf.php">Retour au liste</a></h2>
				<h2><a href="../../index.php">retour à L'accueil</a></h2>
			</div>
	</form>
</body>
</html>
<?php


	}
		
					

				?>
        
      
        
      
          
    