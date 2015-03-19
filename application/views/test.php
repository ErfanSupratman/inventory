<html>
	<style>
		th{
			text-align: center;
		}
		td{
			text-align: center;
		}
	</style>
	<?php
		if(!function_exists('indonesian_date')){
			function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') 
			{
			    if (trim ($timestamp) == '')
			    {
			            $timestamp = time ();
			    }
			    elseif (!ctype_digit ($timestamp))
			    {
			        $timestamp = strtotime ($timestamp);
			    }
			    # remove S (st,nd,rd,th) there are no such things in indonesia :p
			    $date_format = preg_replace ("/S/", "", $date_format);
			    $pattern = array (
			        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
			        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
			        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
			        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
			        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
			        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
			        '/April/','/June/','/July/','/August/','/September/','/October/',
			        '/November/','/December/',
			    );
			    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
			        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
			        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
			        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
			        'Oktober','November','Desember',
			    );
			    $date = date ($date_format, $timestamp);
			    $date = preg_replace ($pattern, $replace, $date);
			    $date = "{$date} {$suffix}";
			    return $date;
			}	
		}
	?>
	<div align="center">
		<table width='100%' >
			<tr>
				<td colspan="3">
					<div align="left">
						<p>
							DEPARTEMEN PENDIDIKAN NASIONAL<br/>
							INSTITUT TEKNOLOGI SEPULUH NOPEMBER<br/>
							KAMPUS ITS KEPUTIH SUKOLILO SURABAYA<br/>
						</p>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<img width="100" src="<?php echo base_url().'assets/logo.png'?>"/>
				</td>
				<td>
					<div align="center">
						<p style="font-size:20px">
							<b>DAFTAR INVENTARIS RUANGAN</b><br/>
							Jurusan Teknik Informatika - FTIf
							<br/>
						</p>
						<p style="font-size:13px">
							NOMOR RUANG	: <?php echo $ruangan[0]->KODELOKASI;?><br/>
							NAMA RUANG	: <?php echo $ruangan[0]->NAMALOKASI;?><br/>
						</p>
					</div>
				</td>
				<td>
					<div align="right">
						<b style="font-size:22px"><?php echo indonesian_date('','F','');?></b><br/>
						<b style="font-size:30px">Th. <?php echo indonesian_date('','Y','');?></b>
					</div>
				</td>
			</tr>
		</table>	
		<div align="center">
			<table border="1" cellpadding="0" cellspacing="0" width="100%" style="margin:0;padding:0;border-collapse:collapse">
			 <tr>
			  <th rowspan="2">
			  	No
			  </th>
			  <th colspan="4">
			  	Sub-sub Kelompok
			  </th>
			  <th rowspan="2">
			  	No. Urut Pendaft
			  </th>
			  <th rowspan="2">
				  Jml Barang/ Volume
			  </th>
			  <th rowspan="2">
				  Harga Barang
			  </th>
			  <th colspan="3">
			  	Kondisi (jumlah)
			  </th>
			  <th rowspan="2">
			  	Keterangan
			  </th>
			 </tr>
			 <tr>
			  <th>
			  	Nama Barang
			  </th>
			  <th>
				  Kode Barang
			  </th>
			  <th>
			  	Tipe/ Merk
			  </th>
			  <th>
			  	Thn. Perolehan
			  </th>
			  <th>
			  	B
			  </th>
			  <th>
			  	RR
			  </th>
			  <th>
			  	RB
			  </th>
			 </tr>
			 <?php $i = 1;
			 foreach ($data as $key => $value) :?>
			 <tr>
			 	<td><?php echo $i++; ?></td>
			 	<td><?php echo $value->NAMABARANG; ?></td>
			 	<td><?php echo $value->KODEBARANG; ?></td>
			 	<td><?php echo $value->MERKBARANG; ?></td>
			 	<td><?php echo $value->TAHUN; ?></td>
			 	<td></td>
			 	<td><?php echo $value->JUMLAHBARANG; ?> </td>
			 	<td><?php echo $value->HARGABARANG; ?> </td>
			 	<td><?php echo ($value->IDKONDISI == 1)*$value->JUMLAHBARANG; ?></td>
			 	<td><?php echo ($value->IDKONDISI == 2)*$value->JUMLAHBARANG; ?></td>
			 	<td><?php echo ($value->IDKONDISI == 3)*$value->JUMLAHBARANG; ?></td>
			 	<td></td>
			 </tr>
			<?php endforeach;?>
			</table>
			<br/><br/>
			<table width='100%' >
			<tr>
				<td><br/>
					Petugas Inventaris Jurusan<br/><br/><br/><br/><br/><br/>
					<b><u>Murdiono</u></b><br/>
					<b><u>NIP. 198110126 200501 1 003</u></b>
				</td>
				<td>
					<br/>
					Penanggung Jawab Ruangan<br/><br/><br/><br/><br/><br/>
					<b><u><?php echo $ruangan[0]->PJ; ?></u></b><br/>
					<b><u>NIP. <?php echo $ruangan[0]->NIP_PJ;?></u></b>
				</td><td>
					Mengetahui<br/>
					SekJur. Teknik Informatika<br/><br/><br/><br/><br/><br/>
					<b><u>Dwi Sunaryono, S.Kom., M.Kom.</u></b><br/>
					<b><u>NIP. 19720528 199702 1 001</u></b>
				</td>
			</tr>
		</table>
		</div>
	</div>
	<p>
		<br/><b>Keterangan: B=Baik, RR=Rusak Ringan, RB=Rusak Berat</b>
	</p>
	<table border="1" align="center">
			<tr>
				<td>
					<b>Perhatian:</b> Apabila memindahkan barang-barang Inventaris yang ada diruangan ini <br>harap memberitahu <b><u>Penanggung jawab ruangan / Petugas Inventaris</u></b>
				</td>
			<tr>
		</table>
</html>