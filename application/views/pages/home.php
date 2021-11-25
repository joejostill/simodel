<div class="container mt-5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Menu
            </button>
        </div>
        <?php foreach ($menu->result() as $row) { ?>
            <div class="col-sm-12 col-md-3">
                <div class="card col-12">
                    <img src="<?php echo base_url("/image/menu/" . $row->foto) ?>" class="card-img-top col-12" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->nama ?></h5>
                        <p class="card-text">Rp. <?php echo $row->harga ?></p>
                        <p class="card-text">Stok : <?php echo $row->stok ?></p>
                        <div class="btn-group float-end">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="pages?edit&id=<?php echo $row->id_menu ?>">Update</a></li>
                                <li><a class="dropdown-item" href="pages/delete?id=<?php echo $row->id_menu ?>">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if (isset($data)) {
    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var myModal = new bootstrap.Modal(document.getElementById('tester'))
                myModal.show()
            });
        </script>
        <?php foreach ($data->result() as $row) { ?>
            <?php echo form_open_multipart('pages/update'); ?>
            <div class="modal fade" id="tester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Makanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Foto : </h5>
                            <div class="input-group mb-3">
                                <input type="file" accept="image/*" name="foto" class="form-control">

                            </div>
                            <p class="text-muted">
                                Jika gambar tidak ingin diubah, field dikosongkan saja.
                            </p>
                            <h5>ID Menu : </h5>
                            <div class="input-group mb-3">
                                <input type="text" id="id_menu" name="id_menu" required class="form-control" value="<?php echo $row->id_menu ?>" readonly placeholder="Masukkan Kode">
                            </div>
                            <h5>Nama : </h5>
                            <div class="input-group mb-3">
                                <input type="text" name="nama" required class="form-control" value="<?php echo $row->nama ?>" placeholder="Masukkan Nama">
                            </div>
                            <h5>Jenis : </h5>
                            <div class="input-group mb-3">
                                <select class="form-select" name="jenis" required aria-label="Default select example">
                                    <option disabled>Menu</option>
                                    <option <?php echo $row->jenis == "Food" ? 'selected' : "" ?> value="Food">Food</option>
                                    <option <?php echo $row->jenis == "Drink" ? 'selected' : "" ?> value="Drink">Drink</option>
                                    <option <?php echo $row->jenis == "Snack" ? 'selected' : "" ?> value="Snack">Snack</option>
                                    <option <?php echo $row->jenis == "Ice Cream" ? 'selected' : "" ?> value="Ice Cream">Ice Cream</option>
                                    <option <?php echo $row->jenis == "Cookies" ? 'selected' : "" ?> value="Cookies">Cookies</option>
                                </select>
                            </div>
                            <h5>Stok : </h5>
                            <div class="input-group mb-3">
                                <input type="number" name="stok" value="<?php echo $row->stok ?>" required class="form-control" placeholder="Masukkan Stok">
                            </div>
                            <h5>Harga : </h5>
                            <div class="input-group mb-3">
                                <input type="number" name="harga" required value="<?php echo $row->harga ?>" class="form-control" placeholder="Masukkan Stok">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        <?php } ?>
    <?php
    } ?>
</div>