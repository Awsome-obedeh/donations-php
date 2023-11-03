<?php session_start();
include('includes/dbConnect.php');

// check if top up is clicked
if ($_POST['donate']) {
    // get form values
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    // validate form values
    if (!$email || !$amount) {
        $_SESSION['error'] = "Enter input details";
        // after getting the response, send the user to the dashboard page
        header("location:dashboard.php");
    }
    else{
        
    }
}
