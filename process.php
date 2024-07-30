<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password if any
$database = "car_rental_database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $car = $_POST["car"];
    $address = $_POST["address"];
    $pickup_date = date("Y-m-d", strtotime($_POST["pickup"]));
    $return_date = date("Y-m-d", strtotime($_POST["return"]));
    $license_number = $_POST["licenseNo"];
    $aadhaar_number = $_POST["aadhaarNo"];
    $rental_period = $_POST["rentalPeriod"];
    $total_cost = preg_replace('/[^0-9.]/', '', $_POST["totalCost"]);

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO car_bookings (name, mobile, email, car, address, pickup_date, return_date, license_number, aadhaar_number, rental_period, total_cost)
            VALUES ('$name', '$mobile', '$email', '$car', '$address', '$pickup_date', '$return_date', '$license_number', '$aadhaar_number', $rental_period, $total_cost)";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, proceed to generate receipt
        generateReceipt();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to generate receipt HTML
function generateReceipt() {
    // Include receipt HTML
    include_once("another.php");
}

// Close connection
$conn->close();
?>



<?php
session_start();

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['car'] = $_POST['car'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['pickup'] = $_POST['pickup'];
    $_SESSION['return'] = $_POST['return'];
    $_SESSION['licenseNo'] = $_POST['licenseNo'];
    $_SESSION['aadhaarNo'] = $_POST['aadhaarNo'];
    $_SESSION['rentalPeriod'] = $_POST['rentalPeriod'];
    $_SESSION['totalCost'] = $_POST['totalCost'];

    // Redirect the user to another HTML page where the receipt will be displayed
    header("Location: another.php");
    exit();
} else {
    echo "<p>No data submitted. Please go back and fill the form.</p>";
}
?>
