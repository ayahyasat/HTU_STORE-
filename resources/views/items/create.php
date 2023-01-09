<div class="d-flex flex-column justify-content-center align-items-center gap-5 mx-5">
<h1 class="text-center">Add New Item</h1>

<form action="/items/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="post-title" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="post-title" name="title">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Your Description.." id="post-content" style="height: 100px" name="content"></textarea>
        <label for="post-content">Description</label>
    </div>
    <div class="mb-3">
    <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Quantity</span>
            <input id="post-quantity" type="number" class="form-control" name="quantity" min="0">
        </div>
    </div>
    <div class="mb-3">
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Price (JOD)</span>
            <input id="post-price" type="number" name="price" class="form-control">
        </div>
    </div>
        <div class="mb-3">
        <div class="input-group col align-items-center mb-0">
            <span class="input-group-text">Cost (JOD)</span>
            <input id="post-cost" type="number" name="cost" class="form-control">
        </div>
     </div>
<!--     <div class="mb-3">
          <input type="file" class="form-control" name="newPicture">
          </div>  -->
         <button type="submit" class="btn btn-success mt-4">Create</button>
        </div>
</form>