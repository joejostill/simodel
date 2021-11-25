<div class="container mt-5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <div class="row">
        <div class="col-12">
            <a href="#" data-bs-toggle="modal" data-bs-target="#trans" class="btn col-2 mx-auto btn-primary float-end">Cart</a>
        </div>
        <?php foreach ($menu->result() as $row) { ?>
            <div class="col-sm-12 col-md-3">
                <div class="card col-12">
                    <img src="<?php echo base_url("/image/menu/" . $row->foto) ?>" class="card-img-top col-12" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->nama ?></h5>
                        <p class="card-text">Rp. <?php echo $row->harga ?></p>
                        <p class="card-text">Stok : <?php echo $row->stok ?></p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#cart<?php echo $row->id_menu ?>" class="btn col-5 mx-auto btn-primary">Pesan</a>
                    </div>
                    <?php echo form_open_multipart('pages/cart'); ?>
                    <div class="modal fade" id="cart<?php echo $row->id_menu ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keranjang Pembelian</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="id_menu" value="<?php echo $row->id_menu ?>">
                                        <input type="text" name="jumlah" required class="form-control" placeholder="Masukkan Jumlah">
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
                </div>
            </div>
        <?php } ?>
    </div>
    <?php echo form_open_multipart('pages/do_trans'); ?>
    <div class="modal fade" id="trans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keranjang Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="col-12 table">
                        <tr>
                            <th scope="col">
                                Menu
                            </th>
                            <th scope="col">
                                Jumlah
                            </th>
                            <th scope="col">
                                Harga
                            </th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                        <?php $total = 0 ?>
                        <?php foreach ($cart->result() as $row) { ?>
                            <tr>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->jumlah ?></td>
                                <td><?php echo $row->harga * $row->jumlah ?></td>
                                <td><a href="./delete_cart?id=<?php echo $row->id_menu ?>" alt="Hapus Data">X</a></td>
                                <?php $total += $row->harga * $row->jumlah ?>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="right">Total : </td>
                            <input type="hidden" name="total" value="<?php echo $total?>">
                            <td colspan="2"><?php echo $total ?></td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- <div style="width: 30%; background-color: white; float:right">Order <br>
        <table style="width: 100%;">
            <tr>
                1x
            </tr>
            <tr>
                Gurita
            </tr>
            <tr>
                Rp 1000
            </tr>
        </table><br>
        Total Rp1000 <br>
        Tax 3% Rp30 <br>
        SubTotal Rp1030 <br>
        <button style="background-color: aqua;">Save</button>
        <button style="background-color: aqua;">Print</button>
    </div> -->
</div>