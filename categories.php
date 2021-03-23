<?php
    $style = "categoryStyles";
    include('includes/head.php');

    //connect to database
require ('/home3/jdprgree/connect.php');
$cnxn = connect();
?>

    <!-- Categories Container -->
    <div id="main" class="container-fluid">
        <form id="categorySelect" method="post">
        <label for="category">Category</label>
        <select onchange="submitForm()" class="form-control custom-select" name="category" id="category">
            <option selected disabled value="">Select a category</option>
            <option value="Activism">Activism</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Circular Economy">Circular Economy</option>
            <option value="Clothing">Clothing</option>
            <option value="Consumer Goods">Consumer Goods</option>
            <option value="Ecology">Ecology</option>
            <option value="Education">Education</option>
            <option value="Energy">Energy</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Housing">Housing</option>
            <option value="Lighting">Lighting</option>
            <option value="Manufacturing">Manufacturing</option>
            <option value="Transportation">Transportation</option>
            <option value="Wastewater">Wastewater</option>
            <option value="Water">Water</option>
            <option value="Other">Other</option>
        </select>
        </form>
        <hr>
        <div id="parent">
            <?php
            /*
            $category = $_POST['category'];

            if($category == 'Energy')
            {
                include('includes/energyForm.html');
            }
            elseif($category == 'Transportation')
            {
                include('includes/transportationForm.html');
            }
            elseif($category == 'Housing')
            {
                include('includes/housingForm.html');
            }
            elseif($category == 'Consumer Goods')
            {
                include('includes/consumergoodsForm.html');
            }
            elseif($category == 'Agriculture')
            {
                include('includes/agricultureForm.html');
            }
            else
            {
                include('includes/featuredCompanies.html');
            }
            */

            // gives this file access to the functions file
            include("includes/functions.php");

            // connect to database


            // get what was typed into the search bar
            $searchFor = $_POST['headerSearchBar'];

            // "pre" selects the category based on which link is clicked
            // on the home page
            // start by making a query as well as an array
            $sql = "SELECT category FROM company";
            $result = mysqli_query($cnxn, $sql);
            $possibleCompanies = array();

            // then loop through all the results of the query
            // adding the categories to the array if it's not already there
            foreach($result as $row){
                if(!in_array($row['category'], $possibleCompanies)){
                    array_push($possibleCompanies, $row['category']);
                }
            }

            // store the link that was clicked into a variable
            // make an empty string variable that will be used shortly
            $homeChoice = $_GET['category'];
            $validCompanyChoice = "";

            // loop through the array that holds all the possible categories
            // compare the clicked link to each category then store
            // the match into that empty string variable from before
            foreach($possibleCompanies as $company){
                if($company = $homeChoice){
                    $validCompanyChoice = $company;
                }
            }
            // first check that no category has been selected in the dropdown
            // then make sure our clicked link matches a possible category
            // if it matches go to that category
            // otherwise get the category from the select dropdown
            if(empty($_POST['category']) && $homeChoice = $validCompanyChoice){
                $category = $validCompanyChoice;
            }
            else{
                $category = $_POST['category'];
            }

            // if no category has been chosen, show search results
            // otherwise, show all of selected category
            if($category == "")
            {
                // if nothing has been searched for, show 10 random companies
                // otherwise, show all LIKE what was searched for
                if($searchFor == "")
                {
                    // constant for the number of examples to show
                    define("NUM_OF_EXAMPLES", 10);

                    // grab total number of companies
                    // by giving the number an alias of total
                    // then stores it in $numOfCompanies
                    $sql = "SELECT COUNT(*) AS total FROM company";
                    $countResult = mysqli_query($cnxn, $sql);
                    $numOfCompanies = mysqli_fetch_assoc($countResult);
                    $numOfCompanies = $numOfCompanies['total'];

                    // makes the array that carries the current 10 examples
                    $chosenExamples = array();

                    // loops through adding a company each loop
                    for($example = 0; $example < NUM_OF_EXAMPLES; $example++){
                        // grab a random number between 1 and $numOfCompanies
                        $randomCompany = mt_rand(1, $numOfCompanies);

                        // checks if the company is already being shown or not (in $chosenExamples)
                        $alreadyChosen = in_array($randomCompany, $chosenExamples);

                        // if the company's already in $chosenExample, skip and do the loop again
                        // otherwise add the company and print it
                        if($alreadyChosen){
                            $example--;
                        }
                        else{
                            // adds the company to $chosenExamples
                            array_push($chosenExamples, $randomCompany);

                            // define the query
                            $sql = "SELECT name, tagline, city, state, country FROM company
                                WHERE id = '$randomCompany'";

                            // send query to database and store the result into a variable
                            $result = mysqli_query($cnxn, $sql);

                            // calls a function to print the desired results
                            printSearchData(null, $result, $cnxn);
                        }
                    }
                }
                else
                {
                    // define the query
                    $sql = "SELECT url, name, tagline, city, state, country, keywords, Public_email, Public_phone, image_name FROM company
                        WHERE category LIKE '%$searchFor%'
                        OR name LIKE '%$searchFor%'
                        OR tagline LIKE '%$searchFor%'
                        OR keywords LIKE '%$searchFor%'
                        ORDER BY name";

                    // send query to database and store the result into a variable
                    $result = mysqli_query($cnxn, $sql);

                    // calls a function to print the desired results
                    printSearchData("Here are your search results for $searchFor", $result, $cnxn);
                }
            }
            else
            {
                // calls a function to print all companies within the selected category
                printCategoryData($category, $cnxn);
            }
            ?>
        </div>
    </div>


    <!--Footer-->
    <?php
        include('includes/footer.php');
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
    <script src="script/formSubmission.js"></script>
    <script src="script/categoriesScript.js"></script>
</body>
</html>