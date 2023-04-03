<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktop.css" /> 
    <script src="js/jquery-3.6.4.js"></script>
    <script type="text/javascript" src="js/code-confirm.js"></script>
    <title>Enter New Password</title>
</head>
<body>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <form method="post" action="" autocomplete="off">
            <input type="password" name="new-pass" class="pwd-filled" placeholder = "Enter New Password" required>
            <br>
            <input type="password" name="conf-pass" class="pwd-filled" placeholder = "Confirm Password" required>
            <?php
                error_reporting(0);
                $newpass = $_POST["new-pass"];
                $confpass = $_POST["conf-pass"];
                if ($newpass != null and $confpass != null)
                {
                    $newpass = $_POST["new-pass"];
                    $confpass = $_POST["conf-pass"];
                    if ($newpass == $confpass)
                    {
                        $hashedPass = password_hash($newpass, PASSWORD_DEFAULT);
                        session_start();
                        $id = $_SESSION["id"];
                        require_once("includes/config.php");
                        $query = "UPDATE employee SET password = '$hashedPass' WHERE id = '$id'";
                        $mysqli->query($query);
                        header("Location: index.php");
                    }
                    else
                    {
                        echo "<h2 class='status-msg'>Password Does Not Match</h2>";
                    }  
                }
            ?>
            <input type="submit" value="Submit" id="pwd-rest">
        </form>
    </div>
</body>
</html>