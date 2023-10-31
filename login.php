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
            <label class="form-label"> Email</label>
            <input class="form-control" type="email" name="email"></input>
        </div>

        <div class="form-input">
            <label class="form-label"> Password</label>
            <input class="form-control" type="password" name="password"></input>
        </div>
    <input type="submit"  name="login" value="Login" class="btn btn-md btn-primary mt-4">
    </form>
</section>