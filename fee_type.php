<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $feeType = $_GET["feeType"];

    // Redirect to the respective fee type's file
    switch ($feeType) {
        case "JPCS":
            header("Location: JPCS_fees.php");
            exit();
        case "TUITION":
            header("Location: TUITION_fees.php");
            exit();
        // Add other fee types as needed
        default:
            // If no fee type is selected or invalid, redirect to an error page or handle accordingly
            header("Location: error_page.php");
            exit();
    }
}
?>
