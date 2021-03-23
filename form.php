<!-- Header and Nav Bar -->

<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$style = "formstyle";
$currentPage = "signup";
include("includes/head.php");

require('/home3/jdprgree/connect.php');
$cnxn = connect();

//check connection
if($cnxn -> connect_error){
    die("Connection failed : " .$cnxn->connect_error);
}


// grab information sent from doublecheck if user hit back
// otherwise just make the form blank
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Business info
    $businessName = "value='" . htmlentities($_POST["bname"], ENT_QUOTES) . "'";
    $url = "value='" . $_POST['url'] . "'";
    $tagline = "value='" . htmlentities($_POST['tagline'], ENT_QUOTES) . "'";
    $category = $_POST['category'];
    if(!empty($_POST['Other'])) {
        $otherCategory = "value='" . $_POST['Other'] . "'";
    }
    else{
        $otherCategory = "";
    }
    $keyWords = "value='" . $_POST['keyWord'] . "'";
    $image = "";

    // Business contact info
    $email = "value='" . $_POST["email"] . "'";
    $phone = "value='" . $_POST['phone'] . "'";
    $city = "value='" . htmlentities($_POST['location'], ENT_QUOTES) . "'";
    $state = "value='" . htmlentities($_POST['state'], ENT_QUOTES) . "'";
    $country = "value='" . htmlentities($_POST['country'], ENT_QUOTES) . "'";
    $address = "value='" . htmlentities($_POST['addOne'], ENT_QUOTES) . "'";
    $zipcode = "value='" . $_POST['zip'] . "'";
    $geoSize = $_POST['geoSize'];

    // Private contact info
    $fName = "value='" . htmlentities($_POST['fname'], ENT_QUOTES) . "'";
    $lName = "value='" . htmlentities($_POST['lname'], ENT_QUOTES) . "'";
    $pPhone = "value='" . $_POST['personPhone'] . "'";
    $pEmail = "value='" . $_POST['personEmail'] . "'";
}
else{
    // Business info
    $businessName = '';
    $url = '';
    $tagline = '';
    $category = '';
    $otherCategory = '';
    $keyWords = '';
    $image = '';

    // Business contact info
    $email = '';
    $phone = '';
    $city = '';
    $state = '';
    $country = '';
    $address = '';
    $zipcode = '';
    $geoSize = '';

    // Private contact info
    $fName = '';
    $lName = '';
    $pPhone = '';
    $pEmail = '';
}
?>

<!--
    Fieldset for Business information

-->

