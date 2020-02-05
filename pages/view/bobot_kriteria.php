<?php 
	include('../models/koneksi.php');
	include('../models/fungsi.php');
 ?>
<section class="content-header">
  <h1>
    Pembobotan Kriteria
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
    <div class="col-xs-12">
     	<div class="box">
        <div class="box-header">

        </div>

		<?php showTabelPerbandingan('kriteria','kriteria'); ?>

		</div>
	</div>
	</div>
</section>
  

