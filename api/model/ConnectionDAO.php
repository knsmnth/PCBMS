<?php
class ConnectionDAO
{
    protected $username;
    protected $password;
    protected $host;
    protected $db_name;
    protected $port;
    protected $dbh = null;

    public function __construct()
    {
        $this->host = getenv('DB_HOST') ?: "localhost";
        $this->username = getenv('DB_USER') ?: "root";
        $this->password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : "";
        $this->db_name = getenv('DB_NAME') ?: "arar_pcbms_db";
        $this->port = getenv('DB_PORT') ?: "3306";
    }

    public function openConnection()
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            $db_socket = getenv('DB_SOCKET');
            if ($db_socket) {
                $dsn .= ";unix_socket={$db_socket}";
            } else if ($this->host === "localhost" && (defined('PHP_OS_FAMILY') ? PHP_OS_FAMILY !== 'Windows' : DIRECTORY_SEPARATOR === '/')) {
                $dsn .= ";unix_socket=/var/run/mysqld/mysqld.sock";
            }
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->dbh = null;
    }
}
?>