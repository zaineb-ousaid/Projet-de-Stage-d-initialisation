<?php

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

function fill_unit_select_box_class($connect)
{ 
 $output = '';
 $query = "SELECT * FROM classe  ORDER BY ID_CLASSE ASC  ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["ID_CLASSE"].'">'.$row["CLASSE"].'</option>';
 }
 return $output;
}
function fill_unit_select_box_mat($connect)
{ 
 $output = '';
 $query = "SELECT * FROM matiere  ORDER BY ID_MATIERE ASC  ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["ID_MATIERE"].'">'.$row["MATIERE"].'</option>';
 }
 return $output;
}
?>

<!DOCTYPE html>
<html>
  <title>ajouter une absence</title>
	<head>    
    <link rel="stylesheet" href="../css/style_etud.css"/>
	<link rel="stylesheet" href="../css/style_login.css" />
  <link rel="stylesheet" href="../css/stylee.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
  .alert{
background:red;
color:white;
padding:10px;
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
  .container:hover input ~ .checkmark {
    background-color: #ccc;
  }
  
  /* When the radio button is checked, add a blue background */
  .container input:checked ~ .checkmark {
    background-color: rgb(3, 8, 71);
  }
  
  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }
  
  
  /* Show the indicator (dot/circle) when checked */
  .container input:checked ~ .checkmark:after {
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
		width:100%;
	  }
	  table, th, td {
		border: 1px solid black;
    border-collapse: collapse;
	  }
	  th, td {
		padding: 9px;
    text-align: left;
    }
    th{
      background-color: rgb(30, 8, 153);
      color:white;
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

<div style="width:80%" class="main">
		<header >
			<h1>Ajouter Une absence</h1>
			<div class="success"></div>
   <form method="post" id="insert_form">
    <div class="t01">
     <span id="error"></span>
     <br>
     <label style=" float: left;">La Date :<input style="background: #c0baee;"  type="date" class="inp"   name="dateAbs" value="0000-00-00" min="1990-01-01" max="2020-12-31"/></label>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th> Classe </th>
       <th> Nom et Prenom </th>
       <th> Matiere </th>
       <th> Heure </th>
       <th> Justifier </th>
       <th> commentaire </th>

       <th><button style=" background-color: green;padding: 10px 15px;font-weight: bolder;border:none;color:white;" type="button" name="add" class="btn btn-success btn-sm add">+<span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
     <br><br>
      <input style="width:auto;display: inline-block;margin: 0 auto;" type="submit" name="submit" class="sub-btn" value="Insert" />
     </div>
    </div>
   </form>
  </div>
 </body>
</html>
<script>
  function my_fun(str,i) {

    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    } else{
      xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    xmlhttp.onreadystatechange= function(){
      if (this.readyState==4 && this.status==200) {
        document.getElementById('poll'+i).innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET","helper.php?value="+str, true);
    xmlhttp.send();
  
  }
  
  </script>
<script>
$(document).ready(function(){
  var i = 1;
 $(document).on('click', '.add', function(){
   i++;
  var html = '';
  html += '<tr>';
  html += '<td><select style="background:#51489b;color:white;border: none; padding: 6px;" name="item_clss[]" class="form-control item_clss" onchange="my_fun(this.value,'+i+');"><option value="">--Classe--</option><?php echo fill_unit_select_box_class($connect); ?></select></td>';
  html += '<td><select style="background:#51489b;color:white;border: none; padding: 6px;" name="item_etud[]" class="form-control item_etud" id="poll'+i+'"><option value="">--Etudiant--</option></select></td>';
  html += '<td><select style="background:#51489b;color:white;border: none; padding: 6px;" name="item_mat[]" class="form-control item_mat"><option value="">--Matiere--</option><?php echo fill_unit_select_box_mat($connect); ?></select></td>';
  html += '<td><select style="background:#51489b;color:white;border: none; padding: 6px;" name="item_heur[]" class="form-control item_heur"><option value="">--Heure--</option><option value="8:30-10:30">  8:30-10:30 </option><option value="10:30-12:30"> 10:30-12:30 </option><option value="14:00-16:00"> 14:00-16:00 </option><option value="16:00-18:00"> 16:00-18:00 </option></select></td>';
  html += '<td><select style="background:#51489b;color:white;border: none; padding: 6px;" name="item_jus[]" class="form-control item_jus"><option value="">--Oui/Non--</option><option value="Oui"> Oui </option><option value="Non"> Non </option></select></td>';
  html += '<td><textarea name="item_comm[]" value="" cols="45" rows="5" style="background: #c0baee;" class="form-control item_comm" ></textarea></td>';
  html += '<td><button style=" background-color: red;padding: 10px 15px;font-weight: bolder;border:none;color:white;" type="button" name="remove" class="btn btn-danger btn-sm remove">-<span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_clss').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select la classe </p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_etud').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select le nom </p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_mat').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select la matiere </p>";
    return false;
   }
   count = count + 1;
  });
  $('.item_heur').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select l'heure </p>";
    return false;
   }
   count = count + 1;
  });
  $('.inp').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Inserer la date </p>";
    return false;
   }
   count = count + 1;
  });
  $('.item_jus').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select la justification</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      swal({
    title: "Bien enregistrer!",
    text: "Merci de cliquer sur OK",
    icon: "success",
}).then(function() {
    window.location = "insertAbsence.php";
});
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert">'+error+'</div>');
  }
 });
 
});
</script>