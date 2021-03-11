<!-- The Setup -->
<?php
    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $style = "doublecheckstyles";
    include ("includes/head.php");


require ('/home3/jdprgree/connect.php');
$cnxn = connect();

    // grab information sent from the form

    // Business info
    $businessName = htmlentities($_POST["bname"], ENT_QUOTES);
    $url = $_POST['url'];
    $tagline = htmlentities($_POST['tagline'], ENT_QUOTES);
    $category = $_POST['category'];
    $otherCategory = "";
    if(!empty($_POST['Other'])) {
        $otherCategory = $_POST['Other'];
    }
    $keyWords = $_POST['keyWord'];
    if(!empty($_FILES['image'])) {
        $image = $_FILES['image'];
    }

    // Business contact info
    $email = $_POST["email"];
    $phone = $_POST['phone'];
    $city = htmlentities($_POST['location'], ENT_QUOTES);
    $state = htmlentities($_POST['state'], ENT_QUOTES);
    $country = htmlentities($_POST['country'], ENT_QUOTES);
    $address = htmlentities($_POST['addOne'], ENT_QUOTES);
    $zipcode = $_POST['zip'];
    $geoSize = $_POST['geoSize'];

    // Private contact info
    $fName = htmlentities($_POST['fname'], ENT_QUOTES);
    $lName = htmlentities($_POST['lname'], ENT_QUOTES);
    $pPhone = $_POST['personPhone'];
    $pEmail = $_POST['personEmail'];
?>

