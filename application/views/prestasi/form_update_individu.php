<div class="card-body">
    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <select class="form-control id_user" name="id_user">
            <?php
            foreach ($name as $val) { ?>
                <option <?= ($id_prestasi['id_user'] == $val['id_user']) ? 'selected' : ''; ?> value="<?= $val['id_user']; ?>"><?= $val['name']; ?></option> <?php } ?>
        </select>
    </div>
</div>