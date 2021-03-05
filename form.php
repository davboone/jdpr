<!-- Header and Nav Bar -->

<?php

$style = "formstyle";
$currentPage = "signup";
include("includes/head.php");

require('/home3/jdprgree/connect.php');
$cnxn = connect();

//check connection
if($cnxn -> connect_error){
    die("Connection failed : " .$cnxn->connect_error);
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
                <input type="text" class="form-control" id="bname" placeholder="ABC Company"
                       maxlength="50" name="bname">
                <span id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" placeholder="http(s)://www.abc.com"
                       maxlength="50" name="url">
                <span id="websiteError"></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="60"
                       placeholder="joeshmoe@yahoo.com **This field is optional but if provided will be added to catalog.">
                <span id="emailError"></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" minlength="10" maxlength="14"
                       placeholder="XXX-XXX-XXXX **This field is optional but if provided will be added to catalog.">

            </div>
<!--            <div class="form-group">-->
<!--                <label for="city">City</label>-->
<!--                <input type="text" class="form-control" id="city" name="location"-->
<!--                       maxlength="20" placeholder="City">-->
<!--                <span id="cityError"></span>-->
<!--            </div>-->
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="addOne">
                <span id="address1Error"></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="location" placeholder="City">
                    <span id="cityError"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                   <input type="text" class="form-control" id="state" name="state" placeholder="State">
                    <span id="stateError"></span>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip" name="zip" placeholder="00000">
                    <span id="zipError"></span>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <label id="stateLabel" for="state">State</label>-->
<!--                <input type="text" class="form-control" id="state" name="state"-->
<!--                       placeholder="State">-->
<!--                <span id="stateError"></span>-->
<!--            </div>-->
            <div class="form-group">
                <label id="countryLabel" for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country"
                       placeholder="Country">
                <span id="countryError"></span>
            </div>

            <label for="size">Geographical Service Area</label>
            <select id="size" class="form-control" name="geoSize">

                <option value="default" selected>Please select geographical service area.</option>
                <option value="local">Local</option>
                <option value="regional">Regional</option>
                <option value="state">State</option>
                <option value="national">National</option>
                <option value="global">Global</option>
            </select>
            <span id="geoError"></span>
                <br>
            <div class="form-group">
                <label for="tags">Please provide keywords for the company.</label>
                <input type="text" class="form-control" id="tags" name="keyWord" maxlength="25"
                       placeholder="Ex: Renewable, Solarpowered **This field will be used to help search for your company on our site. ">
            </div>
        </fieldset>

        <!--
            Fieldset for About the organization and category
        -->

        <fieldset class="form-group p-2 rounded-right 5lg container abt" id="about">
            <legend>About Organization</legend>
            <label for="category">Category</label>

            <select id="category" class="form-control" name="category">
                <option value="default" selected>Please select the Category</option>
                <option value="Housing">Housing</option>
                <option value="Clothing">Clothing</option>
                <option value="Energy">Energy</option>
                <option value="Consumer Goods">Consumer Goods</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Wastewater">Wastewater</option>
                <option value="Transportation">Transportation</option>
                <option value="Lighting">Lighting</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Circular Economy">Circular Economy</option>
                <option value="Education">Education</option>
                <option value="Water">Water</option>
                <option value="Ecology">Ecology</option>
                <option value="Other">Other</option>

            </select>
            <span id="catErr"></span><br>
            <span id="other"><label for="field">Other Category</label><input type="text" class="form-control" id="field"
                                                                             name="Other"></span>
<!---->
<!--            <label for="aboutOrg">About the Organization</label>-->
<!--            <textarea id="aboutOrg" class="form-control" rows="13" name="aboutOrg"-->
<!--                      maxlength="1000"-->
<!--                      placeholder="Please tell us more about your Organization"></textarea>-->
<!--            <span id="textError"></span><br>-->
            <!--    Tagline Box-->
            <span id="tag"><label for="field">Enter the <span class="green"> tagline</span> you wish to see in the <span
                            class="green">sustainability catalog</span>.</label>
            <input type="text"  class="form-control" id="taglines" name="tagline" maxlength="250"></span>

            <!--      Upload logo box-->

            <!-- Upload image for company logo or product -->

            <div class="custom-file form-group">
                <label class="form-label" for="customFile"> Upload image for company logo or product</label>
                <input type="file" accept="image/gif, image/jpeg, image/png"
                       class="form-control" onchange="loadFile(event)" id="customFile" name="image"/>
            </div>



            <span><img id="output"  src="empty" alt=" " width="200"/></span>

        </fieldset>


        <fieldset class="form-group p-2 rounded-right 5lg container abt" id="personalInfo">
            <legend>Contact Form</legend>
            <div class="form-group">

            <p id="" class="alert alert-warning text-center" role="alert">
                     We will be contacting you if there are any questions about the information in the form.<br>
                This information is required but we will <b>not</b> be displaying publicly or add to catalog.
            </p><br><br>
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" maxlength="30"
                       placeholder="John">
                <span id="fnameError"></span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" maxlength="30"
                       placeholder="Doe">
                <span id="lnameError"></span>
            </div>
            <div class="form-group">
                <label for="personEmail">Email</label>
                <input type="email" class="form-control" id="personEmail" name="personEmail" maxlength="60"
                       placeholder="joeshmoe@yahoo.com">
                <span id="personEmailError"></span>
            </div>

            <div class="form-group">
                <label for="pocPhone">Phone Number</label>
                <input type="tel" class="form-control" id="pocPhone" name="personPhone" minlength="10" maxlength="14"
                       placeholder="XXX-XXX-XXXX">
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

