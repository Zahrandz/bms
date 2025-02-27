<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Data Pesan</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Pesan</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title float-left" style="margin:20px;">Daftar Pesan</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-info float-right" data-toggle="modal" data-target="#tambah"
                                style="margin-bottom:30px;">
                                <i class="fa fa-plus-circle"></i> Tambah Pesan
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th style="min-width:200px;">Nama</th>
                                    <th style="min-width:200px; width: 30%;">Email</th>
                                    <th style="min-width:200px; width: 85%;">Pesan</th>
                                    <th>Tanggal</th>
                                    <th style="min-width: 110px;">
                                        <center>Option</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($data_pesan as $row) {
                                        $id_pesan   = $row['id_pesan'];
                                        $nama       = $row['nama'];
                                        $email      = $row['email'];
                                        $pesan      = $row['pesan'];
                                        $tanggal    = $row['tanggal'];
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $pesan ?></td>
                                    <td style="min-width: 200px;"><?= date_format(date_create($tanggal),"d F Y H:i"); ?></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-s btn-warning" title="Edit" data-toggle="modal" data-target="#edit" onclick="edit(<?= $id_pesan ?>)"><i class="fa fa-pencil"></i></button>
                                        <p id="<?= $id_pesan ?>" class="d-none"><?php echo $nama.'|'.$email.'|'.$pesan.'|'.$tanggal ?></p>
                                        <button type="button" class="btn btn-s btn-danger" title="Hapus" data-toggle="modal" data-target="#hapus" onclick="hapus(<?= $id_pesan ?>)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tambah" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post">
                    <div class="form-group">
                        <div class="row m-0">
                            <div class="col-7">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama..." required>
                            </div>
                            <div class="col-5">
                                <label for="tanggal">Tanggal</label>
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email..." required>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <Label for="pesan">Pesan</Label>
                            <textarea class="form-control" id="pesan" rows="5" name="pesan" placeholder="Pesan..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="submit-tambah">
                            <i class="fa fa-check"></i><span> Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post">
                    <input type="hidden" class="d-none" id="ei" name="id_pesan">
                    <div class="form-group">
                        <div class="row m-0">
                            <div class="col-7">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="en" name="nama" placeholder="Nama..." required>
                            </div>
                            <div class="col-5">
                                <label for="tanggal">Tanggal</label>
                                <input type="datetime-local" class="form-control" id="ev" name="tanggal" placeholder="Tanggal..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="ea" name="email" placeholder="Email..." required>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <Label for="pesan">Pesan</Label>
                            <textarea class="form-control" id="el" rows="5" name="pesan" placeholder="Pesan..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="submit-edit"><i class="fa fa-check"></i><span> Submit</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="hapus" class="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post">
                    <div class="form-group">
                        <p id="dsc">Apakah anda yakin ingin menghapus Pesan ini?</p>
                        <input type="hidden" class="d-none" class="form-control" id="ds" name="id_pesan" value=""
                            required>
                    </div>
                    <div class="modal-footer p-0 pt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-shadow" name="submit-hapus"><i
                                class="fa fa-times"></i><span> Hapus</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function edit(id) {
    var data = (document.getElementById(id).textContent).split("|");
    document.getElementById("ei").value = id;
    document.getElementById("en").value = data[0];
    document.getElementById("ea").value = data[1];
    document.getElementById("el").value = data[2];
    document.getElementById("ev").value = data[3];
    
}

function hapus(id) {
    var data = (document.getElementById(id).textContent).split("|");
    document.getElementById("ds").value = id;
    document.getElementById("dsc").textContent = 'Apakah anda yakin ingin menghapus pesan "' + data[0] + '"?';
}
</script>
