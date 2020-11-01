<?php
//session_start();
//if(!isset($_POST['password']) or $_POST['password']!="enset"){
//header("location:login.php");
//}



?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="css/style_login.css" />
	</head>
	<body>
	<div class="logos">
	<img src="image/logo.png" alt="logo" class="imgl">
	</div>
	<div class="topnav" >
  <a class="active" href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn" >Gestion des étudiants
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="etudiant/insertEtudiant.php">Ajouter un étudiant</a>
      <a href="etudiant/searchEtudiant.php">Chercher un étudiant</a>
      <a href="etudiant/listerEtudiant.php">La liste des étudiants</a>
      
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des professeurs
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="professeur/insertProf.php">Ajouter un professeur</a>
      <a href="professeur/searchProf.php">Chercher un professeur</a>
      <a href="professeur/listerProf.php">La liste des professeurs</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des absences
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="absence/insertAbsence.php">Ajouter absence</a>
      <a href="absence/afficherAbsence.php">Consulter absence</a>
	  <a href="absence/listerAbsence.php">Liste d'absence</a>
      <a href="#">La fiche d'absence</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Gestion des filliers
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="filiere/insertFiliere.php">Ajouter une filiere</a>
      
      
    </div>
    <div class="dropdown">
    <button class="dropbtn">Gestion des matieres
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="matiere/insertMat.php">Ajouter une matiere</a>
      <a href="matiere/listerMat.php">La liste des matieres</a>
    </div>
  </div>
  </div>

  <a href="logout.php" >Déconnexion</a>
</div>
    
    <div class="sucess">
		<h1>Bienvennue</h1>	</div>

<div class="slideshow-container" align="center">

<div class="mySlides fade">
  <img src="image/1.jpg" style="width:50%">
</div>

<div class="mySlides fade">
  <img src="image/2.jpg" style="width:50%">
</div>

<div class="mySlides fade">
  <img src="image/3.jpg" style="width:50%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<script>
    var slideIndex = 0;
     showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
  </div>
  <footer >
<div style="	background-color: #05021d;padding:18px;bottom:0;width:97%;height:20%">
<div style="float:left; width:500px; text-align: center;"><p style="color: #fff;" ><strong> ENSET </strong><br/><br/> L'Ecole Normale Supérieure de l'Enseignement Technique de Mohammedia de formation des ingénieurs, masters et licences en génie informatique, génie électronique, génie mécanique et génie économique</p></div> 
<div style="float:right; width:400px; text-align: center;"><p style="color: #fff;"><strong> Contactez-nous </strong><br/><br/> Tél: 0539393744 <br/><br/> Email: info@enset.ac.ma </p></div> 
<div style="margin:auto; text-align: center;"><p style="color: #fff;" ><strong>Projet de stage realisé par: <br/><br/> Zaineb OUSAID <br/><br/> Mounia KACEMI</strong></p></div> 
</div>
</footer>
</body>
</html>
