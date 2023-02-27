<?php 
  include 'fpdf/fpdf.php';
  //require ("word.php");
  include 'connect/connection.php';

  //customer and invoice details
  $info=[
    "full_name"=>"",
    "nic"=>",",
    "email"=>"",
    "station"=>"",
    "date"=>"",
    "fuel_amount"=>"",
    "fuel_type"=>"",

  ];
  
  //Select Invoice Details From Database
  $sql="select * from req_fuel where email='".$_GET ["email"]."'";
  $res=$connect->query($sql);
  if($res->num_rows>0){
	  $row=$res->fetch_assoc();
	  
	
	  $info=[
		"full_name"=>$row["full_name"],
		"nic"=>$row["nic"],
		"email"=>$row["email"],
		"station"=>$row["station"],
		"date"=>date("d-m-Y",strtotime($row["date"])),
    "fuel_amount"=>$row["fuel_amount"],
		"fuel_type"=>$row["fuel_type"]
    ];

	
  }
  
  //invoice Products
  $products_info=null;
  
  //Select Invoice Payment Details From 
  


  $sql = "select * from customermsg where email='".$_GET ["email"]."'";
  $res=$connect->query($sql);
  if($res->num_rows>0){
	  while($row=$res->fetch_assoc()){
		   $products_info=[
			"email"=>$row["email"],
			"fuel_price"=>$row["fuel_price"],
			"totalamount"=>$row["totalamount"],

		   ];

	  }
  }
  
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',30);
      $this->Cell(50,10,"Fuel In",0,1);
      $this->SetFont('Arial','',14);
        $this->Cell(50,10,"Authorized fuel dealer all over Sri lanka",0,1);
        $this->Cell(50,10,"No. 123, Galle Road, Colombo 03",0,1);
        $this->Cell(50,10,"Tel: 011-1234567",0,1);
      
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["full_name"],0,1);
      $this->Cell(50,7,$info["nic"],0,1);
      $this->Cell(50,7,$info["email"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Requested fuel : ".$info["station"]);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Invoice Date : ".$info["date"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRICE",1,0,"C");
      $this->Cell(30,9,"QTY (leters)",1,0,"C");
      $this->Cell(40,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //echo var_dump($products_info);
      //Display table product rows
      /*
      foreach($products_info as $row){  
       $this->Cell(40,9,$row["fuel_price"],"R",0,"R");
      $this->Cell(40,9,$row["totalamount"],"R",1,"R");

    //    echo $this->Cell(40,9,$row["pay_method"],"R",0,"R");
      }*/
      $this->Cell(80,9,$info["fuel_type"],"LR",0);
      $this->Cell(40,9,$products_info["fuel_price"],"R",0,"R");
      $this->Cell(30,9,$info["fuel_amount"],"R",0,"C");
      $this->Cell(40,9,$products_info["totalamount"],"R",1,"R");
      

     
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"R");
      $this->Cell(40,9,$products_info["totalamount"],1,1,"R");
      
   /*   //Display amount in words
      $this->SetY(225);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,9,"Amount in Words ",0,1);
      $this->SetFont('Arial','',12);
      //$this->Cell(0,9,$info["words"],0,1);
      */
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"From Fuel In",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->Output();
?>