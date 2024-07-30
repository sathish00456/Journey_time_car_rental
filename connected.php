<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetching form data
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $car = $_POST["car"];
    $address = $_POST["address"];
    $pickup = $_POST["pickup"];
    $return = $_POST["return"];
    $licenseNo = $_POST["licenseNo"];
    $aadhaarNo = $_POST["aadhaarNo"];
    $rentalPeriod = $_POST["rentalPeriod"];
    $totalCost = $_POST["totalCost"];

    // File upload paths
    $licensePicDir = "uploads/license_pics/";
    $aadhaarPicDir = "uploads/aadhaar_pics/";

    // License picture upload
    $licensePicPath = $licensePicDir . basename($_FILES["license-pic"]["name"]);
    move_uploaded_file($_FILES["license-pic"]["tmp_name"], $licensePicPath);

    // Aadhaar picture upload
    $aadhaarPicPath = $aadhaarPicDir . basename($_FILES["aadhaar-pic"]["name"]);
    move_uploaded_file($_FILES["aadhaar-pic"]["tmp_name"], $aadhaarPicPath);

    // Here, you can process the data further (e.g., store it in a database)
    // For demonstration, let's just print the received data

    echo "Name: " . $name . "<br>";
    echo "Mobile No: " . $mobile . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Selected Car: " . $car . "<br>";
    echo "Address: " . $address . "<br>";
    echo "Pick Up Date: " . $pickup . "<br>";
    echo "Return Date: " . $return . "<br>";
    echo "License Number: " . $licenseNo . "<br>";
    echo "Aadhaar Number: " . $aadhaarNo . "<br>";
    echo "Rental Period: " . $rentalPeriod . " days<br>";
    echo "Total Cost: " . $totalCost . "<br>";

    // You may also want to redirect the user to a thank you page after processing the form
    // header("Location: thank_you_page.php");
}
?>
