<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("includes/head.php");

//connect to database
require('/home3/jdprgree/connect.php');
$cnxn = connect();

// grab the specific submission
$submissionId = $_POST['submissionId'];

// store submission from pending DB
$sql = "SELECT * FROM pending WHERE id = '$submissionId'";
$result = mysqli_query($cnxn, $sql);
foreach ($result as $row) {
    //$submissionId = $row['id'];
    $companyName = $row['name'];
    $category = $row['category'];
    $tagCloud = "";
    if (!empty($row['tag_cloud'])) {
        $tagCloud = $row['tag_cloud'];
    }
    $tagline = "";
    if (!empty($row['tagline'])) {
        $tagline = $row['tagline'];
    }
    $url = "";
    if (!empty($row['url'])) {
        $url = $row['url'];
    }
    $city = "";
    if (!empty($row['city'])) {
        $city = $row['city'];
    }
    $state = "";
    if (!empty($row['state'])) {
        $state = $row['state'];
    }
    $country = "";
    if (!empty($row['country'])) {
        $country = $row['country'];
    }
    $geoSize = $row['Geo_Service_Area'];
    $companyEmail = "";
    if (!empty($row['Public_email'])) {
        $companyEmail = $row['Public_email'];
    }
    $companyPhone = "";
    if (!empty($row['Public_phone'])) {
        $companyPhone = $row['Public_phone'];
    }
    $contactName = $row['PointOfContact_Name'];
    $keywords = "";
    if (!empty($row['keywords'])) {
        $keywords = $row['keywords'];
    }
    $contactEmail = $row['PointOfContact_Email'];
    $contactPhone = $row['PointOfContact_PhoneNum'];
    $imgName = "";
    if (!empty($row['image_name'])) {
        $imgName = $row['image_name'];
    }
}

if(!empty($_POST['approve'])){
    $message = "You have approved the company to be included in the catalog";
    $sql = "INSERT INTO company (name, category, tag_cloud, tagline, url, city, state, country, Geo_Service_Area, Public_email, Public_phone, PointOfContact_Name, keywords, PointOfContact_Email, PointOfContact_PhoneNum, image_name)
                    VALUES ('$companyName', '$category', '$tagCloud', '$tagline', '$url', '$city', '$state', '$country', '$geoSize', '$companyEmail', '$companyPhone', '$contactName', '$keywords', '$contactEmail', '$contactPhone', '$imgName')";
    $result = mysqli_query($cnxn, $sql);

    $sql = "DELETE FROM pending WHERE id = '$submissionId'";
    $result = mysqli_query($cnxn, $sql);
    //echo $sql;
}
else if(!empty($_POST['deny'])){
    $message = "You have denied the company to be included in the catalog";
    $sql = "DELETE FROM pending WHERE id = '$submissionId'";
    $result = mysqli_query($cnxn, $sql);
    //echo $sql;
}
else{
    $message = "Something went wrong with confirmation of approval/rejection";
}

echo "<h1>$message</h1>";
if(!empty($_POST['deny'])){
    echo "<h4>Please let this company know why they've been rejected.</h4>
                <textarea class='form-control' rows='5' placeholder='Reason Why'></textarea>
                <button type='button' class='btn'>Send Why</button>";
}
?>

</body>
</html>
