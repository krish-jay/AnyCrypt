<?php 
session_start();

unset($_SESSION["aid"]);

session_destroy();
$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
} else {
    header('Location: index'); // default page
}
?>