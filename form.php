<?php
$name = $_REQUEST['name'];
$mail = $_REQUEST['mail'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];

$fileName = "messages.txt";

$fh = fopen($fileName, 'a') or die("Can't create file");

$message = $name."-splitter-".$mail."-splitter-".$subject."-splitter-".$message."-bigSplitter-";
fwrite($fh, $message);
fclose($fh);

echo "<span class='text-emerald-400'>Sent! I hope we keep in touch :D</span>";

?>