<?php

use Core\Helpers\Helper;


?>
   <!--  <input type="hidden" id="transaction_id" name="transaction_id" value="<?= $data->transaction_single->item_quantity?>">
    <input type="hidden" id="quantity_item" name="quantity_item" value="<?= $data->transaction->item_quantity?>">
    <input type="hidden" id="id_item" name="id_item" value="<?=$data->transaction->item_id?>"> -->
                 
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['transaction:read', 'transaction:update'])) : ?>
        <a href="/transactions/edit?id=<?= $data->transaction_single->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
    ?>
        <button onclick="delete_transaction()" class="btn btn-danger">Delete</button>
    <?php endif; ?>
</div>


    <div class="d-flex flex-column justify-content-start align-items-center">
    <p>
    <b>Transaction ID:</b> <?= $data->transaction_single->id ?>
    <input type="hidden" id="transaction_id" name="transaction_id" value="<?= $data->transaction_single->id?>">

    </p>
    <p>
    <b>Item ID:</b> <?= $data->transaction_single->item_id?>
    <input type="hidden" id="id_item" name="id_item" value="<?=$data->transaction_single->item_id?>">

    </p>
    <p>
    <b>Item Quality:</b> <?= $data->transaction_single->item_quantity?>
    <input type="hidden" id="quantity_item" name="quantity_item" value="<?=  $data->transaction_single->item_quantity?>">

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

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>


      function delete_transaction(e){
            $.ajax({
             type: "POST",
             url: "http://capstone-project.local/api/transactions/delete",
             data: JSON.stringify({
              id_item : $('#id_item').val(),
              quantity_item: $('#quantity_item').val(),
              transaction_id : $('#transaction_id').val(),
               })
               
               ,
            success: function(response) {
              alert('delete quantity done')
              location.href = '/transactions'
                
            },
            error: function(e) {
              alert('delete quantity not done');
            }
        });  

    };
    
    
    </script>

