<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Онлайн Школа Маяковской Анастасии</title>
    <link rel="preload" href="fonts/Comfortaa/comfortaa.woff2" as="font">

    <link rel="stylesheet" href="css/Comfortaa-Font.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fix.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/media.css">
</head>
<body class="drawer drawer--right">
<header>
    <div class="container">
        <a href="./index.html" class="logo-wrap">
            <img src="img/logo.svg" alt="Logo">
        </a>
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
<footer id="contacts">
  <div class="container">
    <div class="footer__content">
      <div class="footer__block">
        <h4 class="footer__title">Почта</h4>
        <a href="mailto:mayakovskayaanastasiya@gmail.com" class="footer__text text">
          mayakovskayaanastasiya@gmail.com
        </a>
      </div>
      <div class="footer__block">
        <h4 class="footer__title">Телефон</h4>
        <a href="tel:89969190166" class="footer__text text">
          8 (996) 919-01-66
        </a>
      </div>
      <div class="footer__block">
        <h4 class="footer__title">Напишите нам</h4>
        <div class="footer__block__links">
          <a class="footer__block__link telegram" target="_blank">
            <img src="img/icons/socials/telegram.svg" alt="Telegram">
          </a>
          <a class="footer__block__link whatsapp" href="https://api.whatsapp.com/send?phone=79969190166" target="_blank">
            <img src="img/icons/socials/whatsapp.svg" alt="Whatsapp">
          </a>
          <a class="footer__block__link viber" href="viber://contact?number=%2B79969190166" target="_blank">
            <img src="img/icons/socials/viber.svg" alt="Viber">
          </a>
        </div>
      </div>
      <div class="footer__block">
        <h4 class="footer__title">Наши соц-сети</h4>
        <div class="footer__block__links">
          <a class="footer__block__link vk" href="https://vk.com/mayakovskaya_school" target="_blank">
            <img src="img/icons/socials/vk.svg" alt="Vk">
          </a>
          <a class="footer__block__link instagram" href="https://instagram.com/mayakovskaya_school?igshid=YmMyMTA2M2Y=" target="_blank">
            <img src="img/icons/socials/instagram.svg" alt="Instagram">
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/iscroll.min.js"></script>
<script src="js/drawer.min.js"></script>
<script src="js/typed.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.inputmask.bundle.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>