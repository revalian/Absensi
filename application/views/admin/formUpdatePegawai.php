<div class="container-fluid" style="margin-bottom: 100px">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
    		

        <?php foreach ($pegawai as $p): ?>
    		<form method="POST" action="<?php echo base_url('admin/dataPegawai/updateDataAksi') ?>" enctype="multipart/form-data">
    			
    			<div class="form-group">
    				<label>Nama Pegawai</label>
                    <input type="hidden" name="id_ta" class="form-control" value="<?php echo $p->id_ta ?>">
    				<input type="text" name="nama_pegawai" class="form-control" value="<?php echo $p->nama_pegawai ?>">
    				<?php echo form_error('nama_pegawai','<div class="text-small text danger"></div>') ?>
    			</div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $p->username ?>">
                    <?php echo form_error('username','<div class="text-small text danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $p->password ?>">
                    <?php echo form_error('password','<div class="text-small text danger"></div>') ?>
                </div>

    			<div class="form-group">
    				<label>Jenis Kelamin</label>
    				<select name="jenis_kelamin" class="form-control">
	    				<option value="<?php echo $p->jenis_kelamin ?>"><?php echo $p->jenis_kelamin ?></option>
	    				<option value="Pria">Pria</option>
	    				<option value="Wanita">Wanita</option>
	    			</select>
	    			<?php echo form_error('jenis_kelamin','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Seksi</label>
    				<select  name="seksi" class="form-control">
	    				<option value="<?php echo $p->seksi ?>"><?php echo $p->seksi ?></option>
	    				<option value="E-Government">E-Goverment</option>
	    				<option value="Infrastruktur">Infrastruktur</option>
	    				<option value="SKDI">SKDI</option>
	    			</select> 
	    			<?php echo form_error('seksi','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Tugas</label>
    				<input type="text" name="tugas" class="form-control" value="<?php echo $p->tugas ?>">
    				<?php echo form_error('tugas','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>TMT</label>
    				<input type="date" name="tmt" class="form-control" value="<?php echo $p->tmt ?>">
    				<?php echo form_error('tmt','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Jabatan</label>
    				<input type="text" name="jabatan" class="form-control" value="<?php echo $p->jabatan ?>">
    				<?php echo form_error('jabatan','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Nomor HP</label>
    				<input type="number" name="no_hp" class="form-control" value="<?php echo $p->no_hp ?>">
    				<?php echo form_error('no_hp','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Pendidikan</label>
    				<input type="text" name="pendidikan" class="form-control" value="<?php echo $p->pendidikan ?>">
    				<?php echo form_error('pendidikan','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Jurusan</label>
    				<input type="text" name="jurusan" class="form-control" value="<?php echo $p->jurusan ?>">
    				<?php echo form_error('jurusan','<div class="text-small text danger"></div>') ?>
    			</div>

    			<div class="form-group">
    				<label>Photo</label>
    				<input type="file" name="photo" class="form-control" value="<?php echo $p->photo ?>">
    				<?php echo form_error('photo','<div class="text-small text danger"></div>') ?>
    			</div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="<?php echo $p->hak_akses ?>">
                            <?php if ($p->hak_akses=='1') {
                                echo "Admin";
                            }else{
                                echo "Pegawai";
                            } ?>
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                </div>

    			<button type="submit" class="btn btn-primary">Simpan</button>
    		</form>
        <?php endforeach; ?>

    	</div>
    </div>


</div>


           

           

    