<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataPegawai/tambahData') ?>"><i class="fas fa-plus"> Tambah Pegawai</i></a>

    <table class="table table-striped table-bordered table-responsive" style="margin-bottom: 100px">
    	<tr>
    		<th class="text-center">Id TA</th>
    		<th class="text-center">Nama Pegawai</th>
    		<th class="text-center">Jenis Kelamin</th>
    		<th class="text-center">Seksi</th>
    		<th class="text-center">Tugas</th>
    		<th class="text-center">TMT</th>
    		<th class="text-center">Jabatan</th>
    		<th class="text-center">Nomor HP</th>
    		<th class="text-center">Pendidikan</th>
    		<th class="text-center">Jurusan</th>
    		<th class="text-center">Photo</th>
            <th class="text-center">Hak Akses</th>
    		<th class="text-center">Action</th>
    	</tr>

    	<?php $no=1; foreach($pegawai as $p) : ?>
    	<tr>
    		<td class="text-center"><?php echo $no++ ?></td>
    		<td><?php echo $p->nama_pegawai ?></td>
    		<td><?php echo $p->jenis_kelamin ?></td>
    		<td><?php echo $p->seksi ?></td>
    		<td><?php echo $p->tugas ?></td>
    		<td><?php echo $p->tmt ?></td>
    		<td><?php echo $p->jabatan ?></td>
    		<td><?php echo $p->no_hp ?></td>
    		<td><?php echo $p->pendidikan ?></td>
    		<td><?php echo $p->jurusan ?></td>
    		<td><img src="<?php echo base_url().'assets/photo/'.$p->photo ?>" width="75px"></td>
                <?php if($p->hak_akses=='1') { ?>
                    <td>Admin</td>
                <?php }else{ ?>
                    <td>Pegawai</td>
                <?php } ?>
    		<td>
    			<center>
    				<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/'.$p->id_ta) ?>"><i class="fas fa-edit"></i></a>
    				<a onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/'.$p->id_ta) ?>"><i class="fas fa-trash"></i></a>
    			</center>
	    	</td>
    	</tr>
    	<?php endforeach; ?>
    </table>

</div>


           

           

    