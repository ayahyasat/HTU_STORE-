
    <div class="wrapper rounded">
    <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand">All Transactions</a>
    </nav>
    <div class="row mt-2 pt-2">
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <ul class="nav nav-tabs w-75">
            <li class="nav-item"> <a class="nav-link active" href="#history">History</a> </li>
       </a> 
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-dark table-borderless" id="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Transaction ID</th>
<!--                     <th scope="col" class="text-center">User ID</th>
 -->                <th scope="col" class="text-center">Item ID</th>
                    <th scope="col" class="text-center">Item Quality</th>
                    <th scope="col" class="text-center">Final Price</th>
                    <th scope="col" class="text-center">Total Sales</th>
                    <th scope="col" class=""></th>

                </tr>
            </thead>
            <tbody>
              <?php foreach ($data->transactions as $transaction) : ?> 
            
                <tr>
                    <td scope="row" class="text-center text-light"><?= $transaction['id']?></td>
<!--                     <td class="text-center text-light"><?= $transaction['user_id']?></td>
 -->                    <td class="text-center text-light" ><?= $transaction['item_id']?></td>
                    <td class="text-center text-light"><?= $transaction['item_quantity']?></td>
                    <td class="text-center text-light"><?=$transaction['final_price']?></td>
                    <td class="text-center text-light"><?=$transaction['total_sales']?></td>
                    <td ><a class="text-light" href="./transaction?id=<?= $transaction['id'] ?>">check</a></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    </div>
</div>
