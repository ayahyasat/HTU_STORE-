

 <div id="create_form">
  <div class="d-flex justify-content-between gap-5">

<div class="container-fluid w-50">
    <h5 class="text-center">List of all item</h5>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">item id</th>
      <th scope="col">item name</th>
      <th scope="col">item quantity</th>

    </tr>
  </thead>
  <tbody>
  <?php     
  foreach ($data->items as $item) :?>
    <tr>
      <th scope="row"><?=$item->id?></th>
      <td><?=$item->title?></td>
      <td><?=$item->quantity?></td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
</div>


<div class="wrapper rounded  text-light w-100">
    <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand">New Transaction</a>
    </nav>

  <div class="table-responsive mt-3">
    <table class="table table-dark table-borderless" id="table">
    <form  id="posts_form" name="form"> 
      <input type="hidden" name="id" id="user_id"value="<?= $_SESSION['user']['user_id']?>">
 

   
  <div class="mb-3">
    <label for="items" class="form-label text-light">Item Name</label>
    <select name="item_id" id="item_id" class="form-select" aria-label="Default select example">
    <option> Select item please</option>

    <?php     
    
    foreach ($data->items as $post) :
        if ($post->quantity <= 0) {
            continue;
            
    } 
    ?>
    <option value="<?= $post->id ?>" final_price="<?=$post->price?>"><?= $post->title ?></option>

    <?php endforeach; ?>
    </select>

    </div> 

    <div class="mb-3">
        <label for="quantity" class="form-label text-light">Item Quantity</label>
            <input id="item_quantity" type="number" class="form-control" name="item_quantity" min="0" value="">
    </div>

    <div class="mb-3">
       <input id="final_price" type="hidden" name="final_price" class="form-control" value="">
       </div>
       
 
 <div class="gap-3 d-flex justify-content-center">
   <button id="create-transaction" class="btn btn-success ms-3 mt-4 w-50 ">Add</button>
</div>

</form>
</table>
</div>
<div class="table-responsive mt-5">
<nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand">Your Transaction for Today</a>
    </nav>
        <table class="table table-dark table-borderless" id="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Transaction ID</th>
                    <th scope="col" class="text-center">Item ID</th>
                    <th scope="col" class="text-center">Item Quality</th>
                    <th scope="col" class="text-center">The Final Price</th>
                    <th scope="col" class="text-center">Total Sales</th>
                    <th scope="col" class="text-center"> </th>
                    <th scope="col" class="text-center"> </th>

                </tr>
            </thead>
            <tbody>

            <?php foreach ($data->transactions as $transaction) :
                if ($_SESSION['user']['user_id']!=$transaction['user_id'])
                continue;
                if ($transaction['created_at']!= date("Y-m-d"))
                continue;
                ?> 
                
            <tr>
                <td scope="row" class="text-center text-light"><?= $transaction['id']?></td>
                <td class="text-center text-light" ><?= $transaction['item_id']?></td>
                <td class="text-center text-light"><?= $transaction['item_quantity']?></td>
                <td class="text-center text-light"><?=$transaction['final_price']?></td>
                <td class="text-center text-light"><?=$transaction['total_sales']?></td>
                <td ><button class=" bg-dark text-light border-0"  onclick="location.href='/sellings/edit_s?id=<?= $transaction['id']?>'">
                <i class="fa-sharp fa-solid fa-pen-to-square"></i></button></td>
                
                <td>
                  <button class=" bg-dark text-light border-0" onclick="delete_transaction()"   
                  transaction_id="<?= $transaction['id']?>"
                  quantity_item="<?= $transaction['item_quantity']?>"
                  id_item="<?= $transaction['item_id']?>">   
                <i class="fa-sharp fa-solid fa-trash"></i></button></td>
            </tr>
          <?php endforeach; ?> 
            </tbody>
      </table>
</div> 
 </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
  $('#create_form').show();
$('#edit-form').hide();

  $("#show").click(function(){
    $("#create_form").hide();
    $('#edit-form').show();

  });
}); 

$(function () {
    $('#item_id').change(function () {
        $('#final_price').val($('#item_id option:selected').attr('final_price'));
    });
});



$('#create-transaction').click(function(e) {
     let data = {
        user_id : $('#user_id').val(),
        item_quantity : $('#item_quantity').val(),
        final_price : $('#final_price').val(),   
        item_id : $('#item_id').val(),
        total_sales:$('#item_quantity').val()*$('#final_price').val(),
    };
   
    

        $.ajax({
            type: "POST",
            url: "http://capstone-project.local/api/transactions/create",
            data: JSON.stringify(data),
            success: function(response) {
                alert('done')
             },
            error: function(e) {
                alert('not done');
            }
        });


        $.ajax({
            type: "POST",
            url: "http://capstone-project.local/api/transactions/update",
            data: JSON.stringify({
              id : $('#item_id').val(),
              item_quantity : $('#item_quantity').val(), 
              }),
            success: function(response) {
                alert('update quantity done')
                
            },
            error: function(e) {
                alert('update quantity not done');
            }
        });  

    });
   
    
      function delete_transaction(){
            $.ajax({
             type: "POST",
             url: "http://capstone-project.local/api/transactions/delete",
             data: JSON.stringify({
              id_item : $('#item_id').val(),
              quantity_item: $('#quantity_item').val(),
              transaction_id : $('#transaction_id').val(),
               })
               
               ,
            success: function(response) {
              alert('delete quantity done')
                
            },
            error: function(e) {
              alert('delete quantity not done');
            }
        });  

    };
    
    
    </script>

