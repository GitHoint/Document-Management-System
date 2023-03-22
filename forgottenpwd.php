<?php
    require_once("includes/config.php");
    $queryUsers = "SELECT * FROM employee WHERE active='1'";
?>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forgot your password | Document Management</title>
<link rel="stylesheet" href="css/desktop.css" />
</head>

<body>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <p>An e-mail will be sent to you with instruction on how to reset your password.</p>
        <form method="post" action="send-email.php">
            <input type="text" name="email" class="pwd-filled">
            <?php
                $code = rand(1000, 9999);
                $message = "You have requested a password reset, here is your code: ";
                $message .= $code;
                echo "<input type='hidden' name='subject' value='Password Reset'>";
                echo "<input type='hidden' name='message' value='$message'>";
                echo "<input type='hidden  name='return' value='passreg.php'>";
                session_start();
                $_SESSION["valid-code"] = $code;
            ?>
            <input type="submit" value="Submit" id="pwd-rest">
        </form>
    </div>
</body>
