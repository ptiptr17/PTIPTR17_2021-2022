<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="../html/welcome.html">Go back</a>';
header("refresh:5; url=../html/welcome.html" );
?>