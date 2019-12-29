<?php
    $wordTypes = wordFormTypes()->all();
    $wordStates = wordFormStates()->all();

    $activeType = !empty($_GET['type']) ? $_GET['type'] : null;
    $activeState = !empty($_GET['state']) ? $_GET['state'] : null;
    $filterParams = ['type_id' => $activeType, 'state_id' => $activeState];
?>

<!-- No translations alert -->
<?php if (!count($activeItem->forms($filterParams))) { ?>
    <p class="alert alert-info">
        We couldn't find any forms associated to this translation.
    </p>
<?php } ?>

<!-- Word forms list -->
<?php if (count($activeItem->forms($filterParams))) { ?>
<div>
    <div class="mb-3">
        <form action="/WordTranslation/Pages/word-translations-edit.php" method="GET" class="form-inline">
            <input type="hidden" value="<?php echo $activeItem->id ?>" name="item">

            <!-- Types -->
            <select name="type" id="type" class="custom-select d-inline">
                <option value="" <?php if (!$activeType) echo 'selected' ?>>Word type</option>

                <?php foreach ($wordTypes as $type) { ?>
                    <option value="<?php echo $type->id ?>" <?php if ($type->id == $activeType) echo 'selected' ?>><?php echo $type->value ?></option>
                <?php } ?>
            </select>

            <!-- States -->
            <select name="state" id="state" class="custom-select d-inline ml-3">
                <option value="" <?php if (!$activeState) echo 'selected' ?>>Word state</option>

                <?php foreach ($wordStates as $state) { ?>
                    <option value="<?php echo $state->id ?>" <?php if ($state->id == $activeState) echo 'selected' ?>><?php echo $state->value ?></option>
                <?php } ?>
            </select>

            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-secondary ml-3">Filter</button>
        </form>
    </div>
    <table class="table table-hover table-responsive table-sm">
        <thead>
        <tr>
            <th>Value</th>
            <th>Type</th>
            <th>State</th>
            <th>Word</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($activeItem->forms($filterParams) as $form) { ?>
            <tr>
                <td><?php echo $form->value ?></td>
                <td><?php echo $form->type()->value ?></td>
                <td><?php echo $form->state()->value ?></td>
                <td><?php echo $form->translation()->value ?></td>
                <td>
                    <a href="/WordForm/Pages/word-forms-edit.php?item=<?php echo $form->id ?>" class="text-info mr-2">Edit</a>
                    <a href="/WordForm/Pages/word-forms-delete.php?item=<?php echo $form->id ?>&translation=<?php echo $form->translation()->id ?>" class="text-danger mr-2">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
