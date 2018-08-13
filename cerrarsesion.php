<?php

session_start();
$_SESSION = array();
session_destroy();
setcookie(session_name(),"",time()-3600,"","");
session_write_close();

header("Location: index.php");