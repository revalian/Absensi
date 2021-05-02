<div class="container-fluid" style="margin-bottom: 100px">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
    		
    		<form method="POST" action="<?php echo base_url('pegawai/dataKegiatan/tambahDataAksi') ?>"    enctype="multipart/form-data">
                <input type="hidden" name="id_ta" class="form-control" value="<?= $id_ta;?>">
    			<div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" value="<?= $nama_pegawai;?>" readonly>
                    <?php echo form_error('nama','<div class="text-small text danger"></div>') ?>
                </div>
                
                

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" name="tanggal" class="form-control" value="<?= date('Y-m-d');?>" readonly>
                    <?php echo form_error('tanggal','<div class="text-small text danger"></div>') ?>
                </div>

    			<div class="form-group">
    				<label>Kegiatan</label>
    				<input type="text" name="kegiatan" class="form-control">
                    <?php echo form_error('kegiatan','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Foto Kegiatan</label>
    				<input type="file" name="foto_keg" class="form-control">
                    <?php echo form_error('foto_keg','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Keterangan</label>
    				<input type="text" name="keterangan" class="form-control">
                    <?php echo form_error('keterangan','<div class="text-small text danger"></div>') ?>
    			</div>


    			<button type="submit" class="btn btn-primary">Save</button>
    		</form>

    	</div>
    </div>
    
</div>


           

           

    