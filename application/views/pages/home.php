<div class="container mt-5">
    <div class="row">
        <?php foreach ($menu->result() as $row) { ?>
            <div class="col-sm-12 col-md-3">
                <div class="card col-12">
                    <img src="<?php echo base_url("/image/menu/".$row->foto)?>" class="card-img-top col-12" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->nama ?></h5>
                        <p class="card-text">Rp. <?php echo $row->harga?></p>
                        <p class="card-text">Stok : <?php echo $row->stok?></p>
                        <a href="#" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>