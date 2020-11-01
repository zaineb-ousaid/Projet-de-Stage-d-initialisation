<?php
//insert.php;

if(isset($_POST["item_etud"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=test", "root", "");
 //$order_id = uniqid();
 $dat=$_POST["dateAbs"];
 $nbr=2;
 for($count = 0; $count < count($_POST["item_etud"]); $count++)
 {  
  $query = "INSERT INTO absence 
  (ID_ETUD, ID_MATIERE, DATE, NBR_HEURES,HEURE,JUSTIFIER,COMM_ABS) 
  VALUES (:item_etud, :item_mat,:dateAbs,:nbheur,:item_heur,:item_jus, :item_comm)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   $data=array(
    ':dateAbs'   => $dat,
    ':nbheur'   => $nbr,
    ':item_etud'   => $_POST["item_etud"][$count],
    ':item_mat'  => $_POST["item_mat"][$count], 
    ':item_heur' => $_POST["item_heur"][$count], 
    ':item_jus' => $_POST["item_jus"][$count], 
    ':item_comm'  => $_POST["item_comm"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>