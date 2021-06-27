<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#44749D">Nama Mahasiswa</td>
            <td style="background-color:#44749D">Fakultas</td>
            <td style="background-color:#44749D">Nama Pembimbing</td>
            <td style="background-color:#44749D">Kegiatan</td>
            <td style="background-color:#44749D">Kota Kegiatan</td>
            <td style="background-color:#44749D">Jumlah Dana</td>
            <td style="background-color:#44749D">Tahun</td>
            <td style="background-color:#44749D">Jenis Prestasi</td>
            <td style="background-color:#44749D">Tingkat Prestasi</td>
            <td style="background-color:#44749D">Jenis Juara</td>
            <td style="background-color:#44749D">Tanggal Mulai</td>
            <td style="background-color:#44749D">Tanggal Selesai</td>
            <td style="background-color:#44749D">Keterangan</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($exportdata as $val) : ?>
            <tr>
                <?php if ($val['kepesertaan'] == 'individu') { ?>
                    <td><?= $val['name']; ?></td>
                <?php } else { ?>
                    <?php $anggota = $this->M_prestasi->getNamaAnggota($val['id_prestasi'])
                    ?>
                    <td>
                        <ul>
                            <?php foreach ($anggota as $row) { ?>
                                <li><?= $row['name']; ?></li>
                            <?php } ?>
                        </ul>
                    </td>
                <?php } ?>
                <?php if ($val['kepesertaan'] == 'individu') { ?>
                    <td><?= $val['nama_fakultas']; ?></td>
                <?php } else { ?>
                    <?php $anggota = $this->M_prestasi->getNamaAnggota($val['id_prestasi'])
                    ?>
                    <td>
                        <ul>
                            <?php foreach ($anggota as $row) { ?>
                                <li><?= $row['nama_fakultas']; ?></li>
                            <?php } ?>
                        </ul>
                    </td>
                <?php } ?>
                <td><?= $val['nama_pembimbing'] ?></td>
                <td><?= $val['nama_kegiatan'] ?></td>
                <td><?= $val['kota'] ?></td>
                <td><?= $val['jml_dana'] ?></td>
                <td><?= $val['tahun'] ?></td>
                <td><?= $val['nama_jenis'] ?></td>
                <td><?= $val['nama_tingkat'] ?></td>
                <td><?= $val['nama_jenis_juara'] ?></td>
                <td><?= $val['tgl_mulai'] ?></td>
                <td><?= $val['tgl_selesai'] ?></td>
                <td><?= $val['ket_prestasi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>