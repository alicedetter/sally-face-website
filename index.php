<!DOCTYPE html>
<?php require_once("asset.php"); ?>

<?php
$mess="";
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
    unset($_SESSION['mess']);
}else{
    $mess="";
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
        <main class="main1">
            <div class="FrontMessage">WE ARE EVERLASTING</div>
            <div class="info">
                <h1 class="welcome">Welcome to our community</h1>
                <p class="p1">
                    Our cult was founded in 1663 among the Grey Tribe. A prophecy was spoken by the seer Citlali Grey and the original members came together to form The Devourers of God.<br>
                </p>
                <p class="p2">
                    Our mission is to bring The Endless One forth to the physical plane.<br>
                    We are the only solution. We are endless. We WILL succeed.<br>
                    Join us and help us do what must be done.
                </p>
            </div>
            <div class="box">
                <div>
                    <h1>News!</h1>
                    <p>So basically if you would like to know what the news are they are basically that basically if you want to know. So that is what it is, and something happened tomorrow, yes and we are shocked. We don't know what we are talking about, but something needs to be written here. Great, this was the news, have a good day!</p>
                </div>
                <div>
                    <h1>Important information</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo reiciendis nulla consequatur. Veritatis fugit corporis cupiditate? Laboriosam et eaque fuga sint impedit eveniet, vel officiis iure exercitationem veritatis error?</p>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; 2026 The Devourers of God. All rights reserved.</p>
    </footer>
    <dialog id="login" popover>
        <form action="_login.php" method="POST">
            <button type="button" onclick="document.getElementById('login').hidePopover()" class="closeLogin">X</button>
            <label for="user">Username</label>
            <input type="text" name="user" placeholder="Username" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Password" required>
            <button name="btn_login" class="loginbutton" >Login</button>
        </form>
    </dialog>
    <script>
        function closeMessage(){
            document.getElementById("message").style.display = "none";
        }
    </script>
</body>
</html>