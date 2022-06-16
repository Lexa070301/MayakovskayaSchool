<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн Школа Маяковской Анастасии</title>
    <link rel="preload" href="fonts/Comfortaa/comfortaa.woff2" as="font">
    <link rel="preload" href="fonts/Rubik/Rubik-Black.woff2" as="font">
    <link rel="preload" href="fonts/Rubik/Rubik-Bold.woff2" as="font">
    <link rel="preload" href="fonts/Rubik/Rubik-Regular.woff2" as="font">

    <link rel="stylesheet" href="css/Rubik-Font.css">
    <link rel="stylesheet" href="css/Comfortaa-Font.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fix.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body>
<header>
    <div class="container">
        <div class="logo-wrap">
            <img src="img/logo.png" alt="Logo">
            <span class="logo__span">Маяковской Анастасии</span>
        </div>
    </div>
</header>
<?php
if(isset($_POST["submit"])) {
    // Checking For Blank Fields..
    if($_POST["name"]==""||$_POST["phone"]==""||$_POST["email"]=="") {
       ?>
       <div class="email-card">
           <img class="email-card__icon" src="img/icons/error.svg" alt="Ok">
           <h2 class="email-card__title">Заполните все поля!</h2>
       </div>
       <?php
    } else {
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        // Check if the "Sender's Email" input field is filled out
        $email=$_POST['email'];
        // Sanitize E-mail Address
        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate E-mail Address
        $email= filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
        ?>
        <div class="email-card">
            <img class="email-card__icon" src="img/icons/error.svg" alt="Ok">
            <h2 class="email-card__title">Введите корректный Email!</h2>
        </div>
        <?php
        } else {
            $subject = "Заявка с Онлайн Школы Маяковской Анастасии";
            $message = "Имя: " . $name . "\nТелефон: " . $phone . "\nEmail: " . $email;
            $headers = 'From:'. $email; // Sender's Email
            // Message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // Send Mail By PHP Mail Function
            mail("Lexa070301@gmail.com", $subject, $message, $headers);
            ?>
            <div class="email-card">
                <img class="email-card__icon" src="img/icons/ok.svg" alt="Ok">
                <h2 class="email-card__title">Ваша заявка успешно отправлена!</h2>
            </div>
            <?php
        }
    }
}
?>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.inputmask.bundle.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>