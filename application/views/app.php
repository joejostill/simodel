<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="row">
    <div class="col-sm-12 col-md-2 p-0">
        <!-- include sidebar  -->
        <?php
        include("component/side.php");
        ?>
    </div>
    <?php if(isset($_GET['login'])){
        echo "<script>
        Swal.fire({
            title: 'Gagal Akses !',
            text: 'Anda harus login terlebih dahulu',
            icon: 'error',
          }).then(() => {
              window.location.href = './login'
          })
        </script>";
    }if(isset($_GET['logout'])){
        echo "<script>
        Swal.fire({
            title: 'Berhasil Logout !',
            text: 'Anda berhasil logout akun',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false
          }).then(() => {
              window.location.href = './'
          })
        </script>";
    } ?>
    <div class="col-sm-12 col-md-10 p-0" style="background-color: rgb(150, 220, 255)">
        <div class="col-12">
            <!-- include navbar  -->
            <?php include("component/nav.php"); ?>
        </div>
        <div class="col-12">
            <!-- cek variabel url di link  -->
            <?php
            include('pages/' . $page . '.php');
            ?>
        </div>
    </div>
</div>