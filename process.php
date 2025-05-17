<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedFeeType = $_POST['feeType'];
    
    // Redirect to the selected fee type page
    if ($selectedFeeType === "JPCS") {
        header("Location: jpcs.php");
        exit();
    } elseif ($selectedFeeType === "TUITION") {
        header("Location: TUITION.php");
        exit();
    }
    // Add additional conditions for other fee types as needed
}
?>
