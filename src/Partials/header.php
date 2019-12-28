<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-3 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">Dictionary</a>

    <form class="w-100 form-inline" action="">
        <!-- Search query -->
        <input class="form-control form-control-dark ml-auto w-75 mr-auto" type="text" placeholder="Search for word" aria-label="Search">

        <!-- Language picker -->
        <select class="custom-select w-auto ml-3" name="language" id="language">
            <?php foreach (languages()->all() as $language) { ?>

                <option value="<?php echo $language->code ?>"><?php echo $language->label; ?></option>

            <?php } ?>
        </select>
    </form>
</nav>
