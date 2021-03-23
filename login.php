<?php
//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

    // Start the session
    session_start();

    //Initialize variables if form is submitted
    $validLogin = true;
    $un = "";

    //storing usernames
    if (!empty($_POST)) {
        //Get the form data
        $un = $_POST['username'];
        $pw = $_POST['password'];
        if(!empty($_GET)){
            $companyName = $_GET['name'];
            $_SESSION['companyName'] = $companyName;
        }
        //If the login is valid
        require('Login-creds.php');
        if ($un == $username && $pw == $password) {

            //Record the login in the session array
            $_SESSION['theUserLogin'] = $un;

            //Go to the home page
            $page = isset($_SESSION['page']) ? $_SESSION['page'] : "admin.php";
            header('location: '.$page);
        }
        else

        //Invalid login -- set flag variable
        $validLogin = false;
    }
    $style = ("loginstyles");
    include("includes/head.php");
    ?>

    <!-- Login Input and Button -->
    <div class="container jumbotron text-center" id="parentJumbo">
        <h2>Welcome back Admin!</h2>
        <h6>Please enter the required information below to review newly applied forms.</h6>
        <hr class="my-3">
        <div class="jumbotron" id="childJumbo">
            <form class="d-flex row justify-content-center" action="#" method="post">
                <label class="col-7 text-left">Username
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $un; ?>">
                </label>
                <label class="col-7 text-left">Password
                    <input type="password" class="form-control" id="password" name="password" value="">
                    <?php
                    if (!$validLogin) {
                        echo '<br><p class="err">Login is incorrect. Please provide valid login.</p>';
                    }
                    ?>
                </label>

                <div class="col-6 row align-items-center my-3">
                    <button type="submit" class="btn btn-outline-success col-8">Login</button>
                    <label class="col-4">Remember me?
                        <input type="checkbox">
                    </label>
                </div>
                <p class="col-12"><a href="#">Forgot Password?</a></p>
            </form>
        </div>
    </div>

    <!-- The Footer -->
    <?php
        include("includes/footer.php");
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>