<header>
    <div class="leftlink">
        <?php if(!isLevel(10)): ?>
            <button popovertarget="login">Login</button>
        <?php else: ?>
            <div class="logout">
                <a href="_login.php?logout=1">Logout</a>
            </div>
        <?php endif; ?>
        <?php if(!isLevel(10)): ?>
            <a href="register.php" class="reg">Register</a>
        <?php endif; ?>
        <?php if(!empty($mess)): ?>
        <p id="message">
            <?=$mess;?>&nbsp;<button onclick="closeMessage()" class="close-btn">X</button>
        </p>
        <?php endif; ?>
    </div>
    <div class="title">THE DEVOURERS OF GOD</div>
    <div class="rightlinks">
        <a href="index.php" class="home">Home</a>
        <a href="shop.php" class="shop">Shop</a>
        <a href="forum.php" class="forum">Forum</a>
        <?php if (isLevel(100)): ?>
            <a href="useradmin.php" class="useradmin">User Admin</a>
        <?php endif; ?>
    </div>
</header>