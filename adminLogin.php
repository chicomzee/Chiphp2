<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> PEER ASSESSMENT
        - Login </title>
    <link rel="stylesheet" href="asset/peer.css"/>
</head>
<body>
<h1> Administrator Login </h1>
<div>

<form method="post" action="login.php">
    <fieldset>
    <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    
    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
        
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
    
        <input name =\'submit\' type="submit" value="Login">
        <input type="checkbox" checked="checked"> Remember me
    </div>
    
    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    </fieldset>
</form>
</div>
</body>
</html>
