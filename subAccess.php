<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 21:18
 */
include "config/dbConnect.php";
$qry="insert into results (peerID, feedback, mark) VALUES (?,?,?) WHERE ";
for ($i=0;$I<$_post['$gCount'];$i++){

$myID=setRecords($conn, $qry,3,$_POST["sName"][$i], $_POST["sComent"][$i],$_POST["sMark"][$i]);

}
?>