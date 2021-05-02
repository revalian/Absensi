<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <div class="card" style="width: 60%">
    	<div class="card-body">
    		
            <?php foreach ($jabatan as $j): ?>
    		<form method="POST" action="<?php echo base_url('admin/dataJabatan/updateDataAksi') ?>">

    			<div class="form-group">
	    			<label>Nama Pegawai</label>
                    <input type="hidden" name="id_pejabat" class="form-control" value="<?php echo $j->id_pejabat ?>">
	    			<input type="text" name="nama" class="form-control" value="<?php echo $j->nama ?>">
	    			<?php echo form_error('nama','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
	    			<label>Id Jabatan</label>
	    			<input type="text" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
	    			<?php echo form_error('id_jabatan','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
	    			<label>Golongan</label>
	    			<input type="text" name="golongan" class="form-control" value="<?php echo $j->golongan ?>">
	    			<?php echo form_error('golongan','<div class="text-small text danger"></div>') ?>
    			</div>


    			<button type="submit" class="btn btn-success" style="margin-bottom: 70px">Update</button>

    		</form>
            <?php endforeach; ?>
    	</div>
    </div>
</div>

