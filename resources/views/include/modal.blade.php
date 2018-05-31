<div class="modal fade" id="modal-investasi" role="dialog">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('add_kategori') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
      <div class="modal-content" style="background-color: #a7a5a5;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Tambah Kategori</strong></h4>
        </div>
        <div class="modal-body">
          <select name="kategori">
            <option value="1">Pemasukan</option>
            <option value="2">Pengeluaran</option>
          </select>
          <input name="nama_kategori" placeholder="Nama Kategori" type="text">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-success pull-right" id="add_kategori" value="Tambah">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="investasi_sukses" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>INVESTASI SUKSES</strong></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
