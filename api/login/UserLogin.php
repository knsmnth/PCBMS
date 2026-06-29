<?php
session_save_path('/tmp');
session_start();
include __DIR__ . "/../model/UserDAO.php";

$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$process = new UserDAO();

$getResult = $process->personnel($username, $password);

// If the login failed, print diagnostic information instead of silent redirect
if (count($getResult) === 1 && $getResult[0] === 'Empty') {
    header("Content-Type: text/plain");
    echo "--- LOGIN DIAGNOSTIC REPORT ---\n\n";
    echo "Submitted Username: '$username'\n";
    echo "Submitted Password: '$password'\n";
    echo "Submitted Role:     '$role'\n\n";
    
    // Connect directly to debug
    try {
        $db = new ConnectionDAO();
        // Access protected properties using reflection or just instantiate PDO directly
        $dsn = "mysql:host=" . getenv('DB_HOST') . ";port=" . (getenv('DB_PORT') ?: '3306') . ";dbname=" . getenv('DB_NAME');
        $dbh = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Database Connection: SUCCESS\n";
        
        // Let's query all users to see what exists in the database
        $stmt = $dbh->query("SELECT userid, username, password, role FROM users");
        $all_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "Users in Database:\n";
        print_r($all_users);
        
    } catch (Exception $e) {
        echo "Database Connection: FAILED - " . $e->getMessage() . "\n";
    }
    
    echo "\nSession Path Writeable: " . (is_writable('/tmp') ? 'YES' : 'NO') . "\n";
    exit;
}

foreach ($getResult as $row) {
    if ($row == 'Empty') {
        session_destroy();
        header("Location: ../?Invalid= 1");
    } else {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        if ($role == $row['role']) {
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["mname"] = $row['mname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION['role'] = $role;
            if ($row['role'] == 'Cashier') {
                header("Location: ../pos/");
            } else if ($row['role'] == 'Manager') {
                header("Location: ../manage/index.php");
            } else if ($row['role'] == 'Personnel') {
                header("Location: ../dtr/");
            } else {
                header("Location: ../?Invalid= 2");
            }
        } else {
            session_destroy();
            header("Location: ../?Invalid= 2");
        }
    }
}