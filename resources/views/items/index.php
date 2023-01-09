    <h1 class="d-flex justify-content-around">All Items (<?= $data->items_count ?>)</h1>

    <div class="row my-5">

        <?php foreach ($data->items as $item) : ?>
            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100">
                <img src="<?= $item->image ?>" class="card-img-top" width="30px" height="300px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <?= $item->title ?>
                        </h5>
                        <ul class="list-group list-group-flush text-center">
                         <li class="list-group-item"><b>Price : <?= $item->price ?> JOD </b></li>
                        </ul>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="./item?id=<?= $item->id ?>" class="btn btn-outline-primary my-3">Check this item</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>


  