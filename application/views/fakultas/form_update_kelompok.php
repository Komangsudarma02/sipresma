<div class="card-body">
    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <select class="form-control id_user" name="id_user[]" multiple="multiple" data-placeholder="Masukkan Nama Mahasiswa" style="width: 100%;">
            <?php foreach ($prestasi as $row) { ?>
                <option selected="selected" value="<?= $row['id_user']; ?>"><?= $row['name']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>