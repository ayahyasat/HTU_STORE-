<?php

use Core\Helpers\Helper;
?>
<div class="d-flex flex-column justify-content-center align-items-center gap-5">
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
        <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['item:read', 'item:delete'])) :
    ?>
        <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

<div class="my-4">
    <!-- for admins -->
    <h1 class="text-center">
       <b>Name of item:</b> <?= $data->item->title ?>
    </h1>
    <div class="d-flex my-5 flex-row align-items-center gap-5">
  <div class="card" style="width: 170px;">
  <img src="<?= $data->item->image ?>"  height="200px" class="card-img-top" alt="admin">
    </div>
    <div class="d-flex flex-column">
    <p>
    <b>Description:</b> <?= $data->item->content ?>
    </p>
    <p>
    <b>Quantity:</b> <?= $data->item->quantity ?>
    </p>
    <p>
    <b>Price:</b> <?= $data->item->price ?> JOD
    </p>
    <p>
    <b>Cost:</b> <?= $data->item->cost ?> JOD
    </p>
    <p>
    <b>Created_at:</b> <?= $data->item->created_at ?>
    </p>
    <p>
    <b>Updated_at:</b> <?= $data->item->updated_at ?>
    </p>
</div>
    </div>