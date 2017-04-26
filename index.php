<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 06:03
 */

include "config/dbConnect.php";
if (isset($_GET['access'])){
    $qry="select uid, name, surname from users WHERE uid = ?";
    $uProfile=getRecords($conn, $qry, 1, $_GET['access']);
    foreach ($uProfile as $row){
        $uProfile= $row;
    }
//$welcomeMsg= "Welcome: $uProfile(1)[0] $uProfile(2)[0] <br><br> please login<br><br>";
//$uProfile;

print "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title> PEER ASSESSMENT
        - Login </title>
    <link rel=\"stylesheet\" href=\"asset/peer.css\"/>
</head>
<body>
<h1> PEER ASSESSMENT </h1>
<div>

Welcome: $uProfile[1] $uProfile[2] <br><br> please login<br><br>

    <form method=\"post\" action=\"login.php\">
        <div id=\"loginbox\">
            <fieldset>
                <legend>Login</legend>
                <input type=\"hidden\" name=\"sID\" value=\"$uProfile[0]\" required>
                <input type=\"hidden\" name=\"sName\" value=\"$uProfile[1]\" required>
                <input type=\"hidden\" name=\"sSname\" value=\"$uProfile[2]\" required>
                <table>
                    <tr>
                        <td> <label for=\"username\">Username:</label><br></td>
                        <td> <input type=\"text\" name=\"username\" value=\"user\" required /><br> </td>
                    </tr>
                    
                    
                    <tr>
                        <td> <label for=\"password\">Password:</label><br> </td>
                        <td> <input type=\"password\" name=\"password\" value=\"mouse1\" required> </td>
                    
                    </tr>
                    <div id=\'submitbutton\'>
                        <tr>
                            <td> <input name =\'submit\' type=\"submit\" value=\"Login\"> </td>
                        </tr>
                    </div>
                
                </table>
            </fieldset>
        </div>
    
    </form>
    <div id=\"signup\">
        
        <p> New User ? <a href =\"signup.php\"> Sign Up Here </a> </p>
    </div>
</div>

</body>


</html>

";
}else{
    print "You are not recognized on this system.";
}
?>
