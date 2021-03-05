<!--
index.html
Team JDPR
01/25/2021
This is the landing page for Coneybeare Cleantech
-->
    <?php
        $style = ("style");
        $currentPage = ("home");
    include("includes/head.php")
    ?>
    <div class=container>
        <div class="jumbotron">
            <h3 style="text-align: center;">“A searchable database and on-line marketplace for innovative solutions in sustainability; Creating
                visibility and accelerating speed to market.”</h3>
            <div style="text-align: center;">
            <a class="btn btn-outline-success my-2 my-sm-0 mx-auto mx-sm-0" href="form.php" role="button">Sign up</a>
            <p>If you would like to sign up to be featured, click the button above.</p>
            </div>
            <hr class="my-4">
            <!--Start-->
            <div class="d-flex justify-content-center flex-row">
                <!--Energy-->
                <div class="jumbotron" id="child">
                    <div class="justify-content-center" id="content">
                        <div id="categories">
                            <!--Energy-->
                            <div id="E">
                                <a href="categories.php?category=Energy" >
                                    <img src="images/energy.png" alt="Energy">
                                    <div class="justify-content-center row">
                                        <p>Energy</p>
                                    </div>
                                </a>
                            </div>
                            <!--Water-->
                            <div id="W">
                                <a href="categories.php?category=Water">
                                    <img src="images/water.png" alt="Water">
                                    <div class="justify-content-center row">
                                        <p>Water</p>
                                    </div>
                                </a>
                            </div>
                            <!--Transportation-->
                            <div id="T">
                                <a href="categories.php?category=Transportation">
                                    <img src="images/transportation.png" alt="Transportation">
                                    <div class="justify-content-center row">
                                        <p>Transportation</p>
                                    </div>
                                </a>
                            </div>
                            <!--Agriculture-->
                            <div id="A">
                                <a href="categories.php?category=Agriculture">
                                    <img src="images/agriculture.png" alt="Agriculture">
                                    <div class="justify-content-center row">
                                        <p>Agriculture</p>
                                    </div>
                                </a>
                            </div>
                            <div id="H">
                                <a href="categories.php?category=Housing">
                                    <img src="images/housing.png" alt="Housing">
                                    <div class="justify-content-center row">
                                        <p>Housing</p>
                                    </div>
                                </a>
                            </div>
                            <div id="C">
                                <a href="categories.php?category=Clothing" >
                                    <img src="images/clothing.png" alt="Clothing">
                                    <div class="justify-content-center row">
                                        <p>Clothing</p>
                                    </div>
                                </a>
                            </div>
                            <div id="CG">
                                <a href="categories.php?category=ConsumerGoods">
                                    <img src="images/consumergoods.png" alt="Consumer Goods">
                                    <div class="justify-content-center row">
                                        <p>Consumer Goods</p>
                                    </div>
                                </a>
                            </div>
                            <div id="M">
                                <a href="categories.php?category=Manufacturing">
                                    <img src="images/manufacturing.png" alt="Manufacturing">
                                    <div class="justify-content-center row">
                                        <p>Manufacturing</p>
                                    </div>
                                </a>
                            </div>
                            <div id="WW">
                                <a href="categories.php?category=Wastewater">
                                    <img src="images/wastewater.png" alt="Wastewater">
                                    <div class="justify-content-center row">
                                        <p>Waste Water</p>
                                    </div>
                                </a>
                            </div>
                            <div id="L">
                                <a href="categories.php?category=Lighting">
                                    <img src="images/lighting.png" alt="Lighting">
                                    <div class="justify-content-center row">
                                        <p>Lighting</p>
                                    </div>
                                </a>
                            </div>
                            <div id="CE">
                                <a href="categories.php?category=CircularEconomy">
                                    <img src="images/circularcycling.png" alt="Circular Economy">
                                    <div class="justify-content-center row">
                                        <p>Circular Cycling</p>
                                    </div>
                                </a>
                            </div>
                            <div id="ED">
                                <a href="categories.php?category=Education">
                                    <img src="images/education.png" alt="Education">
                                    <div class="justify-content-center row">
                                        <p>Education</p>
                                    </div>
                                </a>
                            </div>
                            <div id="EC">
                                <a href="categories.php?category=Ecology">
                                    <img src="images/ecology.png" alt="Ecology">
                                    <div class="justify-content-center row">
                                        <p>Ecology</p>
                                    </div>
                                </a>
                            </div>
                            <div id="AC">
                                <a href="categories.php?category=Activism">
                                    <img src="images/activism.jpg" alt="Activism">
                                    <div class="justify-content-center row">
                                        <p>Activism</p>
                                    </div>
                                </a>
                            </div>
                            <div id="HC">
                                <a href="categories.php?category=Healthcare">
                                    <img src="images/healthcare.png" alt="Healthcare">
                                    <div class="justify-content-center row">
                                        <p>Healthcare</p>
                                    </div>
                                </a>
                            </div>
                            <div id="O">
                                <a href="categories.php?category=Other">
                                    <img src="images/other.jpg" alt="Other">
                                    <div class="justify-content-center row">
                                        <p>Other</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="row justify-content-center">To view a category, please select one of the icons above.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("includes/footer.php")
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
</body>
</html>