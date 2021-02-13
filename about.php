<!--
about.php
Team JDPR (Jake Gerard, David Boone, Phillip Ball, Raju Shrestha)
01/25/2021
This is the about page for Coneybeare Cleantech
-->

    <?php
        $style = "aboutstyles";
        $currentPage = "about";
        include("includes/head.php");
    ?>
    <!-- About Info -->
    <div class="container row justify-content-center mx-auto py-3">
        <!-- Overview -->
        <div class="col-12 col-sm-6">
            <p>
                Coneybeare Cleantech is a full-service recruitment leader in the sustainable technology and renewable energy sectors, offering retained and exclusive contingency recruiting, direct hire and contractor placements, consulting and training services as well as reference checks.
            </p>
            <p>
                Employers may hire us to connect them with great employees, independent contractors, or consultants. Our consultants also offer training in both employment and sustainability-related practices. Coneybeare Cleantech’s team of recruiters, who have built a robust employer and candidate network, produces superior results and makes the process of finding and placing premier talent seamless.
            </p>
            <p>
                Our team of dedicated, talented recruiters provides world-class services customized to each client’s individual needs, whether they are a start-up company or Fortune 500 corporation.
            </p>
        </div>
        <div class="col-12 col-sm-6">
            <p>
                Headquartered in Santa Ana, Calif., the organization has offices in San Francisco and Colombia, South America.
            </p>
            <p>
                Building a More Sustainable Future
            </p>
            <p>
                Beyond its recruitment and consulting services, Coneybeare Cleantech is a leader in the clean technology movement. Lead by its founder Victoria Betancourt, our mission is to build a more sustainable future for the coming generations through a mix of innovation, public policy and private sector investment.
            </p>
            <p>
                Ultimately, recruiting is all about connecting people. Exchanging ideas and forging relationships that serve this goal are the core values of Coneybeare Cleantech.
            </p>
        </div>

        <!-- Image of Vicky and Info -->
        <div class="d-flex">
            <div class="pr-3">
                <img src="images/vickyClient.png" alt="Victoria Betancourt" id="vickyImg">
            </div>
            <div class="align-self-center">
                <p>
                    Founder: Victoria B
                </p>
                <p>
                    Vision: Placeholder
                </p>
                <p>
                    Mission: Placeholder
                </p>
                <p>
                    <a href="#">LinkedIn</a>
                </p>
            </div>
        </div>
    </div> <!-- End of About Info -->

    <!-- The Footer -->
    <?php
        include("includes/footer.php");
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>