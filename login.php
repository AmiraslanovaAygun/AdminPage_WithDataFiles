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

    <main class="my-page login-page">
        <img src="./images/login.jpg" alt="">
        <div class="login-card">
            <h2>Login</h2>
            <form class="login-form" method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Login</button>
            </form>
        </div>


        <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];


            require './partial/helpers.php';
            $fileName = "data.csv";
            $transactions = getTransactions($fileName);

            for ($i = 0; $i < count($transactions); $i++) {
                $transaction = $transactions[$i];
                if ($transaction['username'] === $username) {
                    if (password_verify($password, $transaction['password'])) {
                        $_SESSION['username'] = $transaction['username'];
                        header("Location: admin.php");
                        exit();
                    }
                } else {
                    echo '<script>alert("Yanlış istifadəçi adı və ya Parol");</script>';
                }
            }
        }

        ?>
    </main>

    <?php include './partial/footer.php'; ?>
</body>

</html>