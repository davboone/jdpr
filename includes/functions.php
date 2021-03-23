<?php

// turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
function str_starts_with ( $haystack, $needle ) {
  return strpos( $haystack , $needle ) === 0;
}

// print out all results similar to the search
function printSearchData($categoryTitle, $result, $cnxn){
    
    // sets up the top of the list of companies
    if(!empty($categoryTitle)){
        echo "<h1><img src='images/coneybeare-icon-only.png' alt='CONEYBEARE SUSTAINABILITY CATALOG LOGO' class='titleIcon'>$categoryTitle<img src='images/coneybeare-icon-only.png' alt='CONEYBEARE SUSTAINABILITY CATALOG LOGO' class='titleIcon'></h1>";
    }
    //echo "<h1>$categoryTitle</h1>";
    
    
    echo "<div class='row'>";
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
        // $sql = "SELECT image_name 
        //         FROM company
        //         INNER JOIN uploads
        //         ON company.image_name = uploads.image_name";
        $companyImage = "";
        $companyLocation = "";
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
            $companyTagline = mb_convert_encoding($companyTagline,"UTF-8","Windows-1252");
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
//         echo "<tr><td colspan='3'><a $companyUrl><img src='$companyImage' alt='PLACEHOLDER IMAGE'> $companyName</a></td></tr><tr><td>$companyTagline</td></tr><tr><td>$companyLocation</td></tr>"
// //            <tr><td class='contact'>Contact at:</td><td class='contact'>$publicEmail</td><td class='contact'>$publicPhone</td></tr>
    
    echo '<div class="col-12 col-sm-3">';
    echo '<div class="height">';
    echo '<div class="card">';
    if(!empty($companyUrl)){
        if(!str_starts_with($companyUrl, 'https://')&&!str_starts_with($companyUrl, 'http://')&&!str_starts_with($companyUrl, 'www.')){
             echo    "<a href=https://www.$companyUrl target='_blank' rel='noopener noreferrer'>";
        }
        else if(str_starts_with($companyUrl, 'www.')){
            echo    "<a href=https://$companyUrl target='_blank' rel='noopener noreferrer'>";
        }
        else{
            echo    "<a href=$companyUrl target='_blank' rel='noopener noreferrer'>";
        }
    }
    echo    "<div class='card-header'><h5>$companyName</h5></div>";
    echo    "<img src='$companyImage' class='card-img-top' alt='Company Logo'>";
    if(!empty($companyUrl)){
    echo    '</a>';
    }
    echo        "<div class='card-body'>";
    echo            "<p class='card-text'>$companyTagline</p>";
    
    if(!empty($companyLocation)){
        echo            '<hr>';
        echo            "<p class='card-text contact'>$companyLocation";
    }
    
    $noSpaceName = str_replace(' ','', $companyName);
    
    if(!empty($publicEmail) && !empty($publicPhone)){
        //Button trigger modal
        echo "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#$noSpaceName'>";
        echo  '( i )';
        echo '</button>';
        // Modal
        echo "<div class='modal fade' id='$noSpaceName' tabindex='-1'>";
        echo  '<div class="modal-dialog modal-dialog-centered">';
        echo    '<div class="modal-content">';
        echo      '<div class="modal-header">';
        echo        '<h5 class="modal-title" id="exampleModalCenterTitle">Contact</h5>';
        echo        '<button type="button" class="close" data-dismiss="modal">';
        echo          '<span>&times;</span>';
        echo        '</button>';
        echo      '</div>';
        echo      '<div class="modal-body">';
                echo "Email: <strong>$publicEmail</strong><br>";
                echo "Phone: <strong>$publicPhone</strong>";
        echo      '</div>';
              
        echo    '</div>';
        echo  '</div>';
        echo '</div>'; //end of modal
    }
    else{
        echo '</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
            
    }
    echo "</div>";
}

// print out all companies within the selected category
function printCategoryData($category, $cnxn){
    // define the query
    $sql = "SELECT url, name, tagline, city, state, country, Public_email, Public_phone, image_name FROM company 
                    WHERE category LIKE '$category%'
                    ORDER BY name";

    // send query to database and store the result into a variable
    $result = mysqli_query($cnxn, $sql);

    // calls another function to print the desired results
    printSearchData($category, $result, $cnxn);
}