<main class="lead">

    <form class="formbody container" name="form" action="doublecheck.php" method="POST" enctype="multipart/form-data"
          id="theform">
        <div class="alert alert-success text-center" role="alert">
            <p class="disla alert"> Please complete the form below to be included in the Sustainability Catalog.</p>
        </div>
        <fieldset id="binfo" name="form1" class="form-group  p-2 rounded-right 5lg container binfo">
            <legend>Business Information</legend>


            <div class="form-group">

                <label for="bname">Company Name </label>
                <?php
                    echo "<input type='text' class='form-control' id='bname' placeholder='ABC Company'
                           maxlength='50' name='bname' $businessName>";
                ?>
                <span id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <?php
                    echo "<input type='text' class='form-control' id='website' placeholder='http(s)://www.abc.com'
                           maxlength='50' name='url' $url>";
                ?>
                <span id="websiteError"></span>
            </div>

            <div class="form-group">
                <label for="inputAddress">Address</p></label>
                <?php
                    echo "<input type='text' class='form-control' id='inputAddress' placeholder='1234 Main St ' name='addOne' $address>";
                ?>
                <span id="address1Error"></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <?php
                        echo "<input type='text' class='form-control' id='city' name='location' placeholder='City' $city>";
                    ?>
                    <span id="cityError"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <?php
                        echo "<input type='text' class='form-control' id='state' name='state' placeholder='State' $state>";
                    ?>
                    <span id="stateError"></span>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <?php
                        echo "<input type='text' class='form-control' id='inputZip' name='zip' placeholder='00000' $zipcode>";
                    ?>
                    <span id="zipError"></span>
                </div>
            </div>

            <div class="form-group">
                <label id="countryLabel" for="country">Country</label>
                <?php
                    echo "<input type='text' class='form-control' id='country' name='country'
                       placeholder='Country' $country>";
                ?>
                <span id="countryError"></span>
            </div>

            <label for="size">Geographical Service Area</label>
            <select id="size" class="form-control" name="geoSize">
                <?php
                    // creates empty string variables for each selection
                    $defaultOp = ""; $localOp = ""; $regionalOp = "";
                    $stateOp = ""; $nationalOp = ""; $globalOp = "";

                    // set 1 variable to selected
                    switch($geoSize){
                        case "":
                            $defaultOp = "selected";
                            break;
                        case "local":
                            $localOp = "selected";
                            break;
                        case "regional":
                            $regionalOp = "selected";
                            break;
                        case "state":
                            $stateOp = "selected";
                            break;
                        case "national":
                            $nationalOp = "selected";
                            break;
                        case "global":
                            $globalOp = "selected";
                            break;
                    }

                    echo "<option value='default' $defaultOp>Please select geographical service area.</option>
                    <option value='local' $localOp>Local</option>
                    <option value='regional' $regionalOp>Regional</option>
                    <option value='state' $stateOp>State</option>
                    <option value='national' $nationalOp>National</option>
                    <option value='global' $globalOp>Global</option>";
                ?>
            </select>
            <span id="geoError"></span>
                <br>
            <div class="form-group">
                <label for="tags">Please provide keywords for the company.</label>
                <?php
                echo "<input type='text' class='form-control' id='tags' name='keyWord' maxlength='25'
                       placeholder='Ex: Renewable, Solarpowered **This field will be used to help search for your company on our site. ' $keyWords>";
                ?>
            </div>
        </fieldset>

        <!--
            Fieldset for About the organization and category
        -->

        <fieldset class="form-group p-2 rounded-right 5lg container abt" id="about">
            <legend>About Organization</legend>
            <label for="category">Category</label>
            <select id="category" class="form-control" name="category">
                <?php
                    // creates empty string variables for each selection
                    $defaultOp = ""; $housingOp = ""; $clothingOp = "";
                    $energyOp = ""; $consumerGoodsOp = ""; $manufacturingOp = "";
                    $wastewaterOP = ""; $transportationOp = ""; $lightingOp = "";
                    $agricultureOp = ""; $circularEconomyOp = ""; $educationOp = "";
                    $waterOp = ""; $ecologyOp = ""; $otherOp = "";

                    // set 1 variable to selected
                    switch($category){
                        case "":
                            $defaultOp = "selected";
                            break;
                        case "Housing":
                            $housingOp = "selected";
                            break;
                        case "Clothing":
                            $clothingOp = "selected";
                            break;
                        case "Energy":
                            $energyOp = "selected";
                            break;
                        case "Consumer Goods":
                            $consumerGoodsOp = "selected";
                            break;
                        case "Manufacturing":
                            $manufacturingOp = "selected";
                            break;
                        case "Wastewater":
                            $wastewaterOP = "selected";
                            break;
                        case "Transportation":
                            $transportationOp = "selected";
                            break;
                        case "Lighting":
                            $lightingOp = "selected";
                            break;
                        case "Agriculture":
                            $agricultureOp = "selected";
                            break;
                        case "Circular Economy":
                            $circularEconomyOp = "selected";
                            break;
                        case "Education":
                            $educationOp = "selected";
                            break;
                        case "Water":
                            $waterOp = "selected";
                            break;
                        case "Ecology":
                            $ecologyOp = "selected";
                            break;
                        case "Other":
                            $otherOp = "selected";
                            break;
                    }

                    echo "<option value='default' $defaultOp>Please select the Category</option>
                    <option value='Housing' $housingOp>Housing</option>
                    <option value='Clothing' $clothingOp>Clothing</option>
                    <option value='Energy' $energyOp>Energy</option>
                    <option value='Consumer Goods' $consumerGoodsOp>Consumer Goods</option>
                    <option value='Manufacturing' $manufacturingOp>Manufacturing</option>
                    <option value='Wastewater' $wastewaterOP>Wastewater</option>
                    <option value='Transportation' $transportationOp>Transportation</option>
                    <option value='Lighting' $lightingOp>Lighting</option>
                    <option value='Agriculture' $agricultureOp>Agriculture</option>
                    <option value='Circular Economy' $circularEconomyOp>Circular Economy</option>
                    <option value='Education' $educationOp>Education</option>
                    <option value='Water' $waterOp>Water</option>
                    <option value='Ecology' $ecologyOp>Ecology</option>
                    <option value='Other' $otherOp>Other</option>";
                ?>
            </select>
            <span id="catErr"></span><br>
            <span id="other">
                <label for="field">Other Category</label>
                <?php
                    echo "<input type='text' class='form-control' id='field' name='Other' $otherCategory>";
                ?>
            </span>
