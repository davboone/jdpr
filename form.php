
<!-- Header and Nav Bar -->

<?php
ini_set('display_errors');
error_reporting(E_ALL);
$style = "formstyle";
$currentPage = "signup";
include("includes/head.php");
?>

<!--
    Fieldset for Business information

-->

<main class="lead">
    <div class="alert alert-success text-center" role="alert">
        <p class="disla alert">  Please complete the form below to be included in the Sustainability Catalog.</p>
    </div>
    <form class="formbody container" name="form" action="confirm.php" method="post" id="theform">

        <fieldset id="binfo" name="form1" class="form-group  p-2 rounded-right 5lg container binfo">

            <legend>Business Information</legend>
            <div class="form-group">
                <label for="bname">Company Name</label>
                <input type="text" class="form-control" id="bname" placeholder="ABC Company"
                       maxlength="50" name="bname">
                <span id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" placeholder="www.abc.com"
                       maxlength="50" name="url">
                <span id="websiteError"></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="60"
                       placeholder="joeshmoe@yahoo.com">
                <span id="emailError"></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" minlength="10" maxlength="14"
                       placeholder="XXX-XXX-XXXX">
                <span id="error"></span>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="location"
                       maxlength="20" placeholder="City">
                <span id="cityError"></span>
            </div>
            <div class="form-group">
                <label id="stateLabel" for="state">State</label>
                <input type="text" class="form-control" id="state" name="state"
                       placeholder="State">
                <span id="stateError"></span>
            </div>
            <div class="form-group">
                <label id="countryLabel" for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country"
                       placeholder="Country">
                <span id="countryError"></span>
            </div>
            <div class="form-group">
                <label for="size">Geographical Service Area</label>
                <input type="text" class="form-control" id="size" placeholder="local/ regional/ state/ national/ or global"
                       maxlength="10" name="geoSize"><br>
                <span id="geoError"></span>
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
            <span id="other"><label for="field">Other Category</label><input type="text" class="form-control" id="field" name="Other" ></span>

            <label for="aboutOrg">About the Organization</label>
            <textarea id="aboutOrg" class="form-control" rows="13" name="aboutOrg"
                      maxlength="1000"
                      placeholder="Please tell us more about your Organization"></textarea>
            <span id="textError"></span><br>
            <!--    Tagline Box-->
            <span id="tag"><label for="field">Enter the <span class="green"> tagline</span> you wish to see in the <span class="green">sustainability catalog</span>.</label>
            <input type="text" class="form-control" id="taglines" name="tagline" maxlength="250"></span>

            <!--      Upload logo box-->
            <label>Upload a logo image</label>
            <div  class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>

        </fieldset>


        <fieldset  class="form-group p-2 rounded-right 5lg container abt" id="personalInfo">
            <legend>Contact Form</legend>
            <div class="form-group">

            <span id="notice" class="alert alert-warning" role="alert">
                     We will be contacting you if there are any questions about the information in the form.
            </span><br><br>
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" maxlength="30"
                       placeholder="John">
                <span id="fnameError"></span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname"  maxlength="30"
                       placeholder="Doe">
                <span id="lnameError"></span>
            </div>
            <div class="form-group">
                <label for="personEmail">Email</label>
                <input type="email" class="form-control" id="personEmail" name="personEmail" maxlength="60"
                       placeholder="joeshmoe@yahoo.com">
                <span id="personEmailError"></span>
            </div>

        </fieldset>

        <!-- button btn btn-outline-secondary py-2-->
        <button type="submit" id="sub">Submit</button>
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
