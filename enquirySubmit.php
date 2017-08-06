<?php
  $displayMessage = ''; 
  $errorMessage = '';

  //clean the form data values
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $domain = isset($_POST['domain']) ? $_POST['domain'] : '';
  $validFormSubmission = true;
  //check whether the required data are all exists
  if($name == '' || $email == '' || $comments == ''){
      $validFormSubmission = false;
  }
  else{
    //validating name
    if(!preg_match("/^[A-Za-z .'-]+$/",$name)) {
      $validFormSubmission = false;
    }
    //validating email
    if(!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/",$email)) {
      $validFormSubmission = false;
    }

    //validating phone
    if($phone != ''){
      //TODO: DO THE VALIDATION FOR PHONE
      $checkPhone = substr($phone,0,3) == '+91' ? substr($phone, 3) : $phone;
      if(!preg_match("/^[0]?[789]\d{9}$/",$checkPhone)) {
        $validFormSubmission = false;
      }
    }
  }
  //set errormessage if there is any errors
  if(!$validFormSubmission) {
    $displayMessage .= "Invalid Form Submission. Please Check the Entries";
  }
  //else set successmessage and mail 
  else{
    $displayMessage .= "Thank you for contacting us. We will be in touch with you very soon.";
    //construct the email message
    $emailTo = "enquiry@tripleninfotech.com";
    $emailSubject = "Enquiry Form";
    $emailMessage =  "Form details below.\n\n"
                      ."Name: ".clean_string($name)."\n"
                      ."Email: ".clean_string($email)."\n"
                      ."Comments: ".clean_string($comments)."\n";

    $phone = clean_string($phone);
    $emailMessage .= $phone != "" ? "Phone: ".$phone." \n": "";
    $emailMessage .= $domain != "" ? "Domain: ".$domain." \n": ""; 
    //create email headers
    $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n" .'X-Mailer: PHP/' . phpversion();
    @mail($emailTo, $emailSubject, $emailMessage, $headers);  
  }
?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Enquiry Submit</title>
      <meta name="description" content="Triple N Infotech is FINAL YEAR | IEEE PROJECT CENTRE available in T. Nagar Chennai and Trichy. We are best MATLAB Training Insituite in chennai and also 50+ students completed MATLAB Training in T.Nagar Insituite">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/header.css">
  </head>
  <body>
    <div class="container">
      <header class="row">
        <a class="visible-phone navToggler">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div id="logo" class="col-xs-12 col-sm-4">
          <a href="/" title="Triplen"><img src="images/logo.png"/></a>
        </div>
        <div id="contactDetail" class="pull-right col-xs-12 col-sm-6">
          <span><font style="font-size:18px" face="Calibri">Contact : +91 9566234284 | 044 42868371</font></span>
        </div>
        <div class="col-xs-12 col-sm-8 pull-right nav">
          <ul class="navbar-right">
            <li><a href="http://tripleninfotech.com/index.html">Home</a></li>
            <li class="active"><a href="http://tripleninfotech.com/about.html">About Us</a></li>
            <li>
              <a>Projects</a>
              <ul>
                <li><a href="http://tripleninfotech.com/projects.html#embedded">Embedded</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#dsp">DSP | DIP</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#java">JAVA</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#dotnet">DOTNET</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#ns2">NS2</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#android">Android</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#vlsi">VLSI</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#plc">PLC | SCADA</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#pwrelec">Power Electronics</a></li>
                <li><a href="http://tripleninfotech.com/projects.html#pwrsys">Power System</a></li>
              </ul>
            </li>
            <li>
              <a>Training</a>
              <ul>
                <li><a href="http://tripleninfotech.com/courses.html">Courses</a></li>
                <li><a href="http://tripleninfotech.com/gallery.html">Gallery</a></li>
              </ul>
            </li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="http://tripleninfotech.com/contact.html">Contact Us</a></li>
          </ul>
        </div>
      </header>
      <div class="row" id="page">
        <div class="pageCnt">
          <h2 class="text-center"><?php echo $displayMessage;?></h2>
        </div>
      </div>
      <footer class="row">
        <div class="footTop col-xs-12">
          <div class="col-xs-12 col-sm-4">
            <h4>Contact Us</h4>
            <h5>Triple N Infotech</h5>

            <p>New No 33, (Old no 14/1), First floor
              Madley Road (Near Madley Subway)
              T Nagar, Chennai-17</p>
            <p>
              <span>Contact : 044-42868371</span>
              <span>Mobile : +919566234284</span>
              <span>Email : project@tripleninfotech.com</span>
            </p>
          </div>
          <div class="col-xs-12 col-sm-4">
            <h4>What We Do</h4>
            <ul>
              <li>IEEE Projects</li>
              <li>MATLAB Training</li>
              <li>OPEN CV Training</li>
              <li>EMBDEDDED Training</li>
              <li>Workshop</li>
              <li>MATLAB Projects</li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-4">
            <h4>Map</h4>
            <iframe width="100%" height="176" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Triple+N+Infotech&amp;aq=&amp;sll=13.034583,80.228304&amp;sspn=0.012062,0.021136&amp;ie=UTF8&amp;hq=&amp;hnear=Madley+Rd&amp;t=m&amp;ll=13.034579,80.228262&amp;spn=0.014717,0.024548&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
          </div>
          <div class="col-xs-6 col-sm-4"></div>
          <div class="col-xs-6 col-sm-4"></div>
        </div>
        <div class="footBtm col-xs-12">
          <p class="copyRight text-center">Copyright 2013. <b class ="themeClr1"> Triple N Infotech</b> All Rights Reserved</p>
        </div>
      </footer>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/triplen.js"></script>  
  </body>
</html>