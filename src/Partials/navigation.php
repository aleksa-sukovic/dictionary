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
                if (isPageActive(['dictionaries.php'])) {
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
            <a href="../languages.php" class="nav-link <?php
            if (isPageActive(['languages.php', 'languages-edit.php'])) {
                echo 'active';
            }
            ?>">Languages</a>
        </li>
    </ul>
</nav>
