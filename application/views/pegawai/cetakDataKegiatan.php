<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
<br>
<br>
	<center>
		<h5><b>REKAP KEGIATAN HARIAN TENAGA AHLI <br>
			BIDANG PENGEMBANGAN INFORMATIKA <br>
			DISKOMINFO KAB. CILACAP</b></h5>
	</center>

	<?php 
	if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun'] !='')){
    		$bulan = $_GET['bulan'];
    		$tahun = $_GET['tahun'];
    		$bulantahun = $bulan.$tahun;
    	}else{
    		$bulan = date('m');
    		$tahun = date('Y');
    		$bulantahun = $bulan.' / '.$tahun;
    	}
	 ?>
	 <br>
	 <table>
	 	<tr>
	 		<td>NAMA</td>
	 		<td>:</td>
	 		<td><?= $nama_pegawai;?></td>
	 	</tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td><?= $jabatan;?></td>
        </tr>
	 	<tr>
	 		<td>PERIODE</td>
	 		<td>:</td>
	 		<td><?php echo $bulan.$tahun ?></td>
	 	</tr>
	 </table><br>

	 <table class="table table-bordered table-striped">
            <tr>
                <td class="text-center">No.</td>
            <!--     <td class="text-center">Nama Pegawai</td> -->
                <td class="text-center">Tanggal</td>
                <td class="text-center">Kegiatan</td>
                <td class="text-center">Keterangan</td>
            </tr>

            <?php $no=1; foreach($kegiatan as $k) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <<!-- td><?phpecho $k->nama_pegawai ?></td> -->
                    <td><?php echo $k->tanggal ?></td>
                    <td><?php echo $k->keg ?></td>
                    <td><?php echo $k->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table style="width: 100%;">
        	<tr>
        		<td style="float:left;margin-left: 50px;">
        			<p>Kepala Seksi Pengembangan E-Government</p>
        			<br>
        			<br>
        			<br>
        			<p>_______________________________________</p>
        		</td>
        		<td></td>
        		<td style="float: right;margin-right: 50px;">
        			<p>Tenaga Ahli Programmer</p>
        			<br>
        			<br>
        			<br>
        			<p>_________________________</p>
        		</td>
        	</tr>
        </table>
        <br>
        <br>
        <center>
               <h6>Mengetahui, <br>
               Kepala Bidang Pengembangan Informatika</h6>
        </center>
</body>
</html>

<script type="text/javascript">
	window.print();
</script>