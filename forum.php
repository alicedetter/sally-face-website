<!DOCTYPE html>
<?php require_once("asset.php"); ?> <!-- connects to sql -->

<?php
//?
$sql = "SELECT tbl_post.*, tbl_user.username FROM tbl_post JOIN tbl_user ON tbl_post.user_id = tbl_user.id ORDER BY tbl_post.created DESC";
$result = mysqli_query($conn, $sql);

$mess=""; //?
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
    unset($_SESSION['mess']); //?
}else{
    $mess="";
}
if(isset($_GET['del'])){
    $id = intval($_GET['del']);
    $sql = "DELETE FROM tbl_post WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("Location: forum.php");
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
    <nav>
        <a href="upload_post.php" class="UploadPost">Upload post</a> <!-- link/button to upload_post.php -->
    </nav>
    <div class="scrollForum">
        <main class="main1">
            <div class="forum_posts">
                <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="post">
                        <h2><?php echo $row['title']; ?></h2>
                        <p><?php echo $row['content']; ?></p>
                        <img src="<?php echo $row['image']; ?>" width="200" alt="">
                        <p class="username"><?php echo $row['username'];?></p>
                        <div>
                            <small><?php echo $row['created']; ?></small>
                        <?php if (isLevel(100)): ?>
                            <a href="forum.php?del=<?=$row['id']?>" class="deleteButton">Delete</a>
                        <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
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