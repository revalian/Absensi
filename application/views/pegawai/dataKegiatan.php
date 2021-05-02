<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('pegawai/dataKegiatan/tambahData') ?>"><i class="fas fa-plus"></i> Input Kegiatan</a>
    <table class="table table-striped table-bordered " style="margin-bottom: 100px">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id TA</th>
            <!-- <th class="text-center">Id Pejabat</th> -->
            <!-- <th class="text-center">Nama Pegawai</th> -->
            <th class="text-center">Tanggal</th>
            <th class="text-center">Kegiatan</th>
            <th class="text-center">Foto Kegiatan</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($kegiatan as $p) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td><?php echo $p->id_ta ?></td>
            <!-- <td><?php echo $p->id_pejabat ?></td> -->
            <!-- <td><?php echo $p->nama_pegawai ?></td> -->
            <td><?php echo $p->tanggal ?></td>
            <td><?php echo $p->keg ?></td>
            <td class="text-center"><img src="<?php echo base_url().'assets/photo/'.$p->foto_keg ?>" width="250px"></td>
            <td><?php echo $p->keterangan ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('pegawai/dataKegiatan/updateData/'. $p->id_tr) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Anda yakin akan menghapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('pegawai/dataKegiatan/deleteData/'.$p->id_tr) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
        <?php endforeach; ?>
         </table>


</div>


           

           

    
