<?php
session_start();
session_destroy();
header("Location: ../index.php?loginError=Logged out successfully!");

?>