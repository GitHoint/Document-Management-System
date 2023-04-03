<?php
    require_once("includes/config.php");
    $queryUsers = "SELECT 'email' FROM employee WHERE active='1'";
?>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forgot your password | Document Management</title>
<link rel="stylesheet" href="css/desktop.css" />
<script src="js/jquery-3.6.4.js"></script>
<script src="js/code-confirm.js"></script>
</head>

<body>
    <?php
        include("includes/header.php");
    ?>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <p>An e-mail will be sent to you with instruction on how to reset your password. Enter the email your account is tied to.</p>
        <form method="post" action="send-email.php">
            <input type="text" name="email" class="pwd-filled" placeholder = "Enter Email" required>
            <?php
                error_reporting(0);
                $code = rand(1000, 9999);
                $message = "<h2>Password Reset Requested</h2> <h3>A password reset was requested, use the following code to proceed: $code</h3> <p>If you did not request this change, ignore this message and inform your system administrator.</p>";
                echo "<input type='hidden' name='subject' value='Password Reset'>";
                echo "<input type='hidden' name='message' value='$message'>";
                session_start();
                $_SESSION["valid-code"] = $code;
                $_SESSION["return"] = "passreg.php";
            ?>
            <input type="submit" value="Submit" id="pwd-rest">
            <p>Forgot your email? contact your administrator to recieve it.</p>
        </form>
    </div>
</body>
