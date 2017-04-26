<html xmlns="http://www.w3.org/1999/html">
<head title=" Peer Review">
    <link rel="stylesheet" href="asset/peer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//include "config/dbConnect.php";
$qry="select DISTINCT * from users right join results on users.UID = results.UID";
$myRecs=getRecords($conn, $qry, 0);
?>
<div class='container'>
<table class="table">
<?php foreach ($myRecs as $row){ ?>
    <tr>
        <?php foreach ($row as $col) {
            Print "<td> $col </td>";
        }
        }?>
    </tr>
</table>
</div>

</body>
</html>