<!--
admin.php
Team JDPR (Jake Gerard, David Boone, Phillip Ball, Raju Shrestha)
01/31/2021
This is the admin page for admins at Coneybeare Cleantech
-->

    <?php
        $style = ("adminstyles");
        include("includes/head.php");
    ?>

    <!-- Form Data For Approval/Rejection -->
    <div class="container jumbotron row mx-auto d-flex justify-content-center text-center">
        <div class="jumbotron" id="childJumbo">
            <div class="col-12 row border border-success rounded mb-3 ml-0" id="companyInfo">
                <h3 class="col-12 text-left">Company Info.</h3>
                <hr class="col-11 my-2">
                <div class="col-12 col-md-4">
                    <p>Company name: Placeholder</p>
                    <p class="text-truncate">Website: <br>https://www.placeholder.placeholder</p>
                    <p>Location: City, State/Province, Country</p>
                    <p>Category: Placeholder</p>
                    <p>Company Serves: Local/Regional, state, national, or global</p>
                </div>
                <div class="col-12 col-md-4">
                    <p>About Company.</p>
                    <p>Placeholder for about data</p>
                </div>
                <div class="col-12 col-md-4">
                    <img src="images/coneybeare-icon-only.png" alt="PLACEHOLDER COMPANY ICON">
                    <p>Placeholder for company tagline.</p>
                </div>
            </div>
            <hr class="my-3">
            <div class="col-12 border border-success rounded w-75 mx-auto" id="contactInfo">
                <h3 class="col-12 text-left">Contact Info.</h3>
                <hr class="col-11 my-2">
                <p>First Name: Placeholder</p>
                <p>Last Name: Placeholder</p>
                <p class="text-truncate">Email: <a href="#" class="flex-wrap">placeholder@placeholder.placeholder</a></p>
            </div>
            <hr class="my-3">
            <div class="col-12 row align-self-center d-flex justify-content-center w-75 mx-auto">
                <form class="col-6">
                    <button type="button" class="btn btn-outline-success col-8 mb-1" id="approve">Approve</button>
                </form>
                <form method="post" class="col-6">
                    <button type="button" class="btn btn-outline-danger col-8 mt-1" id="deny">Reject</button>
                </form>
                <div class="mt-3" id="deniedPopUp">
                    <h4>Please let this company know why they've been rejected.</h4>
                    <textarea class='form-control' rows='5' placeholder='Reason Why'></textarea>
                </div>
            </div>
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

    <script src="script/admin.js"></script>
</body>
</html>