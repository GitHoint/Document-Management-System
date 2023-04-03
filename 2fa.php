<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktop.css" />
    <title>Two Factor Authentication :: Document Manager</title>
</head>
<body>
    <?php
        session_start();
        $email = $_SESSION["email"];
    ?>
    <header class="blank-header" style="
    height: 67px;
    background-color: #128754;"></header>
    <div class="code">
        <form action="" method="post" id="login-form">
            <h2>Two Factor Authentication</h2>
            <p>An email has been sent to <?php echo (substr($email, 0,5) . "****" . substr($email, -4)) ?> </p>
            <p>Enter the 6-Digit Code Below</p>
            <input type="text" placeholder="000 000" name="vericode" id="two-factor" required>
            <?php
                error_reporting(0);
                $code = $_SESSION["code"];
                if ($code == $_POST["vericode"])
                {
                    header("Location: search.php");
                }
                else
                {
                    if ($_POST != null)
                    {
                        echo "<h2 class='status-msg'>Invalid Code</h2>";
                    }
                }
            ?>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>