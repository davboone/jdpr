<?php
    $style = "categoryStyles";
    include('includes/head.php');
?>

    <!-- Categories Container -->
    <div id="main" class="container-fluid col-12 col-sm-6 bg-light">
        <form id="categorySelect" action="" method="post">
        <label for="category">Category</label>
        <select onchange="submitForm()" class="form-control" name="category">
            <option value="">Select a category</option>
            <option value="Housing">Housing</option>
            <option value="Clothing">Clothing</option>
            <option value="Energy">Energy</option>
            <option value="Consumer Goods">Consumer Goods</option>
            <option value="Manufacturing">Manufacturing</option>
            <option value="Wastewater">Wastewater</option>
            <option value="Transportation">Transportation</option>
            <option value="Lighting">Lighting</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Circular Economy">Circular Economy</option>
            <option value="Education">Education</option>
            <option value="Water">Water</option>
            <option value="Ecology">Ecology</option>
            <option value="Other">Other</option>
        </select>
        </form>

        <div>
            <?php
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
</body>
</html>