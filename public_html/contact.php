<?php
if(!empty($_POST['website'])) die();


 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LdVCIkUAAAAAG29d75-Wkoqtg2CsPbVTZQuQ05R';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your contact request have submitted successfully.';
        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
   

$EmailFrom = "contact@blueoceanengg.com";
$EmailTo = "blueoceanengg@outlook.com";
$Subject = "From: ".Trim(stripslashes($_POST['Name']))." ,Topic: ".Trim(stripslashes($_POST['Subject']));
$Name = Trim(stripslashes($_POST['Name']));  
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "From: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=success.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error\error.html\">";
}
}
?>