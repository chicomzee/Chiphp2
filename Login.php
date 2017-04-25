<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 08:03
 */

include "config/dbConnect.php";

//$qry="select aa.passid,bb.name,bb.surname from pressfoward aa, users bb WHERE (aa.username= ? AND aa.paswd = ?) AND aa.passid=bb.uid";
$qry="select passid from pressfoward WHERE username= ? AND paswd = ?";
$myID=getRecords($conn, $qry,2,$_POST["username"], $_POST["password"]);

//$myID=4; // for login
if($myID)
{
    //$conn = new mysqli("localhost:52543", "root2", "", "localdb");
    $qry="select gid from results WHERE uid = ?";
    $myGID=getRecords($conn, $qry,1,$myID);
    
    //$qry="select count(gid) from results WHERE gid=?";
    $qry="select uid from results WHERE gid=?";
    $gCount=getRecords($conn, $qry, 1, $myGID);
    
    $qry="select name from users WHERE uid=?";
    $sName=getRecords($conn, $qry, 1, $myID);
    
    $qry="select surname from users WHERE uid=?";
    $sSname=getRecords($conn, $qry, 1, $myID);
    
    $qry="select group_name from groups WHERE gid=?";
    $gName=getRecords($conn, $qry, 1, $myGID);
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