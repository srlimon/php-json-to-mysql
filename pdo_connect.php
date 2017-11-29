 <?php
 // Defined as constants so that they can't be changed
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'db_name');
DEFINE ('DB_USER', 'username');
DEFINE ('DB_PASSWORD', 'password'); 

try {
    $conn = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASSWORD); 
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //disable this for safety reasons
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
