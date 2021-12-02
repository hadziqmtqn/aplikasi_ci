<div class="container pt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                    dy=".3em">140x140</text>
                            </svg>

                            <h2><?php echo $data_mahasiswa->Nama ?></h2>
                            <table class="table table-resposive">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $data_mahasiswa->Nama ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td><?php echo $data_mahasiswa->JenisKelamin ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo $data_mahasiswa->Alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td><?php echo $data_mahasiswa->Agama ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. HP</th>
                                        <td><?php echo $data_mahasiswa->NoHp ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $data_mahasiswa->Email ?></td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td><?php echo $data_prodi->nama ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p><a class="btn btn-secondary" href="javascript:history.back()">Kembali &raquo;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>