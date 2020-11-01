<!DOCTYPE html>
<html>

<head>
  <title>Lister</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../css/style_etud.css" />
  <link rel="stylesheet" href="../css/style_login.css" />
  <style>
.btn-group .button {
  background-color:cornflowerblue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
/*float: left;*/
}

.btn-group .button:hover {
  background-color: blue;
}
</style>
</head>

<body>
  <div class="logos">
    <img src="../image/logo.png" alt="logo" class="imgl">
  </div>
  <div class="topnav">
    <a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i>Home</a>
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
        <a href="insertAbsence.php">Ajouter absence</a>
        <a href="afficherAbsence.php">Consulter absence</a>
        <a href="listerAbsence.php">Liste d'absence</a>
        <a href="afiche.php">La fiche d'absence</a>
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
        <a href="../matiere/insertMat.php">Ajouter une matiere</a>
        <a href="../matiere/listerMat.php">Liste des matieres</a>

      </div>
    </div>

    <a href="../logout.php">Déconnexion</a>
  </div>
     <div class="main">
     <header>
    <h1>Liste des Absences par Classe </h1>
    <div class="sucess"></div><br/><br/>
</header>
     <div class="btn-group">
     <a href="printListAbsence.php?print=BDCC1"onclick="return confirm('Vous êtes sûr?');"><button class="button"> BDCC1</button></a>
     <a href="printListAbsence.php?print=BDCC2"onclick="return confirm('Vous êtes sûr?');"><button class="button"> BDCC2</button></a>
     <a href="printListAbsence.php?print=GLCID1"onclick="return confirm('Vous êtes sûr?');"><button class="button">GLCID1</button></a>
     <a href="printListAbsence.php?print=GLCID2"onclick="return confirm('Vous êtes sûr?');"><button class="button">GLCID2</button></a>
     <a href="printListAbsence.php?print=GIL1"onclick="return confirm('Vous êtes sûr?');"><button class="button">GIL1</button></a>
     <a href="printListAbsence.php?print=GIL2"onclick="return confirm('Vous êtes sûr?');"><button class="button">GIL2</button></a>
     </div> 
    </div>
 
  </body>
</html>
