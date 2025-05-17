<?php
if (isset($_GET["feeType"])) {
    $feeType = $_GET['feeType'];

    $dueDate = '';
    $feeAmount = '';

    switch ($feeType) {
        case "BYCIT_FEE":
            $dueDate = "2023-12-31";
            $feeAmount = "800";
            break;
        case "JPCS_FEE":
            $dueDate = "2023-12-15";
            $feeAmount = "150";
            break;
        case "TUITION_FEE":
            $dueDate = "2023-11-30";
            $feeAmount = "2000";
            break;
        case "TEAM_BUILDING":
            $dueDate = "2023-12-10";
            $feeAmount = "650";
            break;
        case "PROM_FEE":
            $dueDate = "2023-12-25";
            $feeAmount = "750";
            break;
        // Add more cases for other fee types
        default:
            $dueDate = "N/A";
            $feeAmount = "N/A";
    }

    $response = array(
        'dueDate' => $dueDate,
        'feeAmount' => $feeAmount
    );

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Handle any other processing or error cases here if needed
?>
