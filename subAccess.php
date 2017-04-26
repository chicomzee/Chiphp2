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

Print "




Thank you for sumbmiting your review

please do not submit another as that will be rejected"
?>