<?php

use Core\Helpers\Helper;


?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['transaction:read', 'transaction:update'])) : ?>
        <a href="/transactions/edit?id=<?= $data->transaction_single->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
    ?>
        <a href="/transactions/delete?id=<?= $data->transaction_single->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>


    <div class="d-flex flex-column justify-content-start align-items-center">
    <p>
    <b>Transaction ID:</b> <?= $data->transaction_single->id ?>
    </p>
    <p>
    <b>Item ID:</b> <?= $data->transaction_single->item_id?>
    </p>
    <p>
    <b>Item Quality:</b> <?= $data->transaction_single->item_quantity?>
    </p>
    <p>
    <b>The Final Price:</b> <?= $data->transaction_single->final_price?>
    </p>
    <p>
    <b>Total Sales:</b> <?= $data->transaction_single->total_sales?>
    </p>
    <p>
    <b>Created_at:</b> <?= $data->transaction_single->created_at ?>
    </p>
    <p>
    <b>Updated_at:</b> <?= $data->transaction_single->updated_at ?>
    </p>

</form>
</div>
</div>