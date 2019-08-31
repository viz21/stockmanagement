<?php
require('mysql_table.php');
date_default_timezone_set("Asia/Colombo");
$expenseDate=date("d.m.Y");


class PDF extends PDF_MySQL_Table
{
public function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,"Daily Income Report",0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();

}
}

//Connect to database
mysql_connect('waligama.sanila.tech','waligama','zu8e5u3e7');
mysql_select_db('sanila_waligama');
/*mysql_connect('localhost','root','');
mysql_select_db('inventory_mng');*/

                           //$_GET["id"];
$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table("SELECT transDate,description,amount FROM fin_transdetails  WHERE transDate='$incomeDate' AND type LIKE '%Expense%'");
$pdf->AddPage();
/*Second table: specify 3 columns
$pdf->AddCol('Id',40,'','C');
$pdf->AddCol('First Name',40,'user','C');
$pdf->AddCol('Last Name',40,'','C');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select fname,lname, id from user order by id limit 0,10',$prop);

//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); */


//$pdf->Output($downloadfilename.'.pdf'); 
$buffer=$pdf->Output($downloadfilename.'.pdf');

header('Content-Type: application/pdf');
header('Content-Length: '.strlen($buffer));
header('Content-Disposition: inline; filename="doc.pdf"');
header("Cache-Control: no-cache, must-revalidate, max-age=1"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");   // any date in the past
header('Pragma: public');
ini_set('zlib.output_compression','0');

header('Location: '.$downloadfilename.".pdf");
?>
