<?php
   
   include('includes/dbConnect.php');
    include('includes/navbar.php');
    // include('includes/DB_connect.php');
    $sucess='';
    $error='';
    // hashing password
    $password=1234567;
    $salt=['cost'=>12];
    // $hashPass=password_hash($password, pass, $salt);
    // echo $hashPass;
    if(isset($_POST['register'])){
       
          // collect form variable and validate
        $firstname=filter_var($_POST['firstname']);
        $lastname=filter_var($_POST['lastname']);
        $phone=filter_var($_POST['phone']);
        $email=filter_var($_POST['email']);
        $password=filter_var($_POST['password']);

        // check if user submitted an empty field
        if(empty($firstname) || !$lastname || !$phone || !$email || !$password){
            $error='please enter input field';
        }
        else{
            // check if user mail already exists
            $email_sql= "SELECT * FROM users WHERE email='$email'";
            $email_query=mysqli_query($conn,$email_sql);
            // count the number of rows
           
            if( mysqli_num_rows($email_query) >0 ){
                $error="Email already exist";
            }
            // or check if email exists with this method

            // if($email_query){
            //     $error="Email already exist";
            // }
            
             // before we insert into our databse, we need to hash our password for security reasons
        // to hash our password, we use passwrd_hash()
        $salt=['salt'=>12];
        $hashpass=password_hash($password, PASSWORD_BCRYPT);
        // insert into our databse 
        $insert_sql="INSERT INTO users(firstname,lastname,phone,email,password) 
        VALUES('$firstname','$lastname','$phone','$email','$hashpass') ";
        // test our sql
        $insert_query=mysqli_query($conn,$insert_sql);
        if($insert_query){
            $success=" successfull";
            // direct user to login page
            // header("loctaion:login.php");
        }
        else{
            $error="not successfull". mysqli_error($conn);
        }


        }
       

       
    }
?>

<section class="container d-flex justify-content-center align-items-center">

    <form action="index.php" method="post" class="w-75" enctype="multipart/form-data"> 

        <?php if ($sucess !='') :?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Well done! <?= $sucess?> </strong> 
            </div>
        <?php endif?>

        <?php if ($error !='') :?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <!-- display error  -->
                <strong>Well done! <?= $error?> </strong> 
            </div>
        <?php endif?>

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
    <input type="submit"  name="register" value="Craete Post" class="btn btn-md btn-primary mt-4">
    </form>
</section>