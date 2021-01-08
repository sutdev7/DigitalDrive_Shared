<?php
$to = "debashis.matainja@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

if (mail($to,$subject,$txt,$headers))
echo "send";
else
echo "not";
?>