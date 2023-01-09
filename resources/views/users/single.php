<div class="mt-5 d-flex flex-row-reverse gap-3">
    <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>
    <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger">Delete</a>
    <a href="/users" class="btn btn-success">Back</a>
</div>

<div class="my-5 fs-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->user->display_name ?>
    </h1>

  <div class="d-flex my-5 flex-row align-items-center gap-5">
  <div class="card" style="width: 170px;">
  <img src="<?=$data->user->file_name ?>"  height="200px" class="card-img-top" alt="admin">
    </div>
    <div>
    <p >
    <b>Email:</b> <?= $data->user->email ?>
    </p>
    <p>
    <b>Username:</b> <?= $data->user->username ?>
    </p>
    <p>
    <b>Created_at:</b> <?= $data->user->created_at ?>
    </p>
    <p>
    <b>Updated_at:</b> <?= $data->user->updated_at ?>
    </p>
    <p>
    <b>Role:</b><?= $data->user->permissions ?>
    </p>
    </div>
</div>
</div>