<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/04/2017
 * Time: 06:03
 */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> PEER ASSESSMENT
        - Login </title>
    <link rel="stylesheet" href="asset/peer.css"/>
</head>
<body>
<h1> PEER ASSESSMENT </h1>
<div>
    <form method="post" action="login.php">
        <div id="loginbox">
            <fieldset>
                <legend>Login</legend>
                <table>
                    <tr>
                        <td> <label for="username">Username:</label><br></td>
                        <td> <input type="text" name="username" value="user" required /><br> </td>
                    </tr>
                    
                    
                    <tr>
                        <td> <label for="password">Password:</label><br> </td>
                        <td> <input type="password" name="password" value="mouse1" required> </td>
                    
                    </tr>
                    <div id="submitbutton">
                        <tr>
                            <td> <input name ="submit" type="submit" value="Login"> </td>
                        </tr>
                    </div>
                
                </table>
            </fieldset>
        </div>
    
    </form>
    <div id="signup">
        
        <p> New User ? <a href ="signup.php"> Sign Up Here </a> </p>
    </div>
</div>

</body>


</html>


?>