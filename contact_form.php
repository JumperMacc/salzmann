<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>contact form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/contact.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js\jquery.validate.min.js"></script>
</head>
<body>

<nav>
    <a href="./">Home</a>
    <a href="info">Über mich</a>
    <a class="active" href="contact_form">Kontakt</a>
</nav>

<div class="container">

<div class="main">

    <h2>Kontakt Formular</h2>

<form id="contact" method="post" action="sendform.php">

    <label for="male">Herr<input type="radio" id="male" name="gender" value="Herr" required/></label>
    <br>
    <label for="female">Frau<input type="radio" id="female" name="gender" value="Frau" required/></label>
    <br><br>

    <label for="lastName">Nachname:</label><br>
    <input type="text" id="lastName" name="lastName" placeholder="Nachname" required /> <br>
    
    <label for="firstName">Vorname:</label><br>
    <input type="text" id="firstName" name="firstName" placeholder="Vorname" required /> <br>

    <label for="phone">Tel:</label><br>
    <input type="tel" id="phone" name="phone" placeholder="Telefon Nr. Optional" /> <br>

    <label for="mail">E-mail:</label><br>
    <input type="email" id="mail" name="mail" placeholder="E-mail adresse" required /> <br>

    <label for="message">Ihr Anliegen:</label><br>
    <textarea type="text" id="message" name="message" placeholder="Ihr Anliegen" required /></textarea><br>

    <input type="hidden" name="trap">

    <input class="submit" type="submit" name="submit" value="Anfrage senden">

</form>

</div>

</div>

<script>$("#contact").validate();</script>


</body>
</html>