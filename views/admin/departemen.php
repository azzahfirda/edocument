<?php echo $data['header']; ?>
<?php echo $data['sidebarleft']; ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Daftar Departemen</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <hr>
            <thead>
              <tr>
                <th width="10"></th>
                <th> ID.Departemen</th>
                <th> Nama Departemen</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
foreach ($data['list'] as $list) {
    ?>
                <tr>
                  <td>
                    <input type="checkbox" />
                  </td>
                  <td>
                    <?php echo $list->iddepartemen; ?>
                  </td>
                  <td>
                    <?php echo $list->name; ?>
                  </td>
                  <td>
                    <a href="?url=admin/departemen/ubah/<?php echo $list->iddepartemen; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="?url=admin/departemen/hapus/<?php echo $list->iddepartemen; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
                <?php }?>
            </tbody>
          </table>
          <footer class="site-footer">
            <dir class="col-md-3 hidden-sm hidden-xs"></dir>
            <div class="col-md-6 col-xs-12 text-center">
              <a id="addBtn" href="/#tambahForm" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="col-md-3"></div>
          </footer>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
    <!-- /row -->
  </section>
</section>
<!--main content end-->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahForm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form action="?url=admin/departemen/tambahSimpan" method="post" class="form-horizontal style-form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Departemen</h4>
        </div>
        <div class="modal-body">
          <div class="form-panel">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Departemen</label>
              <div class="col-sm-10">
                <input name="namadepartemen" type="text" class="form-control">
              </div>
            </div>
<!--             <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Cabang Dari</label>
              <div class="col-sm-10">
                <select name="parent" class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
          <button class="btn btn-theme" type="submit">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
<a href="/#ubahForm" id="editBtn" data-toggle="modal"></a>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubahForm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form action="?url=admin/departemen/ubahSimpan" method="post" class="form-horizontal style-form">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Ubah Departemen</h4>
        </div>
        <div class="modal-body">
          <div class="form-panel">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Departemen</label>
              <div class="col-sm-10">
                <input name="namadepartemen" type="text" class="form-control" value="<?php echo $data['namadepartemen']; ?>">
              </div>
            </div>
<!--             <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Cabang Dari</label>
              <div class="col-sm-10">
                <select name="parent" class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
          <button class="btn btn-theme" type="submit">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- modal -->
<?php echo $data['footer']; ?>
<?php if (isset($data['ubahForm'])) {?>
<script>
  $(document).ready(function(){
    $('#editBtn').click();
  })
</script>
<?php }?>
<?php if (isset($data['tambahForm'])) {?>
<script>
  $(document).ready(function(){
    $('#addBtn').click();
  })
</script>
<?php }?>
<!-- <script>
    $('#btntambah').on('click',function(){
        $('#myModal').show();
    });
</script> -->
