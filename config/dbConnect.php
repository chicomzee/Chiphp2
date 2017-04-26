<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08/03/2017
 * Time: 11:35
 */
//*
    $connectstr_dbhost = '';//$host;
    $connectstr_dbname = '';//$dbName;
    $connectstr_dbusername = '';//$uname;
    $connectstr_dbpassword = '';//$pw;
    foreach ($_SERVER as $key => $value) {
        if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
            continue;
        }
        $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
        //echo $connectstr_dbhost." g1 <br> \r\n";
        $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
        //echo $connectstr_dbname." g2 <br> \r\n";;
        $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
        //echo $connectstr_dbusername." g3 <br> \r\n";;
        $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
        //echo $connectstr_dbpassword." g4 <br> \r\n";;
    }
    //$conn = new mysqli($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);
    $conn = new PDO("mysql:host=$connectstr_dbhost;dbname=$connectstr_dbname", $connectstr_dbusername, $connectstr_dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_error() . PHP_EOL;
        exit;
    }
/**
//$conn = new mysqli("localhost:52543", "root2", "", "localdb");
$conn = new PDO("mysql:host=localhost:52543;dbname=localdb", "root2", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//*/
function getRecords($conn,$Query,$valuesCount,$val1=null, $val2=null)
{
    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_error() . PHP_EOL;
        exit;
    }
    $stmt = $conn->prepare($Query);
    
    /* bind parameters for markers */
    try {
        switch ($valuesCount) {
            case 0:
                $stmt->execute();
                break;
            case 1:
                $stmt->execute([$val1]);
                $valuesCount=0;
                break;
            case 2:
                $stmt->execute([$val1, $val2]);
                $valuesCount=0;
                break;
        }
    }
    catch (mysqli_sql_exception $e){return e;}
    
    /* execute query */
    //$stmt->execute();
    //$result=null;
    /* bind result variables */
    //$stmt->bind_result($result);
    
    /* fetch value */
    $result=$stmt->fetchAll();
    //$stmt->fetchArray();
    return $result;
}


function setRecords($conn,$Query,$valuesCount,$val1, $val2=null, $val3=null,$val4=null)
{
    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_error() . PHP_EOL;
        exit;
    }
    $stmt = $conn->prepare($Query);
    
    /* bind parameters for markers */
    try {
        switch ($valuesCount) {
            case 0:
                break;
            case 1:
                $stmt->execute([$val1]);
                $valuesCount=0;
                break;
            case 2:
                $stmt->execute([$val1, $val2]);
                $valuesCount=0;
                break;
            case 3:
                $stmt->execute([$val1, $val2,val3]);
                $valuesCount=0;
                break;
    
            case 4:
                $stmt->execute([$val1, $val2,$val3,$val4]);
                $valuesCount=0;
                break;
    
        }
    }
    catch (mysqli_sql_exception $e){return e;}
}
?>