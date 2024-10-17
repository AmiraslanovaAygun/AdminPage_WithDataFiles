<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php include './partial/header.php'; ?>
    <main class="my-page admin-page">
        <img src="./images/admin.jpg" alt="">

        <form action="logout.php" method="POST">
            <button class="logout-btn" type="submit">LOG OUT</button>
        </form>

        <?php
        session_start();

        $username = '';
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
        } else {
            $username = $_SESSION['username'];
            echo "<div class='welcome-admin'>";
            echo "<h1>WELCOME</h1>";
            echo "<h1>$username</h1></div>";
        }


        ?>

    </main>



    <?php include './partial/footer.php'; ?>
</body>

</html>