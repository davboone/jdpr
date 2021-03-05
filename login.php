<!--
login.php
Team JDPR (Jake Gerard, David Boone, Phillip Ball, Raju Shrestha)
01/30/2021
This is the login page for admins at Coneybeare Cleantech
-->

    <?php
        $style = ("loginstyles");
        include("includes/head.php");
    ?>

    <!-- Login Input and Button -->
    <div class="container jumbotron text-center" id="parentJumbo">
        <h2>Welcome back Admin!</h2>
        <h6>Please enter the required information below to review newly applied forms.</h6>
        <hr class="my-3">
        <div class="jumbotron" id="childJumbo">
            <form class="d-flex row justify-content-center" action="admin.php" method="get">
                <label class="col-7 text-left">Username
                    <input type="text" class="form-control" placeholder="Username">
                </label>
                <label class="col-7 text-left">Password
                    <input type="password" class="form-control" placeholder="Password">
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