<!---->
<!--            <label for="aboutOrg">About the Organization</label>-->
<!--            <textarea id="aboutOrg" class="form-control" rows="13" name="aboutOrg"-->
<!--                      maxlength="1000"-->
<!--                      placeholder="Please tell us more about your Organization"></textarea>-->
<!--            <span id="textError"></span><br>-->
            <!--    Tagline Box-->
            <span id="tag"><label for="taglines">Enter the <span class="green"> tagline</span> you wish to see in the <span
                            class="green">sustainability catalog</span>.</label>
                <?php
                    echo "<input type='text'  class='form-control' id='taglines' name='tagline' maxlength='250' $tagline>";
                ?>
            </span>

            <!--      Upload logo box-->

            <!-- Upload image for company logo or product -->

            <div class="custom-file form-group">
                <label class="form-label" for="customFile"> Upload image for company logo or product</label>
                <?php
//                accept='image/gif, image/jpeg, image/png'
                    echo "<input type='file'
                        class='form-control' onchange='loadFile(event)' id='customFile' name='image'/> $image";
                ?>
                <span id="imageErr"></span>
            </div>



            <span><img id="output" src="" alt="" width="200"/></span>

        </fieldset>


        <!-- Business Contact -->
        <fieldset class="form-group p-2 rounded-right 5lg container bisCon" id="businessContact">
            <legend>Company Contact Information</legend>

            <!-- Alert -->
            <div class="form-group">
                <p class="alert alert-warning text-center" role="alert">
                    This section of the form is optional and if supplied will be displayed publicly.
                </p>
            </div> <!-- Alert End -->

            <!-- Company Email -->
            <div class="form-group">
                <label for="email">Company Email</label>
                <?php
                echo "<input type='email' class='form-control' id='email' name='email' maxlength='60'
                       placeholder='joeshmoe@yahoo.com'
                       $email>";
                ?>
                <span id="emailError"></span>
            </div> <!-- Company Email End -->

            <!-- Company Phone Number -->
            <div class="form-group">
                <label for="phone">Company Phone Number</label>
                <?php
                echo "<input type='tel' class='form-control' id='phone' name='phone' maxlength='14'
                       placeholder='XXX-XXX-XXXX'
                       $phone>";
                ?>
            </div> <!-- Company Phone Number End -->
        </fieldset> <!-- Business Contact End -->


        <fieldset class="form-group p-2 rounded-right 5lg container abt" id="personalInfo">
            <legend>Point of Contact</legend>
            <div class="form-group">

            <p id="" class="alert alert-warning text-center" role="alert">
              <br>We will be contacting you if there are any questions about the information in the form.<br>
                This information is required but we will <b>not</b> be displaying publicly or add to catalog.
            </p><br><br>
                <label for="fname">First Name</label>
                <?php
                    echo"<input type='text' class='form-control' id='fname' name='fname' maxlength='30'
                        placeholder='John' $fName>";
                ?>
                <span id="fnameError"></span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <?php
                    echo"<input type='text' class='form-control' id='lname' name='lname' maxlength='30'
                           placeholder='Doe' $lName>";
                ?>
                <span id="lnameError"></span>
            </div>
            <div class="form-group">
                <label for="personEmail">Email</label>
                <?php
                    echo"<input type='email' class='form-control' id='personEmail' name='personEmail' maxlength='60'
                           placeholder='joeshmoe@yahoo.com' $pEmail>";
                ?>
                <span id="personEmailError"></span>
            </div>

            <div class="form-group">
                <label for="pocPhone">Phone Number</label>
                <?php
                    echo "<input type='tel' class='form-control' id='pocPhone' name='personPhone' minlength='10' maxlength='14'
                           placeholder='XXX-XXX-XXXX' $pPhone>";
                ?>
                <span id="error"></span>
            </div>

            <!-- button btn btn-outline-secondary py-2-->
            <button type="submit" id="sub" name="upload">Submit</button>
        </fieldset>


    </form>

</main>




<!-- Footer -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="script/formValidation.js"></script>

<?php
include("includes/footer.php");
?>

