<style>
    .active{
        border-bottom: 3px solid white;
    }
</style>
<nav class="navbar navbar-expand-md" style="background-color: rgb(150, 220, 255); color :rgb(94, 171, 193)" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <div class="row col-12">
            <?php if(isset($nav)){}else{
                ?>
            <div class="collapse navbar-collapse col-12" id="navbarsExample04">
                <ul class="navbar-nav mb-2 mb-md-0 col-12">
                    <li class="nav-item  col-2 offset-1">
                        <a class="nav-link mx-auto <?php echo isset($_GET['filter'])&&$_GET['filter']=='Food' ? 'active' : ''?> text-center" href="?filter=Food">Food</a>
                    </li>
                    <li class="nav-item  col-2">
                        <a class="nav-link mx-auto <?php echo isset($_GET['filter'])&&$_GET['filter']=='Drink' ? 'active' : ''?>  text-center" href="?filter=Drink">Drink</a>
                    </li>
                    <li class="nav-item  col-2">
                        <a class="nav-link mx-auto <?php echo isset($_GET['filter'])&&$_GET['filter']=='Snack' ? 'active' : ''?>  text-center" href="?filter=Snack">Snack</a>
                    </li>
                    <li class="nav-item  col-2">
                        <a class="nav-link mx-auto <?php echo isset($_GET['filter'])&&$_GET['filter']=='Ice Cream' ? 'active' : ''?>  text-center" href="?filter=Ice Cream">Ice Cream</a>
                    </li>
                    <li class="nav-item  col-2">
                        <a class="nav-link mx-auto <?php echo isset($_GET['filter'])&&$_GET['filter']=='Cookies' ? 'active' : ''?>  text-center" href="?filter=Cookies">Cookies</a>
                    </li>
                </ul>
            </div>
            <?php
        } ?>
            <!-- Modal  -->
            <?php echo form_open_multipart('pages/store');?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Makanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Foto : </h5>
                                <div class="input-group mb-3">
                                    <input type="file" accept="image/*" name="foto" required class="form-control"  >
                                </div>
                                <h5>Nama : </h5>
                                <div class="input-group mb-3">
                                    <input type="text"  name="nama" required class="form-control" placeholder="Masukkan Nama" >
                                </div>
                                <h5>Jenis : </h5>
                                <div class="input-group mb-3">
                                        <select class="form-select" name="jenis" required aria-label="Default select example">
                                        <option disabled selected>Menu</option>
                                        <option value="Food">Food</option>
                                        <option value="Drink">Drink</option>
                                        <option value="Snack">Snack</option>
                                        <option value="Ice Cream">Ice Cream</option>
                                        <option value="Cookies">Cookies</option>
                                    </select>
                                </div>
                                <h5>Stok : </h5>
                                <div class="input-group mb-3">
                                    <input type="number" name="stok" required  class="form-control" placeholder="Masukkan Stok" >
                                </div>
                                <h5>Harga : </h5>
                                <div class="input-group mb-3">
                                    <input type="number" name="harga" required  class="form-control" placeholder="Masukkan Stok" >
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
</nav>