<?php

// turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// print out all results similar to the search
function printSearchData($categoryTitle, $result){
    // sets up the top of the list of companies
    if(!empty($categoryTitle)){
        echo "<h1>$categoryTitle</h1>";
    }
    //echo "<h1>$categoryTitle</h1>";
    echo "<table>";
    echo "<thead><tr><th>Company Name</th><th>Company Tagline</th><th>Company Location</th></tr></thead>";

    // loop through the database using the given info stored in $result
    // and store only the wanted info into variables
    foreach($result as $row){
        // assigns the company's url to a variable if it has one
        $companyUrl = "";
        if(!empty($row['url'])){
            $companyUrl = $row['url'];
        }

        // assigns the company's icon image to a variable if it has one
        // placeholder image for now
        $companyImage = "<img src='images/coneybeare-icon-only.png' alt='PLACEHOLDER IMAGE'>";

        // assigns the company's name to a variable
        $companyName = $row['name'];

        // assigns the company's about section (or tagline) to a variable if it has one
        if(!empty($row['about'])){
            $companyTagline = $row['about'];
        }

        // assigns the company's location to variables based on what's supplied
        if(!empty($row['city'])){
            $companyLocation = $row['city'];
        }
        // checks if there needs to be a comma after city but before state
        if(!empty($row['state']) && empty($row['city'])){
            $companyLocation = $row['state'];
        }
        elseif(!empty($row['state'])){
            $companyLocation .= ", " . $row['state'];
        }
        // checks if there needs to be a comma after city and state but before country
        if(!empty($row['country']) && empty($row['state']) && empty($row['city'])){
            $companyLocation = $row['country'];
        }
        elseif(!empty($row['country'])){
            $companyLocation .= ", " . $row['country'];
        }

        // print out the company info
        echo "<tr><td><a href='$companyUrl'>$companyImage $companyName</a></td><td>$companyTagline</td><td>$companyLocation</td></tr>";
    }
    echo "</table>";
}

// print out all companies within the selected category
function printCategoryData($category, $cnxn){
    // define the query
    $sql = "SELECT url, name, about, city, state, country FROM company 
                    WHERE category LIKE '$category%'";

    // send query to database and store the result into a variable
    $result = mysqli_query($cnxn, $sql);

    // calls another function to print the desired results
    printSearchData($category, $result);
}