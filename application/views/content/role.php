		
<!--div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"-->
    <div id="logoutModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Pilih Role</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
			 <div class="form-group">
      <div class="alert alert-success" role="alert">
  <b><a href=<?php echo base_url('admin'); ?>><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    Administrator</a></b>
</div>
 <div class="alert alert-success" role="alert">
  <b><a href=<?php echo base_url($user['role']) ?>><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    <?php echo $user['role'] ?></a></b>
</div>
</div>
		</div>
			<div class="modal-footer">
               <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>



