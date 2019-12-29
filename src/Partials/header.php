<div>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-3 shadow">
        <a class="navbar-brand mr-0" href="/index.php">Dictionary</a>

        <form class="w-100 form-inline" action="/Word/Pages/words.php">
            <!-- Search query -->
            <input class="form-control form-control-dark ml-auto w-75 mr-auto"
                   type="text"
                   placeholder="Search for word"
                   name="q"
                   value="<?php if (value($_GET, 'q')) echo $_GET['q'] ?>"
                   aria-label="Search">

            <!-- Language picker -->
            <select class="custom-select w-auto" name="l" id="language">
                <option value="" <?php if (!value($_GET, 'l')) echo 'selected' ?>>Choose language</option>

                <?php foreach (languages()->all() as $language) { ?>
                    <option value="<?php echo $language->id ?>" <?php if (value($_GET, 'l')) echo 'selected' ?>><?php echo $language->label; ?></option>
                <?php } ?>
            </select>
        </form>
    </nav>
</div>
