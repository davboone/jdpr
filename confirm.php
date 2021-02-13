<?php
ini_set('display_error', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("includes/head.php");
?>
<link rel="stylesheet" href="styles/confirmstyle.css">
<main class="container-fluid">

    <!--    <div class="text-center thankYou">-->
    <div class="jumbotron text-center lead">
        <?php
        //        var_dump($_POST);
        $businessName = $_POST["bname"];
        $url = $_POST['url'];
        $email = $_POST["email"];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $state = $_POST['state'];
        $category = $_POST['category'];
        $country = $_POST['country'];
        $geoSize=$_POST['geoSize'];
        $otherCategory = $_POST['Other'];
        $tagline=$_POST['tagline'];
        $logo=$_POST['logo'];
        $aboutOrg = $_POST['aboutOrg'];
        $fName = $_POST['fname'];
        $lName = $_POST['lname'];
        $pEmail = $_POST['personEmail'];


        echo "<h1 class='lead display-4'>Thank you " . $fName . "!</h1>";
        ?>
        <p class="lead display-5 font-weight-normal">Thank you for providing your information. It has been sent to the
            Coneybeare Sustainability
            team for review. We will be contacting you soon!</p>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 boss">
            <div class="bg-secondary container-fluid mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-left text-white overflow-hidden box ">



                    <?php
                    echo "<h4>Business Info</h4>";
                    ?>
                <ul>
                    <?php

                    echo "<li>Business Name :$businessName</li>";
                    echo "<li>Email: " . $email . "</li>";
                    echo "<li>Phone: " . $phone . "</li>";
                    echo "<li>City: " . $location . "</li>";
                    echo "<li>State: " . $state . "</li>";
                    echo "<li>Country: " . $country . "</li>";
                    echo "<li>Geographical Service Area: ". $geoSize ."</li>";
                    ?>
                </ul>
            </div>
            <div class="bg-light mr-md-3 container-fluid pt-3 px-3 pt-md-5 px-md-5 text-left text-black overflow-auto box">

                <?php
                echo "<h4>About Organization</h4>";
                ?>
                <ul>
                    <?php

                    if($category=="Other"){
                        echo "<li> Other Category: ". $otherCategory ."</li>";
                    }else
                        echo "<li>Category : " . $category . "</li>";
                    echo "<li>About: " . $aboutOrg . "</li>";
                    echo "<li> Company Tagline: ". $tagline ."</li>";
                    echo "<li> Company logo: " . $logo ."</li>";
                    ?>
                </ul>
            </div>
            <div class="bg-secondary mr-md-3 pt-3 container-fluid px-3 pt-md-5 px-md-5 text-left text-white overflow-hidden box">
                <?php
                echo "<h4>Personal Contact</h4>";
                ?>
                <ul>
                    <?php
                    echo "<li>First name :$fName</li>";
                    echo "<li>Last name :$lName</li>";
                    echo "<li>Email : " . $pEmail . "</li>";
                    ?>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <h1 class=" lead">OUR NEWSLETTER</h1>
        <p class="lead">Subscribe to our popular newsletter and get the latest news directly
            in your inbox.</p>
        <label for="subEmail"></label><input type="email" id="subEmail" name="subEmail"><br>
        <button type="submit" class="butt" id="subscribe" onclick="saveEmail()">Subscribe</button>
        <br>
        <span id="emailConfirm"></span>

    </div>

</main>
<script src="script/confirmscript.js"></script>
<?php
include("includes/footer.php");
?>
</body>
