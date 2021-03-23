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
                            <a href="categories.php?category=Housing">
                                <div id="H">
                                    <img src="images/housing.png" alt="Housing">
                                    <div class="justify-content-center row">
                                        <p>Housing</p>
                                    </div>
                                </div>
                            </a>
                            
                            <!--Water-->
                            <a href="categories.php?category=Water">
                                <div id="W">
                                    <img src="images/water.png" alt="Water">
                                    <div class="justify-content-center row">
                                        <p>Water</p>
                                    </div>
                                </div>
                            </a>
                            
                            <!--Transportation-->
                            <a href="categories.php?category=Transportation">
                                <div id="T">
                                    <img src="images/transportation.png" alt="Transportation">
                                    <div class="justify-content-center row">
                                        <p>Transportation</p>
                                    </div>
                                </div>
                            </a>
                            
                            <!--Agriculture-->
                            <a href="categories.php?category=Manufacturing">
                                <div id="M">
                                    <img src="images/manufacturing.png" alt="Manufacturing">
                                    <div class="justify-content-center row">
                                        <p>Manufacturing</p>
                                    </div>
                                </div>
                            </a>

                            <a href="categories.php?category=Energy" >
                                <div id="E">
                                    <img src="images/energy.png" alt="Energy">
                                    <div class="justify-content-center row">
                                        <p>Energy</p>
                                    </div>
                                </div>
                            </a>
                           
                            <a href="categories.php?category=Clothing" >
                                <div id="C">
                                    <img src="images/clothing.png" alt="Clothing">
                                    <div class="justify-content-center row">
                                        <p>Clothing</p>
                                    </div>
                               </div> 
                            </a>
                            
                            <a href="categories.php?category=ConsumerGoods">
                                <div id="CG">
                                    <img src="images/consumergoods.png" alt="Consumer Goods">
                                    <div class="justify-content-center row">
                                        <p>Consumer Goods</p>
                                    </div>
                                </div>
                            </a>

                            <a href="categories.php?category=Agriculture">
                                <div id="A">
                                    <img src="images/agriculture.png" alt="Agriculture">
                                    <div class="justify-content-center row">
                                        <p>Agriculture</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Wastewater">
                                <div id="WW">
                                    <img src="images/wastewater.png" alt="Wastewater">
                                    <div class="justify-content-center row">
                                        <p>Waste Water</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Lighting">
                                <div id="L">
                                    <img src="images/lighting.png" alt="Lighting">
                                    <div class="justify-content-center row">
                                        <p>Lighting</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=CircularEconomy">
                                <div id="CE">
                                    <img src="images/circularcycling.png" alt="Circular Economy">
                                    <div class="justify-content-center row">
                                        <p>Circular Cycling</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Education">
                                <div id="ED">
                                    <img src="images/education.png" alt="Education">
                                    <div class="justify-content-center row">
                                        <p>Education</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Ecology">
                                <div id="EC">
                                    <img src="images/ecology.png" alt="Ecology">
                                    <div class="justify-content-center row">
                                        <p>Ecology</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Activism">
                                <div id="AC">
                                    <img src="images/activism.jpg" alt="Activism">
                                    <div class="justify-content-center row">
                                        <p>Activism</p>
                                    </div>
                                </div>
                            </a> 
                            
                            <a href="categories.php?category=Healthcare">
                                <div id="HC">
                                    <img src="images/healthcare.png" alt="Healthcare">
                                    <div class="justify-content-center row">
                                        <p>Healthcare</p>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="categories.php?category=Other">
                                <div id="O">
                                    <img src="images/other.jpg" alt="Other">
                                    <div class="justify-content-center row">
                                        <p>Other</p>
                                    </div>
                                </div>
                            </a>
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