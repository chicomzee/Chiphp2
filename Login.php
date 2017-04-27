<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 08:03
 */

include "config/dbConnect.php";

//$qry="select aa.passid,bb.name,bb.surname from pressfoward aa, users bb WHERE (aa.username= ? AND aa.paswd = ?) AND aa.passid=bb.uid";
$qry="select passid, user_type from pressfoward WHERE username= ? AND paswd = ?";
$myID=getRecords($conn, $qry,2,$_POST["username"], $_POST["password"]);
$myAuthLvl;
foreach ($myID as $row){$myID=$row[0]; $myAuthLvl=$row[1];}
//$myID=4; // for login
if($myAuthLvl==1){
    include "adminDash.php";
}
else if($myID)
{
    //$conn = new mysqli("localhost:52543", "root2", "", "localdb");
    $qry="select gid from results WHERE uid = ?";
    $myGID=getRecords($conn, $qry,1,$myID);
    foreach ($myGID as $row){$myGID=$row[0];}
    
    $sName=$_POST['sName'];
    
    $sSname=$_POST['sSname'];
    
    $qry="select group_name from groups WHERE gid=?";
    $gName=getRecords($conn, $qry, 1, $myGID);
    foreach ($gName as $row){$gName=$row[0];}
    
    $qry="select aa.uid, bb.name, bb.surname from results aa, users bb WHERE aa.gid=? AND bb.uid=aa.uid ";
    $gUIDS=getRecords($conn, $qry, 1, $myGID);
    
        include "peerAssessment.php";
    }
  else
        {
    print ("no records");
    
}


/* close statement */
//$stmt->close();

/* close connection */
//$conn->close();

?>
