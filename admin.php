<?php
//starting session
session_start();
//connect to database
require('/home3/jdprgree/connect.php');
$cnxn = connect();

//check to see if the user is not logged in
if (empty($_SESSION['theUserLogin'])) {
//Redirect user to login page
    if(!empty($_GET)){
        $companyName = $_GET['name'];
        $_SESSION['companyName'] = $companyName;
    }
    header('location: login.php');
}


$style = ("adminstyles");
include("includes/head.php");

?>

<!-- Container -->
<div class="container jumbotron row mx-auto d-flex justify-content-center text-center">

    <!-- Jumbotron for Style -->
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 boss row">

        <!-- Company data for Approval/Rejection -->
        <div class="col-12 col-sm-4 bg-secondary container-fluid mb-2 pt-3 px-3 pt-md-5 px-md-5 text-left text-white overflow-hidden box ">
                    <?php
                    if(!empty($_GET)){
                        $getName = $_GET['name'];
                    }
                    else {
                        $getName = $_SESSION['companyName'];
                    }
                    $sql = "SELECT * FROM `pending` WHERE name = '$getName' ORDER BY id DESC";
                    $row = mysqli_query($cnxn,$sql);
                    $results = mysqli_fetch_array($row);

                    echo "<h4>Company Info</h4>";

                    ?>
                <ul>
                    <?php
                    $businessName = $results['name'];
                    $city = $results['city'];
                    $state = $results['state'];
                    $country = $results['country'];
                    $geoSize = $results['Geo_Service_Area'];
                    $keyWords = $results['keywords'];
                    echo "<li>Company Name: " . $businessName . "</li>";
                    echo "<li>City: " . $city . "</li>";
                    echo "<li>State: " . $state . "</li>";
                    echo "<li>Country: " . $country . "</li>";
                    echo "<li>Geographical Service Area: " . $geoSize ."</li>";
                    echo "<li>Keywords: " . $keyWords . "</li>";
                    ?>
                </ul>
            </div>

            <div id= 'icon' class="col-12 col-sm-3 border-right-0 border-left-0 bg-light container-fluid mx-2 mb-2 pt-3 px-3 pt-md-5 px-md-5 text-center text-black overflow-auto box">
                <?php
                    echo "<h4>Company Icon</h4>";

                    $target_file = $results['image_name'];
                    if(!empty($target_file)){
                    //phillip's code for image
                    //<label>Company Logo: <input type='text' class='form-control' name='image' value='' readonly></label>

                        echo "<img class='mx-auto' src='$target_file' alt='company_logo'  height='200' width='200'/></label>";
                    }
                    else{
                        echo "<img class='mx-auto' src='images/coneybeare-icon-only.png' alt='Default Image' >";
                    }
                ?>
            </div>

            <div class="col-12 col-sm-4 bg-secondary container-fluid mb-2 pt-3 px-3 pt-md-5 px-md-5 text-left text-white overflow-auto box">

                <?php
                echo "<h4>About Organization</h4>";
                ?>
                <ul>
                    <?php
                    $category = $results['category'];
                    $tagline = $results['tagline'];
                    if($category == "Other"){
                        echo "<li>Other Category: ". $category ."</li>";
                    }else
                        echo "<li>Category: " . $category . "</li>";
                    echo "<li>Company Tagline: " . $tagline . "</li>";

                    ?>
                </ul>
            </div>

            <div class="col-12 col-sm-4 border-top-0 bg-light pt-3 container-fluid px-3 pt-md-5 px-md-5 text-left text-black overflow-hidden box">
                <?php
                    echo "<h4>Company Contact</h4>";
                ?>
                <ul>
                    <?php
                        $email = $results['Public_email'];
                        $phone = $results['Public_phone'];
                        echo "<li>Company Email: " . $email . "</li>";
                        echo "<li>Company Phone: " . $phone . "</li>";
                    ?>
                </ul>
            </div>

            <div class="col-12 col-sm-4 border-top-0 bg-light pt-3 container-fluid px-3 pt-md-5 px-md-5 text-left text-black overflow-hidden box">
                <?php
                echo "<h4>Personal Contact</h4>";
                ?>
                <ul>
                    <?php
                    $contactName = $results['PointOfContact_Name'];
                    $pEmail = $results['PointOfContact_Email'];
                    $pPhone = $results['PointOfContact_PhoneNum'];
                    echo "<li>Contact name: $contactName</li>";
                    echo "<li>Email: " . $pEmail . "</li>";
                    echo "<li>Phone: " . $pPhone . "</li>";
             ?>
                </ul>
            </div>

        <!-- Buttons and pop-up explanation -->
        <div class="col-12 row align-self-center d-flex justify-content-center w-75 mx-auto">

            <!-- Approve button -->
            <form action="adminconfirmation.php" method="post" class="col-6">
                <input type="text" class="d-none" name="submissionId" value=<?php echo $results['id'] ?>>
                <button type="submit" class="btn btn-outline-success col-8 mb-1" id="approve" name="approve" value="approve">Approve</button>
            </form>

            <!-- Deny button -->
            <form action="adminconfirmation.php" method="post" class="col-6">
                <input type="text" class="d-none" name="submissionId" value=<?php echo $results['id'] ?>>
                <button type="submit" class="btn btn-outline-danger col-8" id="deny" name="deny" value="deny">Reject</button>
            </form>
        </div> <!-- Buttons and pop-up explanation END -->
    </div> <!-- Jumbotron for Style END -->
</div> <!-- Container END -->

<!-- The Footer -->
<?php
include("includes/footer.php");
?>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>