<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $p['id_user'] ?>">
    <i class="fa fa-trash">Hapus</i>
</button>
<div class="modal fade" id="Delete<?php echo $p['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
            </div>
            <div class="modal-body">

                <p class="alert alert-danger">Yakin ingin menghapus user ini?</p>

            </div>
            <div class="modal-footer">

                <a href="<?php echo base_url('admin/user/delete/' . $p['id_user']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Ya, Hapus</a>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>