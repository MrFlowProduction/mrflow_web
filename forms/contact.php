<?php

  $to = "info@mrflow.hu";
  $from = $_POST['email'];
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = "From:" . $from;
  mail($to,$subject,$message,$headers);
