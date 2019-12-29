<div>
    <nav class="navbar navbar-light fixed-top bg-header flex-md-nowrap p-3">
        <a class="navbar-brand mr-0" href="/index.php">Dictionary</a>

        <form class="w-100 form-inline" action="/Word/Pages/words.php">
            <!-- Search query -->
            <input class="form-control form-control-dark ml-auto mr-auto"
                   type="text"
                   placeholder="Search for word"
                   name="q"
                   style="width: 85%"
                   value="<?php if (value($_GET, 'q')) echo $_GET['q'] ?>"
                   aria-label="Search">

            <!-- Language picker -->
            <select class="custom-select w-auto" name="l" id="language">
                <option value="" <?php if (!value($_GET, 'l')) echo 'selected' ?>>Language</option>

                <?php foreach (languages()->all() as $language) { ?>
                    <option value="<?php echo $language->id ?>" <?php if (value($_GET, 'l')) echo 'selected' ?>><?php echo $language->label; ?></option>
                <?php } ?>
            </select>
        </form>
    </nav>
</div>
