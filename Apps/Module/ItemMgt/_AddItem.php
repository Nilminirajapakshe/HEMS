<?php
require_once '../../Control/config.php';  // call config
include "../../../lib/phpmail/mail.php";

extract($_POST);


try {
    //check wether save button click or not
    if (isset($_POST['Save'])) {
        
        
			//--------------------------------- File Upload Begin --------------------------------
			//$allowedExts = array("gif", "jpeg", "jpg", "png");
			//$temp = explode(".", $_FILES["Item_barcode"]["name"]);
			//$extension = end($temp);
//if(!empty($_FILES["Item_barcode"]["name"])){
    

			//if(true)
			//{

			  //if ($_FILES["Item_barcode"]["error"] > 0) {
				//$_SESSION['success'][] =  "Return Code: " . $_FILES["Item_barcode"]["error"] . "<br>";
				
			  //} else {
				//$_SESSION['success'][] =  "Upload: " . $_FILES["Item_barcode"]["name"] . "<br>";
				
			   //if (file_exists("upload/" . $_FILES["Item_barcode"]["name"])) {
			   
				  //$_SESSION['success'][] =  $_FILES["Item_barcode"]["name"] . " already exists. ";
				  
				//} else {
				
				  //move_uploaded_file($_FILES["Item_barcode"]["tmp_name"],  "upload/" . $_FILES["Item_barcode"]["name"]);
				  //$_SESSION['success'][] =  "Stored in: " . "upload/" . $_FILES["Item_barcode"]["name"] . "<br>";
				  
				  //$Item_barcode = $_FILES["Item_barcode"]["name"];
				//}
			  //}
			//} else {
			  //$_SESSION['success'][] =  "Invalid file";
                        //}
//}//else{
    //$_SESSION['error'][] =  "Barcode should not be empty";
    
//}
if(empty($Item_name)){
 $_SESSION['error'][] =  "Item name should  not be empty";   
}
			//--------------------------------- File Upload End --------------------------------
        
       
        
        $sql = 'INSERT INTO tbl_item(Item_name,Item_type,Item_price,Supplier_Name,Purchase_date,Invoice_No,Warranty,Item_Modleno,Location_Name,Item_qrcode,Item_status) '
                . 'VALUES(:Item_name,:Item_type,:Item_price,:Supplier_Name,:Purchase_date,:Invoice_No,:Warranty,:Item_Modleno,:Location_Name,:Item_qrcode,:Item_status)';
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_name' => $Item_name,
            'Item_type' => $Item_type,
            'Item_price' => $Item_price,
            'Supplier_Name' => $Supplier_Name,
            'Purchase_date' => $Purchase_date,
            'Invoice_No' => $Invoice_No,
            'Warranty' => $Warranty,
            'Item_Modleno' => $Item_Modleno,
            'Location_Name' => $Location_Name,
            'Item_qrcode' => @$Item_qrcode,
            'Item_status' => $Item_status
            ));
        $Itemid=$conn->lastInsertId();
        //set it to writable location, a place for temp generated PNG files
                            $PNG_TEMP_DIR = '../../../temp' . DIRECTORY_SEPARATOR;
                            //html PNG location prefix
                            $PNG_WEB_DIR = 'temp/';
                            include "../../../lib/phpqrcode/qrlib.php";
                            //ofcourse we need rights to create temp dir
                            if (!file_exists($PNG_TEMP_DIR))
                                mkdir($PNG_TEMP_DIR);
                            $filename = $PNG_TEMP_DIR . 'test.png';
                            //processing form input
                            //remember to sanitize user input in real-life solution !!!
                            $errorCorrectionLevel = 'L';
                            $matrixPointSize = 4;
                            $data = $Itemid;
                            // user data
                            $filename = $PNG_TEMP_DIR . 'test' . md5($data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
                            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
                            //display generated file
                            $filename= $PNG_WEB_DIR . basename($filename);
        
                            $sql = 'UPDATE tbl_item '
                . 'SET Item_qrcode=:Item_qrcode WHERE Item_id=:Item_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_id' => $Itemid,
            'Item_qrcode' => $filename,
            )); 
                            $conn = null;
        $_SESSION['success'][] = 'Created Item :'.$Item_name;	
        #echo 'Created Item :' . $Item_id;
        
        
    }
     if (isset($_POST['Update'])) {
        $sql = 'UPDATE tbl_item '
                . 'SET Item_name=:Item_name, Item_type=:Item_type, Item_price=:Item_price, Supplier_Name=:Supplier_Name, Purchase_date=:Purchase_date, Invoice_No=:Invoice_No, Warranty=:Warranty, Item_Modleno=:Item_Modleno,Location_Name=:Location_Name,Item_qrcode=:Item_qrcode,Item_status=:Item_status WHERE Item_id=:Item_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute(array('Item_id' => $Item_id,'Item_name' => $Item_name,
            'Item_type' => $Item_type,
            'Item_price' => $Item_price,
            'Supplier_Name' => $Supplier_Name,
            'Purchase_date' => $Purchase_date,
            'Invoice_No' => $Invoice_No,
            'Warranty' => $Warranty,
            'Item_Modleno' => $Item_Modleno,
            'Location_Name' => $Location_Name,
            'Item_qrcode' => $Item_qrcode,
            'Item_status' => $Item_status));

        $_SESSION['success'][] =  'Updated Item :' . $Item_name;
        
    }
    if (isset($_POST['Delete'])) {
           
               
                $sql = 'DELETE FROM tbl_item '
                  . 'WHERE Item_id=:Item_id';

       $stmt = $conn->prepare($sql);
              $stmt->execute(array('Item_id' => $Item_id));
           
 $Deleteby=$_SESSION['username'];      
$body="$Item_id-$Item_name<h5>Equipment is Deleted By</h5>$Deleteby";
$customer_email="nil2cha@gmail.com";
$customer="PDHS";
$subject="Notification of item delete";
send_email($customer_email,$customer,$subject,$body,"Hello");
        

        $_SESSION['success'][] = 'Removed Item :' . $Item_id;
       //$url= BASE_URL . "Apps/View/AddItem/AddItem_View.php";
       //header("Location:$url");
        
    }
    
} 
catch (Exception $ex) {
  $_SESSION['error'][] = $ex->getMessage();
}


// this re direct samr view page
//header("Location: ".$_SERVER['HTTP_REFERER']);
$url= BASE_URL . "Apps/View/AddItem/AddItem.php";
    header("Location:$url");
    ?>
