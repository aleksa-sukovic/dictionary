<nav class="col-sm-12 bg-light sidebar">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="../index.php" class="nav-link <?php
            if (isPageActive(['index.php'])) {
                echo 'active';
            }
            ?>">Home</a>
        </li>

        <li class="nav-item">
            <a href="../dictionaries.php" class="nav-link <?php
                if (isPageActive(['dictionaries.php', 'dictionaries-edit.php'])) {
                    echo 'active';
                }
                ?>">Dictionaries</a>
        </li>

        <li class="nav-item">
            <a href="../words.php" class="nav-link <?php
            if (isPageActive( ['words.php'])) {
                echo 'active';
            }
            ?>">Words</a>
        </li>

        <li class="nav-item">
            <a href="../word-types.php" class="nav-link <?php
            if (isPageActive(['word-types.php', 'word-types-edit.php'])) {
                echo 'active';
            }
            ?>">Word types</a>
        </li>

        <li class="nav-item">
            <a href="../word-form-types.php" class="nav-link <?php
            if (isPageActive(['word-form-types.php', 'word-form-types-edit.php'])) {
                echo 'active';
            }
            ?>">Word form types</a>
        </li>

        <li class="nav-item">
            <a href="../word-form-states.php" class="nav-link <?php
            if (isPageActive(['word-form-states.php', 'word-form-states-edit.php'])) {
                echo 'active';
            }
            ?>">Word form states</a>
        </li>

        <li class="nav-item">
            <a href="../languages.php" class="nav-link <?php
            if (isPageActive(['languages.php', 'languages-edit.php'])) {
                echo 'active';
            }
            ?>">Languages</a>
        </li>
    </ul>
</nav>
