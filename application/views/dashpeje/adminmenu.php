<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu"> 
  <!-- BEGIN MINI-PROFILE -->
   <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
   
  <!-- END MINI-PROFILE -->
   
    <ul>	
      <li class="start active "> <a href="<?php echo base_url(); ?>dashpeje"><i class="fa fa-print fa-fw"></i><span class="title">Barang Masuk</span>&nbsp;<span class="badge bg-red"><?php echo $jumlah?></span> </a></li>
    </ul>
    <!-- <ul>  
      <li class="start active "> <a href="<?php echo base_url(); ?>dashpeje/pindahbarang"><i class="fa fa-print fa-fw"></i><span class="title">Barang Keluar</span> <span class="badge badge-disable pull-right"></span></a> </li>
    </ul> -->
    <?php foreach ($lokasi as $loks) {?>
    <ul>  
      <li class="start active "> <a onclick="javascript:window.location.reload()" href="<?php echo base_url(); ?>dashpeje/lokasi/<?php echo $loks->IDLOKASI;?>"><i class="fa fa-key fa-fw"></i><span class="title"> <?php echo $loks->NAMALOKASI;?> </span> <span class="badge badge-disable pull-right"></span></a> </li>
    </ul>

    <?php
    }?>

  </div>
  </div>
  </div>
  </div>
  <a cetak class="cetak</a>
   <div class="cetak-widget">    
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-cetak no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
  </div>
  <!-- END SIDEBAR --> 