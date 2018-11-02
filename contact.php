<?php

  //Check for header injection

  function has_header_injection($str){
    return preg_match( "/[\r\n]/", $str);
  }

  if (isset ($_POST['contact_submit'])){

    $subject = trim($_POST['subject']);
    $email = trim($_POST['email']);
    $msg = $_POST['message'];


    //Check to see if $name or $email have header incjections

  if (has_header_injection($subject) || has_header_injection($email)) {
    die();  //if true, kill the script
    }

    if (!$subject || !$email || !$msg){
      echo '<h4 class="error">All fields required.</h4><a href="contact.php" class="button block">Go back and try again</a>';
      exit;

    }

    //add the recipient email to a variable. put YOUR email here!
    $to = "ty@moorewebdev.com";

    // Create a subject
    $subject = "Hey Ty, $subject";

    //construct the message
    $message = "Subject: $$subject\r\n";
    $message .= "Email: $email\r\n";
    $message .= "Message:\r\n$msg";

    //If the subscibe checkbox was checked
    if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){

      //Add a new line to the $message
      $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";

    }

    $message = wordwrap($message,72);

    //Set the mail headers into a variable

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: $name <$email> \r\n";
    $headers .= "X-Priority: 1\r\n";
    $headers .= "X-MSMail-Priority: High\r\n\r\n";

    //Send the email
    mail($to, $subject, $message, $headers);
    if(mail()){
      echo "<script>
           $(window).load(function(){
               $('#thankyouModal').modal('show');
           });
      </script>";
    }


    // <!-- Show success message after email has sent -->


}
    ?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="Contact me" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
  <link href="./assets/favicon.ico" rel="icon">

  <title>Contact</title>

<link href="./main.3f6952e4.css" rel="stylesheet">
<link rel="icon"
    type="image/png"
    href="img/favicon.ico">
</head>

<body class="">
<div id="site-border-left"></div>
<div id="site-border-right"></div>
<div id="site-border-top"></div>
<div id="site-border-bottom"></div>
 <!-- header -->
<header>
  <nav class="navbar  navbar-fixed-top navbar-default">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav ">
          <li><a href="./index.html" title="">Home</a></li>
          <li><a href="./works.html" title="">Works</a></li>
          <li><a href="./about.html" title="">About me</a></li>
          <li><a href="./contact.php" title="">Contact</a></li>
          <li><a href="./work.html" title="">Tools</a></li>
        </ul>


      </div>
    </div>
  </nav>
</header>


<div class="section-container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="section-container-spacer text-center">
            <h1 class="h2">Contact me</h1>
          </div>

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <form action="" class="reveal-content" method="post" id="contact-form">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Enter your message" name="message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-default btn-lg" name="contact_submit">Send</button>
                    </div>
                    </form>
                    <div class="col-md-5 address-container">
                      <ul class="list-unstyled">
                        <li>
                          <span class="fa-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                          </span>
                          208-358-7592
                        </li>
                        <li>
                          <span class="fa-icon">
                            <i class="fa fa-at" aria-hidden="true"></i>
                          </span><a <a href="mailto:someone@example.com?Subject=Hey%20Ty" target="_top"> tymulungu@gmail.com</a>

                        </li>

                      </ul>
                      <h3>Follow me on social networks</h3>
                      <a href="https://www.facebook.com/tymulungu" title="" class="fa-icon" target="_blank">
                        <i class="fa fa-facebook"></i>
                      </a>
                      <a href="https://www.linkedin.com/in/tyler-moore-744916153/" title="" class="fa-icon" target="blank">
                        <i class="fa fa-linkedin"></i>
                      </a>
                      <a href="https://www.instagram.com/c3vetteguy/" title="" class="fa-icon" target="blank">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </div>
                  </div>
                </form>
            </div>

          </div>

       </div>
      </div>
    </div>
  </div>


<footer class="footer-container text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Moore Web Development</p>
      </div>
    </div>
  </div>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function (event) {
     navActivePage();
  });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

--> <script type="text/javascript" src="./main.70a66962.js"></script></body>

</html>
