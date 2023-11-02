<?php
// start a session 
session_start();
// import databse connect
include('includes/dbConnect.php');
// define error variable to prevent showing an undefined variable message on the browser
$error = '';
$success='';
// if the login button is clicked
if (isset($_POST['login'])) {
    // take form values and validate
    $email = filter_var($_POST['email']);
    $password = filter_var($_POST['password']);
    if (!$password || !$email) {
        $error = "provide login credentials";
    } else {
        // login user, before we login in user we need to compare the user values to the ones existing in the database
        $compare_sql = "SELECT * from users WHERE email='$email' ";
        // test our sql on our databse
        $compare_query = mysqli_query($conn, $compare_sql);

        // echo mysqli_num_rows($compare_query);

        if (mysqli_num_rows($compare_query) > 0) {
            // print_r($compare_query);
            // mysqli fetch assoc The fetch_assoc() 
            // / mysqli_fetch_assoc() function fetches a result row as an \
            // associative array.

            // Note: Fieldnames returned from this function are case-sensitive.


            $userDetails = mysqli_fetch_assoc($compare_query);
            //    get the password stored in the databse
             $hashedPassword = $userDetails['password'];

            

            // due to the fact we hashed our password while  registering , we cant't just compare the users plain password to the hashed one in the datbase
            // we have tp get the hashed passord, stored in the database
            $passwordVerify = password_verify($password, $hashedPassword);

            if ($passwordVerify) {
                // login in the user
                
                //  store the user id in a session
            $_SESSION['id']=$userDetails['id'];
               $success="user logged in";
                // move to the dashboard
                 header('location: dashboard.php');
            }
            else{
                $error="inavlid credentials 2";
                
             
            }
        }
        else{
            // user input a wrong email
            $error="invalid credentials 1";
        }
    }
}
// include navbar
include('includes/navbar.php');

?>




<section class="container d-flex justify-content-center align-items-center">
    <!-- teh form action specifies where the form is submiting to -->
    <form action="login.php" method="post" class="w-75" enctype="multipart/form-data">

        <?php if ($success != '') : ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Well done! <?= $success ?> </strong>
            </div>
        <?php endif ?>

        <?php if ($error != '') : ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <!-- display error  -->
                <strong>Well done! <?= $error ?> </strong>
            </div>
        <?php endif ?>



        <div class="form-input">
            <label class="form-label"> Email</label>
            <input class="form-control" type="email" name="email"></input>
        </div>

        <div class="form-input">
            <label class="form-label"> Password</label>
            <input class="form-control" type="password" name="password"></input>
        </div>
        <input type="submit" name="login" value="Login" class="btn btn-md btn-primary mt-4">
    </form>
</section>