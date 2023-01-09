
<h1 class="text-center py-3">Welcome To HTU Store Dashboard</h1>


<div class="row my-5">
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Total Sales
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item text-center bg-secondary text-white bg-opacity-25"><b class="text-success"><?= $data->total_sales ." Sales"?></b></li>
            </ul>
            </div>
        </div>

        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center"> Total Transactions </b>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item text-center bg-secondary text-white bg-opacity-25"> <b class="text-success"><?= $data->transactions_count ." Transactions"?></b></b></li>
            </ul>
            </div>
        </div>

        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title text-center">Total Items
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item text-center bg-secondary text-white bg-opacity-25 "><b class="text-success"><?=$data->quantitys_count. " Items"?></b></li>
            </ul>
            </div>
        </div>

        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                 <div class="card-body">
                    <h5 class="card-title text-center">Total User</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                <li class="list-group-item text-center bg-secondary text-white bg-opacity-25"><b class="text-success"><?= $data->users_count ." Users"?></b></li>
            </ul>
         </div>
        </div>
        <div class="d-flex justify-content-center">
            <h2 class="my-5 text-center"><p>Top 5 Expensive items</p></h2>
           </div>


       <div id="table-data my-5">
        <table class="table table-hover">
            <thead>

                <tr>
                <!-- <th scope="col">#</th> --> 
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach (array_slice($data->top_price,0,5) as $price) : 
                ?>
        <tr>
                <td><?=$price['title']?></td>
        <td><?=$price['price']. " JOD"?></td>
        </tr>

       <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
