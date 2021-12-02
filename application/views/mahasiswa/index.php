<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('mahasiswa/add'); ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableMahasiswa">
                            <thead>
                                <tr class="table-success">
                                    <th>NO</th>
                                    <th>OPSI</th>
                                    <th>NAMA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>AGAMA</th>
                                    <th>NO HP</th>
                                    <th>EMAIL</th>
                                    <th>PRODI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;
                                foreach ($data_mahasiswa as $row)
                                {
                                ?>
                                <tr>
                                    <td>
                                        <div style="width: 50px">
                                            <?php echo $no;?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 150px">
                                            <a href="<?= site_url('mahasiswa/detail/' . $row->IdMhsw) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> </a>
                                            <a href="<?= site_url('mahasiswa/edit/' . $row->IdMhsw) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                            <a href="javascript:void(0);" data="<?= $row->IdMhsw ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 150px">
                                            <?= $row->Nama ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 150px">
                                            <?= $row->JenisKelamin ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 200px">
                                            <?= $row->Alamat ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 100px">
                                            <?= $row->Agama ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 200px">
                                            <?= $row->NoHp ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 150px">
                                            <?= $row->Email ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 200px">
                                            <?= $row->nama ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<script>
//menampilkan data ketabel dengan plugin datatables
$('#tableMahasiswa').DataTable();

//menampilkan modal dialog saat tombol hapus ditekan
$('#tableMahasiswa').on('click', '.item-delete', function() {
    //ambil data dari atribute data
    var id = $(this).attr('data');
    $('#myModalDelete').modal('show');
    //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete
    //pada controller mahasiswa
    $('#btdelete').unbind().click(function() {
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: '<?php echo base_url() ?>mahasiswa/delete/',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('#myModalDelete').modal('hide');
                location.reload();
            }
        });
    });
});
</script>