<!-- The Container -->
<div class="container">

    <!-- Explanation Alert -->
    <div class="alert alert-success text-center" role="alert">
        <h3>Please review and confirm the form information entered below!</h3>
    </div>

    <!-- Form for the post method -->
    <form action='confirm.php' method='post'>

        <div class="row">
            <!-- Company Info -->
            <fieldset class="form-group col-6 col-sm-4">
                <h4>Company Info</h4>
                <p>This information will be displayed publicly.</p>
                <?php

                //codes for upload and displaying image

                $target_dir = "uploads/";
                $target_dir.=date('M d,Y');
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
//                echo "$target_file";
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
//                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
//                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }


                // Check if file already exists
                if (file_exists($target_file)) {
//                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["image"]["size"] > 1000000) {
//                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                $validTypes=array("jpg", "png", "jpeg", "gif");
                if(!in_array($imageFileType, $validTypes)){
//                    echo "Sorry only jpg,png,gif are allowed.";
                    $uploadOk=0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
//                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                        //conect to DB
                        $sql = "INSERT INTO uploads (image_name) VALUES ('$target_file')";
                        mysqli_query($cnxn, $sql);
                    }
                }


                echo "
                    <label>Name: <input type='text' class='form-control' name='bname' value='$businessName' readonly></label>
                    <label>URL: <input type='text' class='form-control' name='url' value='$url' readonly></label>
                    <label>Tagline: <input type='text' class='form-control' name='tagline' value='$tagline' readonly></label>
                    <label>Key Search Terms: <input type='text' class='form-control' name='keyWord' value='$keyWords' readonly></label>";
                    if($category == "Other"){
                        echo "<label>Category: <input type='text' class='form-control' name='Other' value='$otherCategory' readonly></label>";
                    }
                    else{
                        echo "<label>Category: <input type='text' class='form-control' name='category' value='$category' readonly></label>";
                    }
                if(!empty($_FILES['image'])){
                    //phillip's code for image
                    //<label>Company Logo: <input type='text' class='form-control' name='image' value='' readonly></label>

                     echo "<br><label > Company Logo: <br><img src='$target_file' alt='company_logo'  height='200' width='200'/></label>";
                     // used for post
                     echo "<label class='d-none'>Hidden POST<input type='text' name='target_file' value='$target_file' readonly></label>";

                }
                else{
                    echo "<img src='images/coneybeare-icon-only.png' alt='Default Image' >";
                }
                ?>
            </fieldset> <!-- Company Info End -->

            <!-- Company Contact Info -->
            <fieldset class="form-group col-6 col-sm-4">
                <h4>Company Contact</h4>
                <p>This information will be displayed publicly.</p>
                <?php
                echo "
                    <label>Email Address: <input type='text' class='form-control' name='email' value='$email' readonly></label>
                    <label>Phone Number: <input type='text' class='form-control' name='phone' value='$phone' readonly></label>
                    <label>City: <input type='text' class='form-control' name='location' value='$city' readonly></label>
                    <label>State: <input type='text' class='form-control' name='state' value='$state' readonly></label>
                    <label>Country: <input type='text' class='form-control' name='country' value='$country' readonly></label>
                    <label>Address: <input type='text' class='form-control' name='addOne' value='$address' readonly></label>
                    <label>Zipcode: <input type='text' class='form-control' name='zip' value='$zipcode' readonly></label>
                    <label>Serviceable Range: <input type='text' class='form-control' name='geoSize' value='$geoSize' readonly></label>";
                ?>
            </fieldset> <!-- Company Contact Info End -->

            <!-- Point of Contact Info -->
            <fieldset class="form-group col-12 col-sm-4">
                <h4>Point of Contact</h4>
                <p>This information will <strong>not</strong> be displayed publicly.</p>
                <div>
                <?php
                echo "
                    <label>First Name: <input type='text' class='form-control' name='fname' value='$fName' readonly></label>
                    <label id='bottomRightInput1'>Last Name: <input type='text' class='form-control' name='lname' value='$lName' readonly></label>
                    <label>Phone Number: <input type='text' class='form-control' name='personPhone' value='$pPhone' readonly></label>
                    <label id='bottomRightInput2'>Email Address: <input type='text' class='form-control' name='personEmail' value='$pEmail' readonly></label>";
                ?>


            </fieldset> <!-- Point of Contact Info End -->
        </div>

        <button type="submit" class="btn btn-outline-success" id="confirmBtn">Confirm</button>
    </form> <!-- Form for the post method End -->

    <!-- Hidden Form for going back -->
    <form action='form.php' method='post'>
        <?php
            echo "
                <div class='d-none'>
                    <input type='text' class='form-control' name='fname' value='$fName' readonly>
                    <input type='text' class='form-control' name='lname' value='$lName' readonly>
                    <input type='text' class='form-control' name='personPhone' value='$pPhone' readonly>
                    <input type='text' class='form-control' name='personEmail' value='$pEmail' readonly>
                    <input type='text' class='form-control' name='email' value='$email' readonly>
                    <input type='text' class='form-control' name='phone' value='$phone' readonly>
                    <input type='text' class='form-control' name='location' value='$city' readonly>
                    <input type='text' class='form-control' name='state' value='$state' readonly>
                    <input type='text' class='form-control' name='country' value='$country' readonly>
                    <input type='text' class='form-control' name='addOne' value='$address' readonly>
                    <input type='text' class='form-control' name='zip' value='$zipcode' readonly>
                    <input type='text' class='form-control' name='geoSize' value='$geoSize' readonly>
                    <input type='text' class='form-control' name='bname' value='$businessName' readonly>
                    <input type='text' class='form-control' name='url' value='$url' readonly>
                    <input type='text' class='form-control' name='tagline' value='$tagline' readonly>
                    <input type='text' class='form-control' name='keyWord' value='$keyWords' readonly>
                    if(!empty($otherCategory)){
                    <input type='text' class='form-control' name='Other' value='$otherCategory' readonly>
                    }
                    else{
                    <input type='text' class='form-control' name='category' value='$category' readonly>
                        
                    }";
                    //<input type='text' class='form-control' name='image' readonly>$image</input>
                echo "</div>";


        ?>
        <button type="submit" class="btn btn-outline-danger" id="backBtn">Back</button>
    </form> <!-- Hidden Form End -->
</div> <!-- The Container End -->

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