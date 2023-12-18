<?php 

// dd($database_credentials);
class Database {

    public $connection;
    public $statement;


    public function __construct() {

        extract(require base_path('/Config/config.php'));
        $this->connection = new mysqli($hostname, $username, $password, $database);
        
        if ($this->connection->connect_error) {
            die("Connection failed " . $connect_error);
        } else {
            ?>
            <script>
                console.log("<?php echo "Connected to database successfully." ?>");
            </script>
            <?php
        }
    } 


    public function checkResultAndReturn($result) {

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return "Error: No data was found.";
        }
    }
}



