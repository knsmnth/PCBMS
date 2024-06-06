
<?php
class ConnectionDAO
{
    protected $username = "root";
    protected $password = "";
    protected $host = "localhost";
    protected $db_name = "arar_pcbms_db";
    protected $dbh = null;

    public function openConnection()
    {
        try {
            $this->dbh = new PDO("mysql:host={$this->host};dbname={$this->db_name};unix_socket=/var/run/mysqld/mysqld.sock", $this->username, $this->password);

            //$this->dbh = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
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