<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 21:18
 */
include "config/dbConnect.php";
$qry="update results set peerID=?, feedback=?, mark=? WHERE uid = ?";
//$i=0;
for($i=0;$i<count($_POST['sID']);$i++) {
    $myID = setRecords($conn, $qry, 4, $_POST["myID"], $_POST["sComent"][$i], $_POST["sMark"][$i], $_POST["sID"][$i]);
}

if(isset($_FILES['image'])){ // snipet from w3schools
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $expensions= array("jpeg","jpg","png","doc","docx","pdf");
    
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG, PDF, DOC, DOCX or PNG file.";
    }
    
    if($file_size > 12097152){
        $errors[]='File size must be excately 12 MB';
    }
    
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploads/".$myID."-".$file_name);
        echo "File upload Success <br><br>";
    }else{
        print_r($errors);
    }
}

Print "




Thank you for sumbmiting your review

please do not submit another as that will be rejected"
?>