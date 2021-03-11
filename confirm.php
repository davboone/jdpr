<?php

error_reporting(E_ALL);
include("includes/head.php");

require ('/home3/jdprgree/connect.php');
$cnxn = connect();

//check connection
if($cnxn -> connect_error){
    die("Connection failed : " .$cnxn->connect_error);
}
?>
<link rel="stylesheet" href="styles/confirmstyle.css">
<main class="container-fluid">


    <div class="jumbotron text-center lead">
        <?php
//        var_dump($_POST);
        // grab information sent from the form

        // Business info
        $businessName = $_POST["bname"];
        $url = $_POST['url'];
        $tagline = $_POST['tagline'];
        $category = $_POST['category'];
        if(!empty($_POST['Other'])) {
            $category = $_POST['Other'];
        }
        $keyWords = $_POST['keyWord'];
        if(!empty($_FILES['image'])) {
            $image = $_FILES['image'];
        }
        $target_file = $_POST['target_file'];

        // Business contact info
        $email = $_POST["email"];
        $phone = $_POST['phone'];
        $city = $_POST['location'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $address = $_POST['addOne'];
        $zipcode = $_POST['zip'];
        $geoSize = $_POST['geoSize'];

        // Private contact info
        $fName = $_POST['fname'];
        $lName = $_POST['lname'];
        $pPhone = $_POST['personPhone'];
        $pEmail = $_POST['personEmail'];


        echo "<h1 class='lead display-4'>Thank you " . $fName . "!</h1>";
        ?>
        <p class="lead display-5 font-weight-normal">Thank you for providing your information. It has been sent to the
            Coneybeare Sustainability
            team for review. We will be contacting you soon!</p>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 boss row">
            <div class="col-4 bg-secondary container-fluid pt-3 px-3 pt-md-5 px-md-5 text-left text-white overflow-hidden box ">



                    <?php
                    echo "<h4>Business Info</h4>";
                    ?>
                <ul>
                    <?php

                    echo "<li>Business Name: " . $businessName . "</li>";
                    echo "<li>City: " . $city . "</li>";
                    echo "<li>State: " . $state . "</li>";
                    echo "<li>Country: " . $country . "</li>";
                    echo "<li>Geographical Service Area: " . $geoSize ."</li>";
                    echo "<li> Keywords: " . $keyWords . "</li>";
                    ?>
                </ul>
            </div>

            <div class="col-4 border-right-0 border-left-0 bg-light container-fluid pt-3 px-3 pt-md-5 px-md-5 text-left text-black overflow-auto box">
                <?php
                    echo "<h4>Company Icon</h4>";


                    if(!empty($_POST['target_file'])){
                    //phillip's code for image
                    //<label>Company Logo: <input type='text' class='form-control' name='image' value='' readonly></label>

                        echo "<img class='mx-auto' src='$target_file' alt='company_logo'  height='200' width='200'/></label>";
                    }
                    else{
                        echo "<img class='mx-auto' src='images/coneybeare-icon-only.png' alt='Default Image' >";
                    }
                ?>
            </div>

            <div class="col-4 bg-secondary container-fluid pt-3 px-3 pt-md-5 px-md-5 text-left text-white overflow-auto box">

                <?php
                echo "<h4>About Organization</h4>";
                ?>
                <ul>
                    <?php

                    if($category == "Other"){
                        echo "<li>Other Category: ". $category ."</li>";
                    }else
                        echo "<li>Category: " . $category . "</li>";
                    echo "<li>Company Tagline: " . $tagline . "</li>";

                    ?>
                </ul>
            </div>

            <div class="col-4 border-top-0 bg-light pt-3 container-fluid px-3 pt-md-5 px-md-5 text-left text-black overflow-hidden box">
                <?php
                    echo "<h4>Company Contact</h4>";
                ?>
                <ul>
                    <?php
                        echo "<li>Company Email: " . $email . "</li>";
                        echo "<li>Company Phone: " . $phone . "</li>";
                    ?>
                </ul>
            </div>

            <div class="col-4 border-top-0 bg-light pt-3 container-fluid px-3 pt-md-5 px-md-5 text-left text-black overflow-hidden box">
                <?php
                echo "<h4>Personal Contact</h4>";
                ?>
                <ul>
                    <?php
                    echo "<li>First name: $fName</li>";
                    echo "<li>Last name: $lName</li>";
                    echo "<li>Email: " . $pEmail . "</li>";
                    echo "<li>Phone: " . $pPhone . "</li>";
             ?>
                </ul>
            </div>
        </div>
        <?php

        $to="rshrestha9@mail.greenriver.edu";
        $subject="Request to be added to Coneybeare Sustainability Catalog";




        $message = "Business Information\r\n
            -Company Name: $businessName\r\n
            -Company Website: $url\r\n
            -Company Email: $email\r\n
            -Company Number: $phone\r\n
            -Company City: $city\r\n
            -Company State: $state\r\n
            -Company State: $country\r\n
            -Company Geographical Service Area: $geoSize\r\n
            -Company keywords: $keyWords\r\n";

        $message.="About Organization\r\n
            -Company Category: $category\r\n
            -Company Tagline: $tagline\r\n";

        $message.="Personal Contact\r\n
            -Contacts First Name: $fName\r\n
            -Contacts Last Name: $lName\r\n
            -Contacts Email: $email\r\n \r\n";

        $message.="Login to approve or reject the company at: https://jdpr.greenriverdev.com/login.php";


        $sql = "INSERT INTO company (name, category, tagline, url, city, state, country, Geo_Service_Area, Public_email, Public_phone, PointOfContact_Name, keywords, PointOfContact_Email, PointOfContact_PhoneNum) VALUES ('$businessName', '$category', '$tagline', '$url', '$city', '$state', '$country', '$geoSize', '$email', '$phone', '$fName $lName', '$keyWords', '$pEmail', '$pPhone')";
        echo $sql;
        $dbc = mysqli_query($cnxn, $sql);

        if(empty($dbc))
        {
            echo "the insert is empty";
        }
        if($dbc)
        {
            echo "the query was sent";
        }

        $success=mail($to, $subject, $message);
        if($success){
            echo "<h3> An email has been sent to Coneybeare for review.</h3>";

        }
        else{
            echo"Something went wrong sending an email. Please try again.";
        }
        ?>

    

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
