<?php
    include('config.php');

    $servername = $db_config['hostname'];
    $username = $db_config['username'];
    $password = $db_config['password'];
    $db = $db_config["database"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected to practice database successfully <br> ";
    $message = "Connected to practice database successfully";
    ?>

    <script>
        console.log("<?php echo $message ?>");
    </script>
