<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?>
    </div>

    <div class="card mb-3">
    	<div class="card-header bg-primary text-white">
    		Filter Data Kegiatan Pegawai
    	</div>
    	<div class="card-body">
    		
    		<form class="form-inline">
    			<div class="form-group mb-2">
    				<label for="staticEmail2">Bulan: </label>
    				<select class="form-control ml-3" name="bulan">
    					<option value="">--Pilih Bulan--</option>
    					<option value="01">Januari</option>
    					<option value="02">Februari</option>
    					<option value="03">Maret</option>
    					<option value="04">April</option>
    					<option value="05">Mei</option>
    					<option value="06">Juni</option>
    					<option value="07">Juli</option>
    					<option value="08">Agustus</option>
    					<option value="09">September</option>
    					<option value="10">Oktober</option>
    					<option value="11">November</option>
    					<option value="12">Desember</option>
    				</select>
    			</div>

    			<div class="form-group mb-2 ml-5">
    				<label for="staticEmail2">Tahun: </label>
    				<select class="form-control ml-3" name="tahun">
    					<option value="">--Pilih Tahun--</option>
    					<?php $tahun = date('Y');
    					for($i=2020;$i<$tahun+5;$i++) { ?>
	    					<option value="<?php echo $i ?>"><?php echo $i ?></option>
    					<?php } ?>
    				</select>
    			</div>

                <?php 
                    if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan.$tahun;
                    }else{
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $bulan.$tahun;
                    }
                ?>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>

                <?php if(count($kegiatan) > 0) { ?>
                     <a href="<?php echo base_url('pegawai/laporanKegiatan/cetakKegiatan?bulan='.$bulan), '&tahun='.$tahun ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Cetak Laporan Kegiatan</a>
                <?php }else{ ?>
                    <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print"></i> Cetak Laporan Kegiatan</button>
                <?php } ?>

    		</form>
    	</div>
    </div>

    <?php 
    	if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
    		$bulan = $_GET['bulan'];
    		$tahun = $_GET['tahun'];
    		$bulantahun = $bulan.$tahun;
    	}else{
    		$bulan = date('m');
    		$tahun = date('Y');
    		$bulantahun = $bulan.$tahun;
    	}
     ?>

    <div class="alert alert-info">Menampilkan Data Kegiatan Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <?php 

    $jml_data = count($kegiatan);
    if($jml_data > 0) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <td class="text-center">No</td>
                <td class="text-center">Id TA</td>
                <!-- <td class="text-center">Id Pejabat</td> -->
                <td class="text-center">Nama Pegawai</td>
                <td class="text-center">Tanggal</td>
                <td class="text-center">Kegiatan</td>
                <td class="text-center">Foto Kegiatan</td>
                <td class="text-center">Keterangan</td>
            </tr>

            <?php $no=1; foreach($kegiatan as $k) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $k->id_ta ?></td>
                    <!-- <td><?php echo $k->id_pejabat ?></td> -->
                    <td><?php echo $k->nama_pegawai ?></td>
                    <td><?php echo $k->tanggal ?></td>
                    <td><?php echo $k->keg ?></td>
                    <td><?php echo $k->foto_keg ?></td>
                    <td><?php echo $k->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php }else{ ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data kegiatan masih kosong, silahkan input data kegiatan pada bulan dan tahun yang Anda pilih.</span>
    <?php } ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data Kegiatan masih kosong, silahkan input kegiatan terlebih dahulu pada bulan dan tahun yang Anda pilih.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
           

           

    