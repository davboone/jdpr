//Onload perform these tasks
window.onload = function () {
    let button = document.getElementById("sub");
    // tagLine();
    // contactFormInfo();
    button.onclick = validateForm;


}

let noErrors = true;

function validateForm(event) {

    event.preventDefault();

    noErrors=ValidateFileUpload();


    //Errors for city, state and country
    let city = document.getElementById("city");
    let state = document.getElementById("state");
    let country = document.getElementById('country');
    let countryError = document.getElementById("countryError");
    let cityError = document.getElementById("cityError");
    let stateError = document.getElementById("stateError");
    if (city.value.length === 0) {
        cityError.textContent = "Please enter City ";
        cityError.style.color = "red";

        if (state.value.length === 0) {
            stateError.textContent = "Please enter State";
            stateError.style.color = "red";


        }
        if (country.value.length === 0) {
            countryError.textContent = "Please enter Country";
            countryError.style.color = "red";


        }
        noErrors = false;

    } else {
        cityError.textContent = "";
        stateError.textContent = "";
        countryError.textContent = "";
        city.setAttribute("display", "none");
        state.setAttribute("display", "none");
        countryError.setAttribute("display", "none");

    }

    //error for address field empty
    // let addressOne=document.getElementById("inputAddress");
    // let addressOneError=document.getElementById("address1Error");
    // if(addressOne.value.length===0){
    //     addressOneError.textContent="Please enter company's address.";
    //     addressOneError.style.color="red";
    //     noErrors=false;
    // }
    // else{
    //     addressOneError.textContent="";
    //     noErrors=true;
    // }




    //error for not putting in a valid email address, regex checks for the standard something@something.com email convention
    // let email = document.getElementById("email");
    // let emailError = document.getElementById("emailError");
    let rule = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // if (email.value.match(rule)) {
    //     emailError.textContent = "";
    //     noErrors=true;
    // }
    //
    // else  {
    //     emailError.textContent = "Please enter valid email";
    //     emailError.style.color = 'red';
    //     noErrors=false;
    // }


    //error for not putting in url, using regex to parce and identify the string. Requires https://
    let website = document.getElementById("website");
    let websiteError = document.getElementById("websiteError");

    function isValidURL(string) {
        let res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)/g);
        return (res !== null);
    }

    if (isValidURL(website.value)) {
        websiteError.textContent = "";

    } else {
        websiteError.textContent = "Please enter valid website.";
        websiteError.style.color = 'red';
        noErrors = false;
    }
    //checks if there is any error in business name
    let companyName = document.getElementById("bname");
    let nameError = document.getElementById("nameError");
    if (companyName.value === "") {
        nameError.textContent = "Please enter Name";
        nameError.style.color = 'red';
        noErrors = false;
    } else {
        nameError.textContent = "";
    }

    //Makes user to select category
    let defCat = document.getElementById('category');
    let catErr = document.getElementById("catErr");
    if (defCat.value === "default") {
        catErr.textContent = "Please select Category";
        catErr.style.color = "red";
        noErrors = false;
    } else catErr.style.display = "none";

    //error displays when about about Org field is empty
    // let errorText = document.getElementById("textError");
    // let textareaInput = document.getElementById("aboutOrg");
    // if (textareaInput.value.length === 0) {
    //     errorText.textContent = "This field cannot be empty.";
    //     errorText.style.color = "red";
    //     noErrors=false;
    // }
    // else errorText.style.display="none";

    //Asks for Personal Name and email for contact
    let fname = document.getElementById("fname");
    let nameErr = document.getElementById("fnameError");
    if (fname.value.length === 0) {
        nameErr.textContent = "Please provide your first name.";
        nameErr.style.color = "red";
        noErrors = false;
    } else nameErr.textContent = "";
    //Asks for Personal Name and email for contact
    let lname = document.getElementById("lname");
    let lnameErr = document.getElementById("lnameError");
    if (lname.value.length === 0) {
        lnameErr.textContent = "Please provide your last name.";
        lnameErr.style.color = "red";
        noErrors = false;
    } else lnameErr.style.display = "none";

    //for Geo location
    let size = document.getElementById("size");
    let sizeErr = document.getElementById("geoError");
    if (size.value === "default") {
        sizeErr.textContent = "Please select the geographical service area that you serve.";
        sizeErr.style.color = "red";
        noErrors = false;
    } else sizeErr.style.display = "none";

    //to validae personal email
    let personEmailVal = document.getElementById("personEmail");
    let personEmailErr = document.getElementById("personEmailError");
    if (personEmailVal.value.match(rule)) {
        personEmailErr.textContent = "";
        noErrors = true;
    } else {
        personEmailErr.textContent = "Please enter valid email";
        personEmailErr.style.color = 'red';
        noErrors = false;
    }

    // error for non POC phone number
    let error = document.getElementById("error");
    let phoneNum = document.getElementById("pocPhone");
    let phoneValidation = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (phoneNum.value.match(phoneValidation)) {
        error.textContent = "";
    } else {
        // Changing content and color of content
        error.textContent = "Invalid phone number";
        error.style.color = "red";
        noErrors = false;

    }


    console.log(noErrors);


    if (noErrors) {
        let button = event.target;
        console.log(noErrors);
        return button.form.submit();
    }

}

function ValidateFileUpload() {
    let fileUpload = document.getElementById('customFile');
    let imageErr= document.getElementById("imageErr");
    imageErr.textContent="";
    let FileUploadPath = fileUpload.value;

    //To check if user upload any file
    if (FileUploadPath == '') {
        imageErr.textContent = 'Please upload your company logo.';
        imageErr.style.color="red";
        return false;

    } else {
        let Extension = FileUploadPath.substring(
            FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

        if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
            imageErr.textContent="File has passed the validation.";
            imageErr.style.color="green";
            return true;

        }

        //The file upload is NOT an image
        else {
            imageErr.textContent="Photo only allows file types of GIF, PNG, JPG, and JPEG. ";
            imageErr.style.color='red';
            return false;

        }
    }
}



//hides other category input until other is selected.
let otherOption = document.getElementById("other");
let otherCat = document.getElementById("category");
otherOption.style.display = "none";
otherBox();
otherCat.onchange = otherBox;

function otherBox() {

    if (otherCat.value === "Other") {
        otherOption.style.display = "inline";
    } else {
        otherOption.style.display = "none";
    }
}


//displays image in form
let loadFile = function (event) {
    let image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};