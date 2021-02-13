<!--
index.html
Team JDPR (Jake Gerard, David Boone, Phillip Ball, Raju Shrestha)
01/25/2021
This is the landing page for Coneybeare Cleantech
-->
    <?php
        $style = ("style");
        $currentPage = ("home");
        include("includes/head.php")
    ?>
    <div class=container>
        <div class="jumbotron">
            <h1 class="display-4">Welcome!</h1>
            <div style="text-align: center;">
            <a class="btn btn-outline-success my-2 my-sm-0 mx-auto mx-sm-0" href="form.php" role="button">Sign up</a>
            <p>If you would like to sign up for the catalog click the button above.</p>
            </div>
            <hr class="my-4">
            <!--Start-->
            <div class="d-flex justify-content-center flex-row" id="content">
                <!--Energy-->
                <a href="categories.php" id="1">
                    <img src="images/energy.png" alt="Energy">
                </a>
                <!--Water-->
                <a href="categories.php" id="2">
                    <img src="images/water.png" alt="Water">
                </a>
                <!--Transportation-->
                <a href="categories.php" id="3">
                    <img src="images/transportation.png" alt="Transportation">
                </a>
                <!--Agriculture-->
                <a href="categories.php" id="4">
                    <img src="images/agriculture.png" alt="Agriculture">
                </a>
                <!--Consumer Goods-->
                <div style="width: 50px;">
                    <a href="categories.php" id="5">
                        <img src="images/consumerGoods.jpg" alt="Consumer Goods">
                    </a>
                </div>
                </div>
                <p>Please select one of the categories above.</p>
            </div>
        </div>
    <?php
        include("includes/footer.php")
    ?>
    <script crossorigin="anonymous"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>