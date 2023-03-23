<?php 
    session_start();
    $email = $_SESSION['email-to-reset'];
    require_once("includes/config.php");
    $queryUsers = "SELECT 'email' FROM employee WHERE active='1'";
    $resultUsers = $mysqli->query($queryUsers);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktop.css" /> 
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/code-confirm.js"></script>
    <title>Register New Password | Document Manager</title>
</head>
<body>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <p>An e-mail has been sent to <?php echo $email; ?>, enter the code you have recieved below.</p>
        <form method="post" id="input-code-frm">
            <input type="text" name="inp-code" class="pwd-filled" placeholder="Enter verification code">
            <input type="submit" value="Submit" id="pwd-rest">
        </form>
        <?php
            error_reporting(0);
            $code = $_SESSION["valid-code"];
            if ($code == $_POST["inp-code"])
            {
                echo "<h3 class='status-msg'>Code Accepted</h3>";
                echo "<script>PasswordEntry();</script>";
                // echo new input form for new password
            }
        ?>
    </div>
</body>
</html>