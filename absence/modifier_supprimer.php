<?php
// var_dump($_GET);
session_start();
require('../config.php');
if (isset($_GET['delete'])) {

  $id = $_GET['delete'];
  $conn->query("DELETE FROM absence WHERE CODE_ABSENCE=$id");

  $_SESSION['messageSupr'] = "Absence est suprimée!";
  header("location:listerAbsence.php");
}

if (isset($_POST['valider'])) {

  $idEtud = $_POST['idEtud'];
  $matiere = $_POST['matiere'];
  $date = $_POST['dateAbs'];
  $heure = $_POST['heure'];
  $justifier = $_POST['jus'];
  $commentaire = $_POST['comm'];
  $id = $_POST['id'];
  $req = "UPDATE absence SET ID_ETUD='$idEtud',ID_MATIERE='$matiere',DATE='$date',HEURE='$heure',JUSTIFIER='$justifier',COMM_ABS='$commentaire'  WHERE CODE_ABSENCE ='$id'";
  if(mysqli_query($conn, $req)){
  $_SESSION['message'] = "Absence est bien ajoutée!";
  }
  //header("location:modifier-supprimer.php");    
}

$qr = "SELECT * FROM `classe`";
$resu = mysqli_query($conn, $qr);

?>

<!DOCTYPE html>
<html>
<title>ajouter une absence</title>

<head>
  <link rel="stylesheet" href="../css/style_etud.css" />
  <link rel="stylesheet" href="../css/style_login.css" />
  <link rel="stylesheet" href="../css/styleMod.css" />
  <style>
    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 16px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 20px;
      width: 20px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked~.checkmark {
      background-color: rgb(3, 8, 71);
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }


    /* Show the indicator (dot/circle) when checked */
    .container input:checked~.checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }

    .alert {
      padding: 20px;
      background-color: #008000;
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
      text-align: center;

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
  <?php
  if (isset($_SESSION['message'])) : ?>
    <div class="alert"><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <?php

      echo $_SESSION['message'];
      unset($_SESSION['message']);

      ?>
    </div>
  <?php endif ?>
  <div class="main">
    <header>
      <h1>Ajouter Une absence</h1>
      <div class="success"></div>
    </header>
    <form align="center" method="post" action="">
      <?php
      if (isset($_GET["edit"])) {
        $id = $_GET['edit'];


        $result = $conn->query("SELECT * FROM absence,etudiant,matiere,professeur,classe WHERE  matiere.ID_PROF=professeur.ID_PROF AND  absence.ID_ETUD=etudiant.ID_ETUD AND absence.ID_MATIERE=matiere.ID_MATIERE AND etudiant.ID_CLASSE=classe.ID_CLASSE AND CODE_ABSENCE='$id'");
      ?>


        <form action="trait_Abs.php" method="post">
          <table class="t01">

            <?php
            //if($result->num_rows>0){  
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

              <?php $i = 0;
              while ($row = $result->fetch_assoc()) {
                $i++;
                $cne = $row['CNE'];
                $prenom = $row['PRENOM_ETUD'];
                $nom = $row['NOM_ETUD'];
                $classe = $row['CLASSE'];
                $idMat = $row['ID_MATIERE'];
                $matiere = $row['MATIERE'];
                $prof = $row['NOM_PROF'];
                $date = $row['DATE'];
                $heure = $row['HEURE'];
                $juste = $row['JUSTIFIER'];
                $com = $row['COMM_ABS'];
                $idEtud = $row['ID_ETUD'];
                //$id=$row['ID_ETUD'];
                //$cin=$row['CIN'];
                // $nom=$row['NOM_ETUD'];
                // $prenom=$row['PRENOM_ETUD'];

                $q = "SELECT * FROM `matiere`";
                $so = mysqli_query($conn, $q);

              ?>
                <tr>
                  <td><?php echo $cne; ?></td>
                  <td><?php echo $prenom; ?></td>
                  <td><?php echo $nom; ?></td>
                  <td><?php echo $classe; ?></td>
                  <td><?php echo $matiere; ?></td>
                  <td><?php echo $prof; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $heure; ?></td>
                  <td><?php echo $juste; ?></td>
                  <td><?php echo $com; ?></td>
                  <td style="width:168px;" ><a href="#" class="button1" id="<?php echo $id; ?>" valeur="<?php echo $id; ?>">Noter absence</a></td>

                  <div class="popup">
                    <div class="popup-content1">
                      <img src="../image/5.png" alt="absence" style="height: 160px;width: 150px;left:110px; margin: 10px auto 20px; display: block;">
                      <img src="../image/close.png" alt="close" class="close">
                      <br>
                      <div class="left">
                        <p>La Date :<input type="date" class="inp" name="dateAbs" value="<?php echo $date; ?>" min="1990-01-01" max="2020-12-31" /></p>
                        <br>
                        <p>heure :</p> <select class="inp" value="<?php echo $heure; ?>" name="heure" style="margin: 10px 10px;">
                          <option value="<?php echo $heure; ?>"><?php echo $heure; ?></option>



                          <option value="8:30-10:30">8:30-10:30</option>
                          <option value="10:30-12:30">10:30-12:30</option>
                          <option value="14:00-16:00">14:00-16:00</option>
                          <option value="16:00-18:00">16:00-18:00</option>



                        </select></p>
                        <br>
                        <p>Commentaire : </p><input type="textarea" name="comm" value="<?php echo $com; ?>" cols="45" rows="5" style="background: #fff;" class="inp">
                      </div>
                      <div class="right">
                        <p>Matiere:</p>
                        <select class="inp" name="matiere" style="margin: 10px 10px;">
                          <option value="<?php echo $idMat; ?>"><?php echo $matiere; ?> </option>

                          <?php while ($ro = mysqli_fetch_array($so)) :; ?>

                            <option value="<?php echo $ro[0]; ?>"><?php echo $ro[3]; ?></option>

                          <?php endwhile; ?>

                        </select>
                        <br>
                        <br>
                        <p>Justification : <input type="text" name="jus" placeholder="OUI/NON" value="<?php echo $juste; ?>" class="inp" /></p>
                      </div>
                      <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                      <input type="hidden" name="idEtud" value="<?php echo "$idEtud"; ?>">
                      <div class="center">
                        <br><br><br><br><br><br><br>
                       <!-- <input type="submit" value="valider" name="valider" class="button1">-->
                        <button class="button1" name="valider">Valider</button>
                      </div>

                    </div>
                  </div>

                  <script>
                    document.getElementById("<?php echo $id; ?>").addEventListener("click", function() {
                      document.querySelector(".popup").style.display = "flex";
                    })
                    document.querySelector(".close").addEventListener("click", function() {
                      document.querySelector(".popup").style.display = "none";

                    })
                  </script>
                <?php
              }

              $conn->close(); ?>

            </tbody>
          </table>
        </form>
      <?php
      }
      //}
      ?>
</body>

</html>
<?php


?>