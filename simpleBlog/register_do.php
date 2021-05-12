<?php
require_once "database.php";
$log = array();
if(isset($_POST['submit'])) {
    $log['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $repeat = filter_var($_POST['repeat'], FILTER_SANITIZE_STRING);

    if(empty($log['username']) || empty($password)) {
        $log['error'] = "All values must be completed";
    }
    else if($password != $repeat) {
        $log['error'] = "Password does not match";
    }
    else {
        $result = $conn->query("SELECT * FROM content WHERE username='{$log['username']}'");
        if($result->rowCount() > 0) {
            $log['error'] = "Username already in use";
        }
        else {
            // OK, register
            $encrypted = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO content(username, password)
                      VALUES('{$log['username']}', '$encrypted')";
            $conn->exec($query);
            header("Location: login.php");
            die();
        }
    }
    $_SESSION['log'] = $log;
    header("Location: register.php");
    die();
}
else {
    echo "Invalid access";
}