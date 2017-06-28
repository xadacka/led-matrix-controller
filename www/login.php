<?php 

session_start();

$logins = array('xer0' => 'password'); //change password to whatever you'd like.

if($_POST['Submit'] == 'Submit') { 
    $user = $_POST['user']; 
    $pass = $_POST['pass']; 
    if (isset($logins[$user]) && ($logins[$user] == $pass)) {
        $_SESSION['username'] = $user; 
        header('Location: sender.php'); 
        } 
		else {
echo "Access Denied";
header('Location: index.php'); // redirect back to login page
}
    }
?>
Not logged in.
