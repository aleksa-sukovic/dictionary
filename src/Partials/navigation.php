<div class="row">
    <nav class="col-sm-12 bg-light sidebar">
        <ul class="nav justify-content-center">

            <!-- Home -->
            <li class="nav-item">
                <a href="/index.php" class="nav-link <?php if (isPageActive(['index.php'])) echo 'active' ?>">
                    Home
                </a>
            </li>

            <!-- Dictionaries -->
            <li class="nav-item">
                <a href="/Dictionary/Pages/dictionaries.php" class="nav-link <?php if (isPageActive(['dictionaries.php', 'dictionaries-edit.php'])) echo 'active' ?>">
                    Dictionaries
                </a>
            </li>

            <!-- Words -->
            <li class="nav-item">
                <a href="/Word/Pages/words.php" class="nav-link <?php if (isPageActive(['words.php', 'words-edit.php', 'word-translations-edit.php'])) echo 'active' ?>">
                    Words
                </a>
            </li>

            <!-- Word Types -->
            <li class="nav-item">
                <a href="/WordType/Pages/word-types.php" class="nav-link <?php if (isPageActive(['word-types.php', 'word-types-edit.php'])) echo 'active' ?>">
                    Word types
                </a>
            </li>

            <!-- Word form types -->
            <li class="nav-item">
                <a href="/WordFormType/Pages/word-form-types.php" class="nav-link <?php if (isPageActive(['word-form-types.php', 'word-form-types-edit.php'])) echo 'active' ?>">
                    Word form types
                </a>
            </li>

            <!-- Word form states -->
            <li class="nav-item">
                <a href="/WordFormState/Pages/word-form-states.php" class="nav-link <?php if (isPageActive(['word-form-states.php', 'word-form-states-edit.php'])) echo 'active' ?>">
                    Word form states
                </a>
            </li>

            <!-- Languages -->
            <li class="nav-item">
                <a href="/Language/Pages/languages.php" class="nav-link <?php if (isPageActive(['languages.php', 'languages-edit.php'])) echo 'active' ?>">
                    Languages
                </a>
            </li>
        </ul>
    </nav>
</div>
