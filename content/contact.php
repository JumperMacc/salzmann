<!DOCTYPE html>
<html>

<head>
    <title>Salzmann Versicherungen</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="Salzmann Versicherungen" content="Versicherungsberater der Allianz. Beratung für Farhzeugversicherungen, Sachversicherungen, Lebensversicherungen und vieles mehr. Versicherungen der Allianz, aber mit persönlicher Note"
    />
    <meta name="google-site-verification" content="UNfKwZ0gaaFWEi58_hJZOo_jeQeNu1OkYNq-LGDVAFY" />
</head>

<body>

    <div class="grid-container">

        <nav>
            <a href="../index.html">Home</a>
            <a href="./info.html">Über mich</a>
            <a class="active" href="./contact.php">Kontakt</a>
        </nav>

        <header>
            <div class="logo">
                <a href="../index.html"><img src="../images/logo.gif" alt="Salzmann-Versicherungen" /></a>
            </div>
        </header>

        <div class="searchbar">
            <div class="googlesearch">
                <script>
                    (function () {
                        var cx = '014142901687395571446:ty72vamu6z4';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:search></gcse:search>
            </div>
        </div>

        <div class="banner hidden">
            <img src="../images/banner.gif" alt="Persönliche Beratung">
        </div>

        <div class="content">            
            <?php
            $action=$_REQUEST['action'];
            if ($action=="")    
                {
                ?>
                <p class="error">Felder mit einem * müssen ausgefüllt werden!</p>

                <form class="contact_form" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit">
                
                Vollständiger Name:<span class="error">*</span><br>
                <input name="name" type="text" value="" size="30"/><br>

                E-mail:<span class="error">*</span><br>
                <input name="email" type="text" value="" size="30"/><br>

                Telefon:<br>
                <input name="telnr" type="text" value="" size="30"/><br>
                
                Anliegen:<span class="error">*</span><br>
                <textarea name="message" rows="7" cols="25"></textarea><br>
                <input type="submit" value="Absenden"/>
                
                </form>
                <?php
                } 
            else                
                {
                $to="rolf.salzmann@allianz-suisse.ch";
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                $message=$_REQUEST['message'];
                $tel=$_REQUEST['telnr'];
                if (($name=="")||($email=="")||($message==""))
                    {
                    header("Location: contact_error.html");
                    }
                else{		
                    $headers = "Reply-To: $name<$email>\r\n";
                    $headers .= "Return-Path: $name<$email>\r\n";
                    $headers .= "From: $name<$email>\r\n";
                    $headers .= "Organization: Salzmann-Versicherungen\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
                    $headers .= "X-Mailer: PHP". phpversion("7.0.30") ."\r\n";
                    $subject="Neue Kontaktanfrage";
                    $txt =  $name . ' Hat eine Anfrage über salzmann-versicherungen gesendet:'
                            . "\r\n\r\n"
                            . '"'. $message .'"'
                            . "\r\n\r\n"
                            . 'Untenstehend finden Sie die Kontaktdaten des Antragstellers:'
                            . "\r\n"
                            . "email: ". $email
                            . "\r\n"
                            . $tel;

                    mail($to, $subject, $txt, $headers);
                    header("Location: contact_success.html");
                }
            }
            ?>
        </div>  <!-- /content !-->

        <footer>
            <div class="contacts">
                <a href="impressum.html">impressum</a>
                <a href="contact.php">Kontakt</a>
            </div>
        </footer>

    </div>

</body>

</html>