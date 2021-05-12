<?php
require_once "database.php";

unset($_SESSION['username']);

header("Location: index.php");
die();