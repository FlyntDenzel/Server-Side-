<?php
    $login = 0;
    $invalid = 0;

    // if form is a post request then connect to database
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';

        $name = $_POST['name'];
        $password = $_POST['password'];


        $sql = "Select * from `employer` where name='$name' and password='$password'";

        $result = mysqli_query($con,$sql);
        if ($result) {
            // count n0 of rows present in database
            $num=mysqli_num_rows($result);
            if ($num>0) {
                // echo "Login succesful";
                $login = 1;
                session_start();
                $_SESSION['name']=$name;
                $_SESSION['password']=$password;
                header('location:employer.php');
            }
            else{
              //  echo 'invalid data';
              $invalid = 1;
            }
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e9f64432b6.js" crossorigin="anonymous"></script>
    <title>LogIn</title>
  </head>
  <body>

   <?php
        if ($login) {
            echo 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Comrade!</strong> You are in.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
      <?php
        if ($invalid) {
            echo 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Comrade!</strong> Thats not you.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <h1 class="text-center my-3" >Log In As Employer</h1>

    <div class="container">
            <!-- employer login -->
            <form class="my-3" action="login-employer.php" method="post" >
                <div class=" input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user text-primary" ></i></span>
                    <!-- <label for="name" class="form-label">Company Name</label> -->
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="enter company name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key text-primary" ></i></span>
                    <input type="password" class="form-control" name="password" placeholder="enter password">
                </div>

                <button type="submit" class="btn btn-primary">Log In</button>
                <p class="my-2" >Don't have an account? <a href="signup-employer.php">Click Here</a></p>
            </form>
            </div>

            </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>