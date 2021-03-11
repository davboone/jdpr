<?php

// turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// print out all results similar to the search
function printSearchData($categoryTitle, $result, $cnxn){
    
    // sets up the top of the list of companies
    if(!empty($categoryTitle)){
        echo "<h1>$categoryTitle</h1>";
    }
    //echo "<h1>$categoryTitle</h1>";
    echo "<table>";
    echo "<thead><tr><th>Company Name</th><th>Company Tagline</th><th>Company Location</th></tr><tr id='emptyRow'></tr></thead>";

    // loop through the database using the given info stored in $result
    // and store only the wanted info into variables
    foreach($result as $row){
        // assigns the company's url to a variable if it has one
        $companyUrl = "";
        if(!empty($row['url'])){
            $companyUrl = " href='".$row['url']."'";
        }

        // assigns the company's icon image to a variable if it has one
        // placeholder image for now
        // $sql = "SELECT image_name 
        //         FROM company
        //         INNER JOIN uploads
        //         ON company.image_name = uploads.image_name";
        $companyImage = "";
        if(!empty($row['image_name'])){
            //this runs through the uploads table
            $sql = "SELECT image_name FROM uploads";
            $results = mysqli_query($cnxn, $sql);
            
            //this returns the image names from the uploads table
            foreach($results as $images){
                //if an image name from the uploads table matches an image name
                //from company, it will be set as the src for the company logo
                if($images['image_name'] == $row['image_name']){
                    $companyImage = $row['image_name'];;
                }
            }
        }
        else{
        $companyImage = "images/coneybeare-icon-only.png";
        }

        // assigns the company's name to a variable
        $companyName = $row['name'];

        // assigns the company's about section (or tagline) to a variable if it has one
        if(!empty($row['tagline'])){
            $companyTagline = $row['tagline'];
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
        //assign public email and public phone
        $publicEmail = $row['Public_email'];
        $publicPhone = $row['Public_phone'];
        // print out the company info
        echo "<tr><td><a $companyUrl><img src='$companyImage' alt='PLACEHOLDER IMAGE'> $companyName</a></td><td>$companyTagline</td><td>$companyLocation</td></tr>
            <tr><td class='contact'>Contact at:</td><td class='contact'>$publicEmail</td><td class='contact'>$publicPhone</td></tr>
            <tr id='emptyRow'></tr>";
    }
    echo "</table>";
}

// print out all companies within the selected category
function printCategoryData($category, $cnxn){
    // define the query
    $sql = "SELECT url, name, tagline, city, state, country, Public_email, Public_phone, image_name FROM company 
                    WHERE category LIKE '$category%'";

    // send query to database and store the result into a variable
    $result = mysqli_query($cnxn, $sql);

    // calls another function to print the desired results
    printSearchData($category, $result, $cnxn);
}