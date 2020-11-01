
<?php
if(isset($_POST['password']) and $_POST['password']=="enset"){
    include_once('index.php');
}
else{
    echo 'mot de passe incorecte <br/> retournez a l\'acceuil et essayez';


    ?> 
    <a href="login.php">formulaire</a>
  <?php } ?>