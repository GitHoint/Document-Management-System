<?php 
    session_start();
    $email = $_SESSION['email-to-reset'];
    require_once("includes/config.php");
    $queryUsers = "SELECT *, COUNT(*) as count FROM employee WHERE active='1' and email = '$email'";
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
    <script type="text/javascript" src="js/code-confirm.js"></script>
    <title>Register New Password | Document Manager</title>
</head>
<body>
    <?php
        include("includes/header.php");
    ?>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <p>An e-mail has been sent to <?php echo (substr($email, 0,5) . "****" . substr($email, -4)) ?>, enter the code you have recieved below.</p>
        <form method="post" id="input-code-frm">
            <input type="text" name="inp-code" class="pwd-filled" placeholder="Enter verification code">
            <input type="submit" value="Submit" id="pwd-rest">
        </form>
        <?php
            error_reporting(0);
            $code = $_SESSION["valid-code"];
            if ($code == $_POST["inp-code"])
            {
                $row = mysqli_fetch_assoc($resultUsers);
                if ($row["count"] == 0)
                {
                    echo "<script type='text/javascript'>
                            $('.forgot-pwd > p').hide();
                            $('#input-code-frm').hide();
                          </script>";
                    echo "<h2 class='status-msg'>There is no account tied to this email. If you haven't made an account, contact your administrator to set one up.</h2>";
                    echo "<form action='index.php'>";
                    echo '<input type="submit" value="Return" id="pwd-rest">';
                    echo "</form>";
                }
                else
                {
                    $_SESSION["id"] = $row["id"];
                    echo "<h2 class='status-msg'>Valid Code</h2>";
                    header("Location: newpass.php");
                }
            }
            else
            {
                if (isset($_POST["inp-code"]))
                {
                    echo "<h2 class='status-msg'>Invalid Code</h2>";
                }
            }
        ?>
    </div>
</body>
</html>