<?php 

namespace Core;

class Database {

    public $connection;
    public $statement;


    public function __construct() {

        extract(require base_path('/Config/config.php'));
        $this->connection = new \mysqli($hostname, $username, $password, $database);
        
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

    public function executePreparedStatement($method, $query, $types = '', ...$params) {
      
        $preparedStatement = $this->connection->prepare($query);

        if ($preparedStatement) {
            if (!empty($types) && count($params) > 0) {
                $preparedStatement->bind_param($types, ...$params);
                $executionStatus = $preparedStatement->execute();

                if ($executionStatus) {
                    if (strtoupper($method) === "GET") {
                        $result = $preparedStatement->get_result();
                        return $this->checkResultAndReturn($result);
                    } else {
                        return $executionStatus;
                    }
                } else {
                    return "There was an error executing the statement: " . $this->connection->error;
                }
            }
        } else {
            return "There was an error preparing the statement: " . $this->connection->error;
        }
    }

    public function checkResultAndReturn($result) {

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            abort();
        }
    }
    
}



