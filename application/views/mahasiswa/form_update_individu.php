<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Mahasiswa</label>
        <input type="hidden" id="id" name="id_user[]" value="<?= $user['id_user']; ?>">
        <input type="text" id="name" name="id" class="form-control" value="<?= $user['name']; ?> " readonly>
    </div>
</div>