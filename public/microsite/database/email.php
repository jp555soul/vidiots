<?php
if(isset($_POST['email'])) {
    $day = date('l');
    $data = $_POST['email'] . " - ".$day."\r\n";
    $ret = file_put_contents('../database/emails.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
    	$success = "../success.html";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$success.'">';
        exit;
    }
}
else {
   die('no post data to process');
}

?>