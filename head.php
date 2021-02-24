<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/headerstyles.css">
    <?php
        if(!empty($style)){
            echo "<link rel='stylesheet' href='styles/$style.css'>";
        }
    ?>
    <link href="images/coneybeare-icon-only.png" type="image/png" rel="icon">
    <title>ConeyBeare Sustainability Catalog</title>
</head>
<body>
    <!-- Header and Navigation -->
    <header>
        <!-- Logo, Title, Tagline -->
        <div class="row mr-0">
            <a href="index.php" class="col-2 pr-0" id="titleIconAnchor">
                <img src="images/coneybeare-icon-only.png" alt="CONEYBEARE SUSTAINABILITY CATALOG LOGO" id="coneybeareIcon">
            </a>
            <div class="col-10 d-none row align-self-center pl-0" id="coneybeareLogoBig">
                <h1 class="col-12">Coneybeare Sustainability Catalog</h1>
                <h4 class="col-12" id="tagline">Accelerating the transition to a sustainable economy</h4>
            </div>
            <h2 class="col-9 d-none align-self-center pl-0" id="coneybeareLogo">Coneybeare<br>Sustainability Catalog</h2>
        </div>

        <!-- Nav bar -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center">
                    <?php
                    // an array of "pages"
                    $pages = array($home, $about, $signup);
                    // makes each "page" an empty String
                    foreach($pages as $notCurrent){
                        $notCurrent = "";
                    }
                    // changes 1 page from an empty String to "active"
                    // to make the current page have the active class
                    switch($currentPage){
                        case "home":
                            $home = "active";
                            break;
                        case "about":
                            $about = "active";
                            break;
                        case "signup":
                            $signup = "active";
                            break;
                    }
                    echo"<a class='nav-link $home' href='index.php'>Home</a>";
                    echo"<a class='nav-link $about' href='about.php'>About Us</a>";
                    echo"<a class='nav-link $signup' href='form.php'>Sign Up</a>";
                    ?>
                </div>
            </div>
            <form class="form-inline mx-auto justify-content-center" id="headerSearchForm" action="../categories.php" method="post">
                <input class="form-control mr-1 ml-lg-auto" type="search" placeholder="Search Catalog" id="headerSearchBar" name="headerSearchBar">
                <button class="btn btn-outline-success my-2 my-sm-0 mx-auto mx-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </header>