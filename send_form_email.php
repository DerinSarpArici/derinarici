<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "derinsarparici@hotmail.com";
    $email_subject = "www.derinsarparici.tk sitesinden mesaj!";
 
    function died($error) {
        // your error code can go here
        echo "Çok üzgünüm ama program hata verdi eksik birşey yok dimi?. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['İsim']) ||
        !isset($_POST['Mail']) ||
        !isset($_POST['Konu']) ||
        !isset($_POST['Mesaj'])) {
        died('Çok üzgünüm ama program hata verdi eksik birşey yok dimi?.');       
    }
 
     
 
    $name = $_POST['İsim']; // required
    $email_from = $_POST['Mail']; // required
    $subject = $_POST['Konu']; // required
    $message = $_POST['Mesaj']; // required
    
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Girdiğiniz email gözükmüyor, doğru yazdığınıza emin misiniz?.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Girdiğiniz isim programda bir hata yarattı.<br />';
  }
 
   
  if(strlen($message) < 1) {
    $error_message .= 'Girdiğiniz yorum programda bir hata yarattı.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form detayları aşağıda.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "İsim: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Konu: ".clean_string($subject)."\n";
    $email_message .= "Mesaj: ".clean_string($message)."\n";
 
// create email headers
$headers = 'Kimden: '.$email_from."\r\n".
'Geri cevap ver: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
http://www.derinsarparici.tk/#iletisim
 
<?php
 
}
?>