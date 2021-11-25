<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<div class="container">
    <p class="fs-1 ml-2">Sales Report</p>
    <div class="card col-10 offset-1">
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
    window.onload = function() {
        window.print();
    }
    window.onafterprint = function() {
        window.location.href="./"
    };
</script>