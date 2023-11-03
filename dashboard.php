<?php
session_start();
// include database connection
include('includes/dbConnect.php');
// assign success variable
$success='';
// pass the session variable`
 $id = $_SESSION['id'];
    $userSql="SELECT * FROM users WHERE id='$id' ";
    // test your query
    $userQuery=mysqli_query($conn, $userSql);
    if(mysqli_num_rows($userQuery)>0){
        $userDetails=mysqli_fetch_assoc($userQuery);
        print_r($userDetails);
    }
    // chehck if form button is clicked
    if(isset($_POST['donate'])){
        // collect  form values
        echo $amount=filter_var($_POST['amount'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // insert into the donate table
        $inser_sql="INSERT INTO donate (userId,amount) VALUES($id,$amount)";
        // $test our query
        $insert_query=mysqli_query($conn,$inser_sql);

        if($insert_query){
            $success="Donated Successfully";
        }

    }

include('includes/navbar.php')
?>

<div class="card">
    <div class="card-body">
        <div class="balance float-start">
            <div class="bg-dark">
                <!-- display user balnace from the databse -->
                <span class="fs-3">Balance</span><br>
                <p class="fs-3 fw-bolder">$ <?php echo $userDetails['balance'] ?></p>
            </div>
        </div>
        <div class="float-end">
            <!-- display user name from databse -->
            <h3><?= $userDetails['firstname']?> </h3>
            <!-- display user email from databse -->
            <p> <?= $userDetails['email'] ?></p>
        </div>

    </div>

    <div class="card">
        <div class="card-body d-flex justify-content-center mt-5">
            <!-- <button class="btn btn-light px-2 py-3 me-3">Top Up</button>
            <button class="btn btn-light px-2 py-3 ms-3">Donations</button> -->
            <a class="btn btn-primary me-4" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Top up
            </a>
            <button class="btn btn-primary ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Donate
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Help some kids</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                   <form class="form" action="dashboard.php" method="post">
                    <div class="form-input mb-4">
                        <label for="">Amount</label>
                        <input type="number" class="form-control" name="amount">
                    </div>
                    <input type="submit" name="donate" value="Top up"class="btn btn-success mt-4">
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- show toast mesage only when $success mesaage is not empty or not null -->
<?php if($success !=""): ?>
<!-- toast message -->
<div class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">

    <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
      <span aria-hidden="true"></span>
    </button>
  </div>
  <div class="toast-body">
    <div class="text-white">
          <?= $success?>
    </div>
  
  </div>
</div>
<?php endif?>