<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "password", "database_name");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_input = $_GET['name'];  // Example: User enters "Alice"

// Run an SQL query
$sql = "SELECT * FROM users WHERE user_id = $user_input";
$result = mysqli_query($conn, $sql);

// Fetch and display results
while ($row = mysqli_fetch_assoc($result)) {
    echo "User: " . $row['username'] . "<br>";
}

// Close the connection
mysqli_close($conn);

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=localhost;dbname=database_name", "root", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_input = $_GET['name'];  // Example: User enters "Alice"
    // Prepare & execute query
    $sql = "SELECT * FROM users WHERE user_id = $user_input";
    $stmt = $pdo->query($sql);

    // Fetch & display results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "User: " . $row['username'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;

// Create connection
$conn = new mysqli("localhost", "root", "password", "database_name");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Display results
while ($row = $result->fetch_assoc()) {
    echo "User: " . $row['username'] . "<br>";
}

// Close connection
$conn->close();

// Example: User input from a GET request
$user_input = $_GET['name'];  // Example: User enters "Alice"

// Vulnerable query with direct string concatenation (unsafe)
$SQL = "SELECT * FROM users WHERE username = '" . $user_input . "'";

// Example output of the query (you can print it for debugging)
echo $SQL;

// Execute the query (vulnerable to SQL injection)
$conn = new mysqli("localhost", "root", "password", "database_name");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query
// ruleid: sql_injection
$result = $conn->query($SQL);

// ruleid: sql_injection
$result = $conn->query("SELECT * FROM users WHERE username = '" . $user_input . "'");

// Fetch and display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "User: " . $row['username'] . "<br>";
    }
} else {
    echo "No user found with that name.";
}

// Close the connection
$conn->close();

function logError($message) {
    file_put_contents('error_log.txt', date('Y-m-d H:i:s') . " - " . $message . PHP_EOL, FILE_APPEND);
}

function insertProduct($params) {
    // Simulate some product insertion logic
    if (!isset($params['agProductCode'])) {
        return ['status_code' => -1, 'status_msg' => 'Missing product code'];
    }
    $user_input = $_GET['name'];  // Example: User enters "Alice"

    // Your original line
    // ok: sql_injection
    return ['status_code' => -2, 'status_msg' => 'error in insert product t_product_mappings for tango product' . $params['agProductCode']];
}

// Example usage
$params = ['agProductCode' => 'TNG123'];
$result = insertProduct($params);

if ($result['status_code'] < 0) {
    logError($result['status_msg']);
}

// Simulate a successful operation
echo json_encode($result, JSON_PRETTY_PRINT);
?>