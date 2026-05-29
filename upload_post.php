<!DOCTYPE html>
<?php require_once("asset.php"); ?>

<?php
if(!isset($_SESSION['id'])){
    $_SESSION['mess']="You must be logged in to upload a post!";
    header("Location: forum.php");
    exit();
}

if(isset($_POST['btn_post'])){
    $title=htmlentities($_POST['title']);
    $content=htmlentities($_POST['content']);
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $path = "uploads/".$image_name;
    $id = $_SESSION['id'];
    move_uploaded_file($tmp_name, $path);
    $sql="INSERT INTO tbl_post (title, content, image, user_id) VALUES ('$title', '$content', '$path', '$id')";
    $result=mysqli_query($conn, $sql);
    header("Location: forum.php");
    exit();
}

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
            <div class="PostFormContainer">
                <form action="upload_post.php" method="POST" enctype="multipart/form-data" class="PostForm">
                    <label for="title">Write a title</label>
                    <input type="text" name="title" placeholder="Title" required>
                    <label for="content">Write your post</label>
                    <textarea name="content" rows="6" placeholder="Content" required></textarea>
                    <label for="image">Add an image (optional)</label>
                    <input type="file" name="image">
                    <input type="submit" name="btn_post" value="Post">
                </form>
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
            <button name="btn_login" >Log in</button>
            
        </form>
    </dialog>
    <script>
        function closeMessage(){
            document.getElementById("message").style.display = "none";
        }
    </script>
</body>
</html>