<?php
session_start();
session_destroy();
header("Location: admin_form.php");
?>