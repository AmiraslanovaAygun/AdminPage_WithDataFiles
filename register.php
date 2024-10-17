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

    <main class="my-page register-page">
        <img src="./images/register.png" alt="">

        <div class="register-card">
            <h2>REGISTER</h2>
            <form class="register-form" method="POST" action="register.php">
                <input type="text" name="username" placeholder="Name" required />
                <input type="text" name="surname" placeholder="Surname" required />
                <input type="password" name="password" placeholder="Password" required/>
                <button type="submit">Register</button>
            </form>
        </div>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim(htmlspecialchars($_POST["username"]));
            $surname = trim(htmlspecialchars($_POST["surname"]));
            $password = trim(htmlspecialchars($_POST["password"]));

            if (empty($username) || empty($surname) || empty($password)) {
                trigger_error("All inputs are required!!!", E_USER_ERROR);
            };

            $data = [
                'username' => $username,
                'surname' => $surname,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $fileName = "data.csv";
            $file = fopen($fileName, 'a');
            fputcsv($file, $data);
            fclose($file);
            header("Location: login.php");
        };

        ?>
    </main>

    <?php include './partial/footer.php'; ?>
</body>

</html>