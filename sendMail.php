<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['name']) && isset($_POST['email']))
    {
        $name = $_POST['name'];
        $email = $_POST['$email'];
        $subj = $_POST['$subject'];
        $msg = $_POST['$message'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "priyam.webui@gmail.com";
        $mail->Password = "Pwebui@01";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email settings
        $mail->isHTML(true);
        $mail->setFrom($email,$name);
        $mail->addAddress("priyam.webui@gmail.com");
        $mail->Subject = ("$email($subj)");
        $mail->Body = $msg;

        if($mail->send())
        {
            $status = "Success";
            $response = "Message is sent";
        }
        else 
        {
            $status = "Failed !!";
            $response = "Something went wrong: <br>". $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
        


    }
?>