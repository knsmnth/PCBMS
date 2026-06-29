<?php
header("Content-Type: text/plain");
include_once __DIR__ . "/model/ConnectionDAO.php";

echo "--- Database Connection Diagnostic Tool ---\n\n";

class TestConnection extends ConnectionDAO {
    public function test() {
        echo "Attempting to connect with configuration:\n";
        echo "Host: " . $this->host . "\n";
        echo "Port: " . $this->port . "\n";
        echo "Database: " . $this->db_name . "\n";
        echo "User: " . $this->username . "\n";
        echo "Password length: " . strlen($this->password) . "\n\n";

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            $db_socket = getenv('DB_SOCKET');
            if ($db_socket) {
                $dsn .= ";unix_socket={$db_socket}";
            }
            
            $dbh = new PDO($dsn, $this->username, $this->password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "SUCCESS: Connected to the database successfully!\n";
            
            // Check tables
            echo "\nChecking tables:\n";
            $tables = ['personnel', 'users', 'product', 'supplier'];
            foreach ($tables as $table) {
                try {
                    $stmt = $dbh->query("SELECT COUNT(*) FROM `$table`");
                    $count = $stmt->fetchColumn();
                    echo " - Table '$table': EXISTS ($count rows)\n";
                } catch (PDOException $e) {
                    echo " - Table '$table': ERROR - " . $e->getMessage() . "\n";
                }
            }
            
        } catch (PDOException $e) {
            echo "ERROR: Connection failed!\n";
            echo "Message: " . $e->getMessage() . "\n";
        }
    }
}

$tester = new TestConnection();
$tester->test();
?>
