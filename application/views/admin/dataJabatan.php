<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData') ?>"><i class="fas fa-plus"> Add Data</i></a>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-striped mt-2">
    	<tr>
    		<th class="text-center">Id Pejabat</th>
    		<th class="text-center">Nama Pegawai</th>
    		<th class="text-center">Id Jabatan</th>
    		<th class="text-center">Golongan</th>
    		<th class="text-center">Action</th>
    	</tr>
    	
    	<?php $no=1; foreach($jabatan as $j) : ?>
	    	<tr>
	    		<td class="text-center"><?php echo $no++ ?></td>
	    		<td><?php echo $j->nama ?></td>
	    		<td><?php echo $j->id_jabatan ?></td>
	    		<td><?php echo $j->golongan ?></td>
	    		<td>
	    			<center>
	    				<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/'.$j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
	    				<a onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
	    			</center>


	    		</td>
	    	</tr>
   		<?php endforeach; ?>
    </table>




</div>