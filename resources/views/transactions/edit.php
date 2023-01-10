<a href="/transactions" class="btn btn-success">Back</a>

<div id="edit-form" >

<div class="d-flex flex-column justify-content-center align-items-center gap-5">

<h1>Edit Transaction</h1>
<input type="hidden" name="id" id="user_id"value="<?= $_SESSION['user']['user_id']?>">
<input type="hidden" name="transaction_id" id="transaction_id" value="<?= $data->transaction->id ?>">

<form class="w-50">
<input type="hidden" name="id" value="<?= $data->transaction->id ?>">

<div class="wrapper rounded">
    <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand">Edit Transaction</a>
    </nav>

    <div class="table-responsive mt-3">
        <table class="table table-dark table-borderless" id="table">
    
          
        <div class="mb-3">
            <input id="item_id" type="hidden" class="form-control" name="item_id" value="<?= $data->transaction->item_id?>">
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label text-light">Item Quantity</label>
            <input id="item_quantity" type="number" class="form-control" name="item_quantity" value="<?= $data->transaction->item_quantity?>">
    </div>

    <div class="mb-3">
       <input id="final_price" type="hidden" name="final_price" class="form-control" value="<?= $data->transaction->final_price?>">
       </div>

<div class="mb-3 d-flex gap-3">

<button id="edit_transaction" type="submit" class="btn btn-warning mt-4">Update</button>
</div>
</div>
</div>
</form>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>


$('#edit_transaction').click(function(e) {
   
        $.ajax({
            type: "POST",
            url: "http://capstone-project.local/api/transactions/edit",
            data: JSON.stringify({ 
                item_quantity : $('#item_quantity').val(),
                id : $('#item_id').val(),
                transaction_id :$('#transaction_id').val(),}),
            success: function(response) {
                alert('update quantity done');
                location.href = '/transactions'
            },
            error: function(e) {
                alert('update quantity not done');
            }
        });  

    });
   



</script>
