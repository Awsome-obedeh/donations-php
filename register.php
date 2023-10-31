<?php
require('includes/navbar.php');
// check if the submit button is clicked
// chehck  for the request method
$error = "";
if(isset($_POST['register'])) {
    // store and validate form input values
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // validate 

    if (empty($firstname)) {
        $error = "fill in firstname";
        
    }
    if (empty($lastname)) {
        $error = "fill in lastname";
        
    }
    if (empty($phone)) {
        $error = "fill in phone";
        
    }
    if (empty($email)) {
        $error = "fill in email";
        
    }
    if (empty($password)) {
        $error = "fill in password";
        
    }
}
// we use include_once to include our nabvbar from the includes file

?>

<div class="container card card-body mt-5">
    <!-- show email message when there is an error -->
    <!-- <?php
    if ($error !== '') {
        "<p class='alert alert-danger'>" + $error + "</p>";
    } ?> -->



    <?php if ($error != "") : ?>
        <p class="alert alert-danger text-white"> <?= $error ?> </p>

    <?php endif ?>
    <!-- set your form method and action -->
    <form method="POST" action="" class="form" class="container-fluid w-75 mx-auto" >

        <div class="form-input">
            <label class="form-label"> Firstname</label>
            <input class="form-control" type="text" name="firstname"></input>
        </div>
        <!-- rememeber to add names to your inputs  -->
        <div class="form-input">
            <label class="form-label"> lastname</label>
            <input class="form-control" type="text" name="lastname"> </input>
        </div>

        <div class="form-input">
            <label class="form-label"> Phone</label>
            <input class="form-control" type="text" name="phone"></input>
        </div>

        <div class="form-input">
            <label class="form-label"> Email</label>
            <input class="form-control" type="email" name="email"></input>
        </div>

        <div class="form-input">
            <label class="form-label"> Password</label>
            <input class="form-control" type="password" name="password"></input>
        </div>
        <input class="btn btn-outline-primary d-block mx-auto mt-3" type="submit" name="register"></input>
    </form>
</div>