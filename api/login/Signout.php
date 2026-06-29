<?php
include __DIR__ . "/../model/ConnectionDAO.php";

session_start();
session_unset();
session_destroy();
header("Location: ../")
    ?>