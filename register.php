<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
if(isLevel(50)){ 
    header("Location: index.php");
}

if(isset($_POST['btn_reg'])){
    $username=$_POST['username'];
    $realname=$_POST['realname'];
    $mail=$_POST['mail'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO tbl_user(username, password, realname, mail, userlevel) VALUES ('$username', '$password', '$realname', '$mail', 0)";
    $result=mysqli_query($conn, $sql);
    header("Location: register.php?reg=akejdk88ch9e");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once("_header.php"); ?>
    <div class="scroll">
        <main class="main2">
            <?php
            if(isset($_GET['reg'])): ?>
                <h1 class="success">Registration succesfull</h1>
                <p class="successinfo">You have to be approved by admin before you can become an official member and log into your account.</p>
            <?php else: ?>
                <form action="register.php" method="POST" class="registerform">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Preferred username" required>
                    <label for="realname">Real Name</label>
                    <input type="text" name="realname" placeholder="Your real name" required>
                    <label for="mail">Email</label>
                    <input type="email" name="mail" placeholder="Your email adress" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="btn_reg" value="Create user">
                </form>
            <?php endif; ?>
        </main>
    </div>
    <footer>
        <p>&copy; 2026 The Devourers of God. All rights reserved.</p>
    </footer>
</body>
</html>
