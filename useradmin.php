<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
if(!isLevel(100)){ 
    header("Location: index.php");
}
if(isset($_GET['ban'])){
    $id=intval($_GET['ban']);
    $sql="DELETE FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    header("Location: useradmin.php");
}
if(isset($_GET['demote'])){
    $id=intval($_GET['demote']);
    $sql="SELECT userlevel FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $initlevel=$row['userlevel'];
    $newlevel=$initlevel-50;
    $sql="UPDATE tbl_user SET userlevel=$newlevel WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: useradmin.php");
}
if(isset($_GET['promote'])){
    $id=intval($_GET['promote']);
    $sql="SELECT userlevel FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $initlevel=$row['userlevel'];
    $newlevel=$initlevel+50;
    $sql="UPDATE tbl_user SET userlevel=$newlevel WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: useradmin.php");
}
if(isset($_GET['accept'])){
    $id=intval($_GET['accept']);
    $sql="UPDATE tbl_user SET userlevel=50 WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: useradmin.php");
}
if(isset($_GET['deny'])){
    $id=intval($_GET['deny']);
    $sql="DELETE FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    header("Location: useradmin.php");
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
    <header>
        <div class="leftlink">
            <?php if(!isLevel(10)): ?>
                <button popovertarget="login">Login</button>
            <?php else: ?>
                <div class="logout">
                    <a href="_login.php?logout=1">Logout</a>
                </div>
            <?php endif; ?>
            <?php if(!empty($mess)): ?>
            <p id="message">
                <?=$mess;?>
                <button onclick="closeMessage()" class="close-btn">X</button>
            </p>
            <?php endif; ?>
        </div>
        <div class="title">User Admin</div>
        <div class="rightlinks">
            <a href="index.php" class="home">Home</a>
            <a href="shop.php" class="shop">Shop</a>
            <a href="forum.php" class="forum">Forum</a>
            <?php if (isLevel(100)): ?>
                <a href="useradmin.php" class="useradmin">User Admin</a>
            <?php endif; ?>
        </div>
    </header>
    <div class="scroll">
        <main class="main3">
            <div class="ExistingUsers">
                <h1>Existing Users</h1>
                <?php
                $sql="SELECT * FROM tbl_user WHERE userlevel >= 10 ORDER BY userlevel DESC";
                $result=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)): ?>
                    <details>
                        <summary class="ExistingUserSummary">
                            <div class="idSummary"><?=$row['id'];?></div>
                            <div class="usernameSummary"><?=$row['username'];?></div>
                            <div class="levelSummary"><?=$row['userlevel'];?></div>
                        </summary>
                        <div>
                            <p>Real name: <?=$row['realname'];?></p>
                            <p>Username: <?=$row['username'];?></p>
                            <p>Email: <?=$row['mail'];?></p>
                            <div class="LastRow">
                                <p>User Level: <?=$row['userlevel'];?></p>
                                <div class="buttons">
                                    <a href="useradmin.php?promote=<?=$row['id'];?>">Promote</a>
                                    <a href="useradmin.php?demote=<?=$row['id'];?>">Demote</a>
                                    <a href="useradmin.php?ban=<?=$row['id'];?>">Ban</a>
                                </div>
                            </div>
                        </div>
                    </details>
                <?php endwhile; ?>
            </div>
            <div class="RequestedUsers">
                <h1>Requested Users</h1>
                <?php
                $sql="SELECT * FROM tbl_user WHERE userlevel = 0";
                $result=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)): ?>
                    <details>
                        <summary class="RequestedUserSummary">
                            <div class="usernameSummary"><?=$row['username'];?></div>
                        </summary>
                        <div>
                            <p>Real name: <?=$row['realname'];?></p>
                            <p>Username: <?=$row['username'];?></p>
                            <div class="LastRow">
                                <p>Email: <?=$row['mail'];?></p>
                                <div class="buttons">
                                    <a href="useradmin.php?accept=<?=$row['id'];?>">Accept</a>
                                    <a href="useradmin.php?deny=<?=$row['id'];?>">Deny</a>
                                </div>
                            </div>
                        </div>
                    </details>
                <?php endwhile; ?>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; 2026 The Devourers of God. All rights reserved.</p>
    </footer>
</body>
</html>