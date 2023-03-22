<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Password | Document Manager</title>
</head>
<body>
    <div class="forgot-pwd">
        <h1>Reset your password</h1>
        <p>An e-mail will be sent to you with instruction on how to reset your password.</p>
        <form method="post" id="input-code-frm">
            <input type="text" name="inp-code" class="pwd-filled" placeholder="Enter verification code">
            <input type="submit" value="Submit" id="pwd-rest">
        </form>
        <?php
            session_start();
            $code = $_SESSION["valid-code"];
            if ($code = $_POST["inp-code"])
            {
                echo "code accepted";
                echo "<script>PasswordEntry()</script>";
                // echo new input form for new password
            }
        ?>
    </div>
</body>
</html>