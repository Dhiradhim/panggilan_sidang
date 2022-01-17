<!DOCTYPE html>
<html lang="en">

<head>
 <!-- partial:partials/_sidebar.html -->
  <?php include('head.html');?>
<!-- partial:partials/_sidebar.html -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('navbar.html');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
			<?php include('partials/_sidebar.html'); ?>
      <!-- partial:partials/_sidebar.html -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Perkara Permohonan</h2>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>No. Perkara</th>
                          <th>Pihak</th>
                        </tr>
                      </thead>
                      <tbody>			
						<!-- QUERY -->
						<?php
							$query = mysqli_query($con, "SELECT perkara_id, nomor_perkara, para_pihak, pihak1_text FROM perkara WHERE alur_perkara_id='16' AND YEAR(tanggal_pendaftaran) = YEAR(CURDATE())ORDER BY perkara_id DESC") or die(mysqli_connect_error());
							$row = mysqli_fetch_assoc($query);
							$count = 1;
						do { ?>
							<tr>
							<?php
							$noper = $row['nomor_perkara'];
							$pecah = explode("/", $noper);
							$pecah2 = explode(".", $pecah[1]);
							$np = $pecah[0];
							$gt= $pecah2[1];
							$tahun=$pecah[2];
							$pihak=$row['pihak1_text'];
							$p=preg_split("/[0-9]+./", $pihak);
							?>
								<td><?php echo $count; ?></td>
								<td><?php echo $row['nomor_perkara']; ?></td>
								<td><?php echo $row['para_pihak']; ?></td>
								<td><button class="btn btn-success" class="butt js--triggerAnimation" onclick="responsiveVoice.speak('Assalamualaikum Warohmatuwllohi wabarokatuh, Sidang perkara nomor <?=$np?> garis miring pdt titik <?=$gt?> garis miring <?=$tahun?> garis miring p a titik k p, atas nama <?php foreach ($p as $key => $data) { echo "$data,";}?>, harap segera menuju Ruang Sidang Utama, Terima kasih.', 'Indonesian Male', {rate: 0.9}); document.getElementById('sound').play();" type="button"  value="Play">Panggil</button>
								<button class="btn btn-success" class="butt js--triggerAnimation" onclick="responsiveVoice.cancel();" type="button">Batal</button></td>
							</tr>
						<?php 
						$count++;
						} while ($row = mysqli_fetch_assoc($query)); 
						?>
						<!-- QUERY -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
		<?php include('footer.html');?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include('js.html');?>
</body>

</html>

