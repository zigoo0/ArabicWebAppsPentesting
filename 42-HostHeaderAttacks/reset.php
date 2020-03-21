<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Password Reset page</title>
        <link rel="stylesheet" href="main.css">
</head>
<body>
        <form class="login-form" action="reset.php" method="post">
                <h2 class="form-title">Reset password</h2>
                <div class="form-group">
                        <label>Your email address</label>
                        <input type="email" name="email">
                </div>
                <div class="form-group">
                        <button type="submit" name="reset-password" class="login-btn">Submit</button>
                </div>
        </form>
</body>
</html>
<?php
$host = "http://".$_SERVER['HTTP_HOST'];
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));
  //echo $token;
  // Send email to user with the token in a link they can click on
  $to = $email;
  $subject = "Reset your password on examplesite.com";
  $msg = "Hi there, click on this <a href=\"$host/confirm.php?token=" . $token . "\">link</a> to reset your password on our site";
  $msg = wordwrap($msg,70);
  $headers = "From: info@examplesite.com";
  mail($to, $subject, $msg, $headers);
  echo "<center>An email have been sent to your mailbox, you can use it to reset your password!</center>";
  }
?>
