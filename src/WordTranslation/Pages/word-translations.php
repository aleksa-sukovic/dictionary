<!-- No translations alert -->
<?php if (!count($activeItem->translations())) { ?>
    <p class="alert alert-info">
        There are currently no translations for this word.
    </p>
<?php } ?>

<!-- Translations list -->
<?php if (count($activeItem->translations())) { ?>
<table class="table table-hover table-sm">
    <thead>
    <tr>
        <th>Value</th>
        <th>Language</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($activeItem->translations() as $translation) { ?>
        <tr>
            <td><?php echo $translation->value ?></td>
            <td><?php echo $translation->language()->label ?></td>
            <td>
                <a href="/WordTranslation/Pages/word-translations-edit.php?item=<?php echo $translation->id ?>" class="text-info mr-2">Edit</a>
                <a href="/WordTranslation/Pages/word-translations-delete.php?item=<?php echo $translation->id ?>" class="text-danger mr-2">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>
