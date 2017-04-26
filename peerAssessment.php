<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 10:33
 */

?>
<html xmlns="http://www.w3.org/1999/html">
<head title=" Peer Review">
    <link rel="stylesheet" href="asset/peer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    
    <div class="centHead">Peer Review Form</div>
    <div class="lInfo" style="height: 200px">
        Group Name/Number: <?php print $gName . "/" . $myGID; ?><p>
        <p></p>
        <p></p>
        <p></p>
        Name and Number of student completing form: <?php print $sName . ", " . $sSname ?>
    </div>
    <form name="" method="post" action="subAccess.php" enctype="multipart/form-data">
        <fieldset>
        <table class="table table-border">
            <thead>
            <tr>
                <th>Student ID <p></p> Including Self</th>
                <th>Student Name<p></p>Including Self</th>
                <th>Main contribution to the group project<p></p>add comments if necessary</th>
                <th>Marks Allocated %</th>
            </tr>
            </thead>
            <input type="hidden" value= <?php print $myID; ?> name="myID">
            
            <?php
                foreach ($gUIDS as $row) {
                print "
            <tr>
                <td><input type='text' name='sID[]' id='sID ' value='$row[0]'  </td>
                <td><input type='text' name='sName[]' id='sName' value='$row[1] $row[2]' </td>
                <td><input type='text' name='sComent[]' id='sComent'   ></td>
                <td><input type='text' name='sMark[]' id='sMark'   ></td>
            </tr>
                ";
            } ?>
<tr>
    <td></td>
    <td></td>
    <td>
        <label>Marks allocated must add up to 10</label></td>
</tr>
</table>
            <input type="file" name="image" />
            <input type="submit" name="submit" value="submit">
</fieldset>
</form>
</div>
</body>
</html>
