<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 10:33
 */

?>
<html>
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
        Group Name/Number: <?php print $gName."/".$myGID; ?><p>
        <p></p>
        <p></p>
        <p></p>
        Name and Number of student completing form: <?php print $sName.", ".$sSname ?>
    </div>
    <table class="table table-border">
        <thead>
        <tr>
            <th>Student Name<p></p>Including Self</th>
            <th>Main contribution to the group project<p></p>add comments if necessary</th>
            <th>Marks Allocated %</th>
        </tr>
        </thead>
        
        
        <?php
        $s = 0;
        while ($s < $gCount) {
            $s++;
            $sNval="''";
            if ($s==1){$sNval="''".$sName." ".$sSname."''";}
            print "
<tr>
        <td><input type='text' name='sName[]' id='sName '  value=$sNval ></td>
        <td><input type='text' name='sComent[]' id='sComent'   ></td>
        <td><input type='text' name='sMark[]' id='sMark'   ></td>
    </tr>
";
        } ?>
</div>
<tr>
    <td></td>
    <td></td>
    <td>
        <label>Marks allocated must add up to 10</label></td>
</tr>
</table>

<form method="post" action="subAccess.php">
    <input hidden value=$gCount>
    <input type="submit" name="submit">
</form>
</div>
</body>
</html>
