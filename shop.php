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
        <main class="main2">
            <div class="FrontMessage">MERCHANDISE</div>
            <div class="products">
                <div class="product">
                    <div class="productbg1"></div>
                    <div class="productname"><p>Devourer's T-shirt</p></div>
                    <div class="price"><p>30$</p></div>
                </div>
                <div class="product">
                    <div class="productbg2"></div>
                    <div class="productname"><p>Devourer's Hoodie</p></div>
                    <div class="price"><p>50$</p></div>
                </div>
                <div class="product">
                    <div class="productbg3"></div>
                    <div class="productname"><p>Devourer's Mug</p></div>
                    <div class="price"><p>15$</p></div>
                </div>
                <div class="product">
                    <div class="productbg4"></div>
                    <div class="productname"><p>Devourer's Hat</p></div>
                    <div class="price"><p>25$</p></div>
                </div>
            </div>
            <div class="products">
                <div class="product">
                    <div class="productbg5"></div>
                    <div class="productname"><p>Devourer's T-shirt</p></div>
                    <div class="price"><p>30$</p></div>
                </div>
                <div class="product">
                    <div class="productbg6"></div>
                    <div class="productname"><p>Devourer's Hoodie</p></div>
                    <div class="price"><p>50$</p></div>
                </div>
                <div class="product">
                    <div class="productbg7"></div>
                    <div class="productname"><p>Devourer's Mug</p></div>
                    <div class="price"><p>15$</p></div>
                </div>
                <div class="product">
                    <div class="productbg8"></div>
                    <div class="productname"><p>Devourer's Hat</p></div>
                    <div class="price"><p>25$</p></div>
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
            <!--input type="submit" name="btn_login" value="Log in"-->
            <button name="btn_login" class="loginbutton">Login</button>
        </form>
    </dialog>
    <script>
        function closeMessage(){
            document.getElementById("message").style.display = "none";
        }
    </script>
</body>
</html>