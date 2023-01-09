<div class="d-flex flex-column justify-content-center align-items-center gap-5">

<h1>Edit Item</h1>

<form action="/items/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->item->id ?>">
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="post-title" name="title" value="<?= $data->item->title ?>">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Description.." id="post-content" style="height: 100px" name="content"><?= $data->item->content ?></textarea>
        <label for="post-content">Description</label>
    </div>

        <div class="my-3">
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Quantity</span>
            <input id="post-quantity" type="number" class="form-control" name="quantity" min="0" value="<?= $data->item->quantity ?>">
        </div>
    </div>

    <div class="mb-3">
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Price (JOD)</span>
            <input id="post-price" type="number" name="price" class="form-control" value="<?= $data->item->price ?>">
        </div>
    </div>
        <div class="mb-3">
        <div class="input-group col align-items-center mb-0">
        <span class="input-group-text">Cost (JOD)</span>
        <input id="post-cost" type="number" name="cost" class="form-control" value="<?= $data->item->cost ?>">
        </div>
        </div>

        <!-- <div class="my-3">
        <input type="file" class="form-control" id="photo" name="photo">
        </div>  -->

        <button type="submit" class="btn btn-warning mt-4 ">Update</button>
    </div>
</form>