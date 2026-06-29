<?php
session_save_path('/tmp');
session_start();
header("Content-Type: text/plain");
if (!isset($_SESSION['test_counter'])) {
    $_SESSION['test_counter'] = 1;
} else {
    $_SESSION['test_counter']++;
}
echo "Session counter: " . $_SESSION['test_counter'] . "\n";
echo "Session ID: " . session_id() . "\n";
echo "Session save path: " . session_save_path() . "\n";
?>
