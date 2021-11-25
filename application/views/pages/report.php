<div class="container">
  <p class="fs-1 ml-2">Sales Report</p>
  <div class="card col-10 offset-1">
    <form action="./report" method="post">
      <div class="col-8 row">
        <div class="input-group col-5">
          <select class="form-select" name="bulan" id="bulan" aria-label="Example select with button addon">
            <option>Semua Bulan</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 1 ? 'selected' : "") : "" ?> value="1">Januari</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 2 ? 'selected' : "") : "" ?> value="2">Februari</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 3 ? 'selected' : "") : "" ?> value="3">Maret</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 4 ? 'selected' : "") : "" ?> value="4">April</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 5 ? 'selected' : "") : "" ?> value="5">Mei</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 6 ? 'selected' : "") : "" ?> value="6">Juni</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 7 ? 'selected' : "") : "" ?> value="7">Juli</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 8 ? 'selected' : "") : "" ?> value="8">Agustus</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 9 ? 'selected' : "") : "" ?> value="9">September</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 10 ? 'selected' : "") : "" ?> value="10">Oktober</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 11 ? 'selected' : "") : "" ?> value="11">November</option>
            <option <?php echo !empty($isian) ? ($isian[0] == 12 ? 'selected' : "") : "" ?> value="12">Desember</option>
          </select>
          <input class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="<?php echo !empty($isian) ? $isian[1] : "" ?> ">
          <input class="btn btn-outline-secondary" name='filter' type="Submit" value="Filter">
          <a href="#" onclick="cetak_laporan()" class="btn btn-outline-secondary"> Cetak Laporan</a>
        </div>
      </div>
    </form>
    <div class="card-body">
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          foreach ($report->result() as $rep) {
          ?>
            <tr>
              <th scope="row"><?php ++$no ?></th>
              <td><?php echo $rep->id_menu ?></td>
              <td><?php echo $rep->nama ?></td>
              <td><?php echo $rep->jenis ?></td>
              <td><?php echo $rep->jumlah ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  function cetak_laporan() {
    let bulan = document.getElementById('bulan').value
    let tahun = document.getElementById('tahun').value
    window.location.href = './cetak_laporan?bulan=' + bulan + '&tahun=' + tahun;
  }
</script>