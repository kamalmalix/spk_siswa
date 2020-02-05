<section class="content-header">
  <h1>
    Kriteria
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

        </div>
          <div class="box-body">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" class="btn btn-warning" href="#pertama">Kriteria Penilaian</a></li>
           
            <li><a data-toggle="tab" class="btn btn-warning" href="#kedua">Pembobotan</a></li>
          </ul>
    <div class="tab-content">
    <div id="pertama" class="tab-pane fade in active">
      <h3><center> Tabel Kriteria </center> </h3>
      <div class="box-body">

          <table id="tmp_modal" class="table table-bordered table-striped table-scalable" width="800px" align="center">
            <thead>
              <tr>
                <th width="30px">No.</th>
                <th style="display: none;">idu</th>
                <th width="200px">Nama kriteria</th>
                <th>Penjelasan</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
                $querykrt = mysqli_query($connect, "SELECT * FROM kriteria");
                if($querykrt == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($conn));
                }
                $no = 1;
                while ($krt = mysqli_fetch_array($querykrt)){ ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td style="display: none;"><?php echo $krt['id'];  ?></td>
                      <td><?php echo $krt['nama']; ?></td>
                      <td><?php echo $krt['jls']; ?></td>
                    </tr>
              
              <?php 
                $no++;  
                }
              ?>
            </tbody>
          </table>
          <br>
          <hr>
          <br>

          <h3 class="ui header">Tabel Tingkat Kepentingan</h3>
            <table class="table table-bordered table-striped table-scalable" width="800px">
              <thead>
                <tr>
                  <th>Nilai Numerik</th>
                  <th>Tingkat Kepentingan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="center aligned">1</td>
                  <td>Kedua elemen sama pentingnya</td>
                </tr>
                <tr>
                  <td class="center aligned">3</td>
                  <td>Elemen yang satu sedikit penting dari pada elemen yang lainnya</td>
                </tr>
                <tr>
                  <td class="center aligned">5</td>
                  <td>Elemen yang satu lebih penting dari pada yang lainnya</td>
                </tr>
                <tr>
                  <td class="center aligned">7</td>
                  <td>Satu elemen jelas lebih sangat penting dari pada lainnya </td>
                </tr>
                <tr>
                  <td class="center aligned">9</td>
                  <td>Satu elemen mutlak penting dari pada elemen lainnya</td>
                </tr>
                <tr>
                  <td class="center aligned">2, 4, 6, 8</td>
                  <td>Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan</em></td>
                </tr>
              </tbody>
            </table>
        </div>
        </div>

        <div id="kedua" class="tab-pane fade">

          <h3 class="ui header">Tabel Tingkat Kepentingan</h3>
            <table class="table table-bordered table-striped table-scalable" width="800px">
              <thead>
                <tr>
                  <th>Kriteria</th>
                  <th>Tingkat Kepentingan dari Kriteria</th>
                  <th>Kriteria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Perilaku KBM</td>
                  <td>Lebih penting dari pada</td>
                  <td>Perilaku Spiritual</td>
                </tr>
                <tr>
                  <td>Perilaku Sosial</td>
                  <td>sedikit penting dari pada</td>
                  <td>Perlaku KBM</td>
                </tr>
                <tr>
                  <td>Perilaku Sosial</td>
                  <td>jelas lebih sangat penting dari pada</td>
                  <td>Perilaku Spiritual</td>
                </tr>
              </tbody>
            </table>
            <br>
            <hr>
            <br>

          <h3>Tabel Pembobotan Kriteria (dengan AHP) </h3>
          
          <table class="table table-bordered table-striped table-scalable">
            <thead>
                    <tr>
                     
                      <td rowspan="2" align="center">Kriteria</td>
                      <td rowspan="2" align="center">KBM</td>
                      <td rowspan="2" align="center">Spiritual</td>
                      <td rowspan="2" align="center">Sosial</td>
                      <td colspan="3" align="center">Eigen</td>
                      <td rowspan="2" align="center">Rata-Rata</td>
                      
                    </tr>
            </thead>
            <tbody>
                <tr>
                 
                  <td align="center">KBM</td>
                  <td align="center">1</td>
                  <td align="center">5</td>
                  <td align="center">1/3</td>
                  <td align="center">0.238</td>
                  <td align="center">0.384</td>
                  <td align="center">0.224</td>
                  <td align="center">0.282</td>
                </tr>
                 <tr>
                 
                  <td align="center">Spiritual</td>
                  <td align="center">1/5</td>
                  <td align="center">1</td>
                  <td align="center">1/7</td>
                  <td align="center">0.047</td>
                  <td align="center">0.076</td>
                  <td align="center">0.096</td>
                  <td align="center">0.073</td>
                </tr>
                <tr>
                 
                  <td align="center">Sosial</td>
                  <td align="center">3</td>
                  <td align="center">7</td>
                  <td align="center">1</td>
                  <td align="center">0.714</td>
                  <td align="center">0.538</td>
                  <td align="center">0.679</td>
                  <td align="center">0.643</td>
                </tr>
                <tr>
                 
                  <td align="center">Jumlah</td>
                  <td align="center">4.2</td>
                  <td align="center">13</td>
                  <td align="center">1.472</td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center">1</td>
                  
                </tr>
            </tbody>
          </table>
          </div>
      
    </div>
          </div>
          </div>
    
</div><!-- /.col -->
</div><!-- /.row -->
</section>
        
