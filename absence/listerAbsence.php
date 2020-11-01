<?php
require('../config.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Lister</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../css/style_etud.css" />
  <link rel="stylesheet" href="../css/style_login.css" />
  <style>
    .alert1 {
      padding: 20px;
      background-color: #008000;
      color: white;
    }

    .alert2 {
      padding: 20px;
      background-color: #f44336;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }

    table {
      width: 100%;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 9px;
      text-align: left;
    }

    th {
      background-color: rgb(30, 8, 153);
      color: white;
    }

    #t01 tr:nth-child(even) {
      background-color: #eee;
    }

    #t01 tr:nth-child(odd) {
      background-color: #fff;
    }

    #t01 th {
      background-color: blue;
      color: white;
    }
    body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background:blue;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
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
  <?php
  if (isset($_SESSION['messageModi'])) : ?>
    <div class="alert1"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php

      echo $_SESSION['messageModi'];
      unset($_SESSION['messageModi']);

      ?>
    </div>
  <?php endif ?>

  <?php
  if (isset($_SESSION['messageSupr'])) : ?>
    <div class="alert2"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php

      echo $_SESSION['messageSupr'];
      unset($_SESSION['messageSupr']);

      ?>
    </div>
  <?php endif ?>

  <div style="width:85%;" class="main"><br />
    <header>
      <h1>Liste des Absences</h1>
      <div class="sucess"></div>
    </header>

    <br /><br/>
    <?php
    if (isset($_POST['keyword'])) {
      $keyword = $_POST['keyword'];
      $req = ("SELECT ID_ETUD FROM etudiant,classe WHERE classe.ID_CLASSE=etudiant.ID_CLASSE AND CLASSE LIKE '$keyword' OR CNE LIKE '$keyword' OR NOM_ETUD LIKE '$keyword' OR PRENOM_ETUD LIKE '$keyword'");
      $res = mysqli_query($conn, $req);
      while ($row1 = mysqli_fetch_assoc($res)) {
        $id = $row1["ID_ETUD"];


        $sql = ("SELECT * FROM absence,etudiant,matiere,professeur,classe WHERE  (matiere.ID_PROF=professeur.ID_PROF AND  absence.ID_ETUD=etudiant.ID_ETUD AND absence.ID_MATIERE=matiere.ID_MATIERE AND etudiant.ID_CLASSE=classe.ID_CLASSE)
        AND absence.ID_ETUD='$id'");
      }
    }  else {
      $sql = ("SELECT * FROM absence,etudiant,matiere,professeur,classe WHERE  matiere.ID_PROF=professeur.ID_PROF AND  absence.ID_ETUD=etudiant.ID_ETUD AND absence.ID_MATIERE=matiere.ID_MATIERE AND etudiant.ID_CLASSE=classe.ID_CLASSE");
      $keyword = "";
    }

    $result = mysqli_query($conn, $sql);


    ?>
    <form class="example" action="" method="post" style="margin:auto;max-width:300px">
      
        <input name="keyword" type="text" placeholder="Classe,Nom,prenom">
        <button type="submit"name="btn"><i class="fa fa-fw fa-search"></i></button>
      
    </form>

    <br />
    <br />

    <table class="t01">

      <?php
      if($result->num_rows>0){ 
      ?>

      <thread class="alert-info">
        <tr>
          <th>CNE</th>
          <th>Prenom </th>
          <th>Nom</th>
          <th>Classe</th>
          <th>Matiére</th>
          <th>Professeur</th>
          <th>Date d'absence</th>
          <th>Heure d'absence</th>
          <th>justification</th>
          <th>Commentaire</th>
         


        </tr>
      </thread>
      <tbody>
        <?php while ($row = mysqli_fetch_object($result)) {
        ?>
          <tr>

            <td><?php echo $row->CNE; ?></td>
            <td><?php echo $row->PRENOM_ETUD; ?></td>
            <td><?php echo $row->NOM_ETUD; ?></td>
            <td><?php echo $row->CLASSE; ?></td>
            <td><?php echo $row->MATIERE; ?></td>
            <td><?php echo $row->NOM_PROF; ?></td>
            <td><?php echo $row->DATE; ?></td>
            <td> <?php echo $row->HEURE; ?></td>
            <td><?php echo $row->JUSTIFIER; ?></td>
            <td><?php echo $row->COMM_ABS; ?></td>
            <td>
              <a href="modifier_supprimer.php?edit=<?php echo $row->CODE_ABSENCE; ?>"><i class="material-icons" style="font-size:18px;color:green">update</i></a> 
              <a href="modifier_supprimer.php?delete=<?php echo $row->CODE_ABSENCE; ?>"><i class="material-icons" style="font-size:18px;color:red">delete</i></a>
            </td>

          </tr>

        <?php

        }
        //$conn->close();
         }else{
          echo'aucun valeur.';
        }

        ?>

      </tbody>
    </table>
</body>

</html>