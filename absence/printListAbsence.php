
<?php
require("../config.php");
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
echo "Ne nous pouvons pqs se connecter";
if(!mysqli_select_db($con,'test'))
{
	echo "Database non selecté";
}
if(isset($_GET['print'])){
  	$classe_print = $_GET['print'];
  $sql = "SELECT CIN,CNE,NOM_ETUD,PRENOM_ETUD,DATE_NAISS,LIEU_NAISS,TEL_ETUD,EMAIL_ETUD,CLASSE FROM etudiant INNER JOIN classe ON etudiant.ID_CLASSE=classe.ID_CLASSE WHERE CLASSE LIKE '$classe_print'";}
 $records = mysqli_query($con,$sql); 

 require ("../pdf/fpdf.php");
 $pdf = new FPDF('p','mm','A4');



 $pdf->AddPage();
 $pdf->Image('../image/4.jpg',4,0,200);
 $pdf->Ln(30);
 $pdf->SetFont('Arial','B',20);
 $pdf->Cell(190,10,"La Liste d'Absence de $classe_print ",0,1,'C');
 //$pdf->cell(20,5,$row['CLASSE'],0,0,'C');
 $pdf->ln(20);
 $pdf->SetFont('Arial','B',8);
 
 $pdf->cell(30,10,"CNE",1,0, 'C');
 
 $pdf->cell(30,10,"NOM",1,0, 'C');
  $pdf->cell(30,10,"PRENOM",1,0, 'C');
 $pdf->cell(25,10,"8:30-10:30",1,0, 'C');
  $pdf->cell(25,10,"10:30-12:30",1,0, 'C');
  $pdf->cell(25,10,"14:00-16:00",1,0, 'C');
  $pdf->cell(25,10,"16:00-18:00",1,1, 'C');
    
$pdf->SetFont('Arial','',8);


 
	while($row = mysqli_fetch_array($records,MYSQLI_ASSOC))
{
	$nom = $row['NOM_ETUD'];
	$pre = $row['PRENOM_ETUD'];
	$cin = $row['CIN'];
	$cne = $row['CNE'];
	$ne = $row['DATE_NAISS'];
    $li = $row['LIEU_NAISS'];
    $tel=$row['TEL_ETUD'];
    $eml=$row['EMAIL_ETUD'];
    
 
    $pdf->cell(30,10, $cne,1,0,'C');

    $pdf->cell(30,10, $nom,1,0,'C');
    $pdf->cell(30,10, $pre,1,0,'C');
    $pdf->cell(25,10, '',1,0,'C');
    $pdf->cell(25,10, '',1,0,'C');
    $pdf->cell(25,10, '',1,0,'C');
    $pdf->cell(25,10, '',1,1,'C');
     


}




$pdf->OutPut();

?>