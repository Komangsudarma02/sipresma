<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Nama Mahasiswa</label>
        <input type="hidden" id="id" name="id_user[]" value="<?= $user['id_user']; ?>">
        <input type="text" id="name" name="id" class="form-control" value="<?= $user['name']; ?> " readonly>
    </div>
</div>
<div class="card-body">
    <div class="form-group">
        <label>Nama Kelompok</label>
        <select class="form-control id_user" id="id_user" name="id_user[]" multiple="multiple" data-placeholder="Masukkan Nama Kelompok" style="width: 100%;"></select>
    </div>
</div>