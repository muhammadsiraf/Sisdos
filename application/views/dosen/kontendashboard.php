
<script type="text/javascript" src="<?php echo base_url("assets/js/chartjs/Chart.js")?>"></script>

<?php

$nama_label="nilai kredit skp";
$nilai_label=[];
$label=[];
$background=[];
$border=[];
$type="bar";
$border_width=1;
$data_grafik=[];
foreach($data_tridharma as $data)
{
	array_push($nilai_label,$data->nilai_kredit_skp);

	$label_nama="$data->tahun_ajaran/$data->semester";

	array_push($label,$label_nama);
	$warna_rand_1= rand (0,255);
	$warna_rand_2= rand (0,255);
	$warna_rand_3= rand (0,255);
	$warna_rand_4= rand (0,255);
	$background_warna="rgba($warna_rand_1, $warna_rand_2, $warna_rand_3, $warna_rand_4)";
	array_push($background,$background_warna);
	$warna_rand_1= rand (0,255);
	$warna_rand_2= rand (0,255);
	$warna_rand_3= rand (0,255);
	$warna_rand_4= rand (0,255);
	$border_warna="rgba($warna_rand_1, $warna_rand_2, $warna_rand_3, $warna_rand_4)";
	array_push($border,$border_warna);

}

$type="bar";
$border_width=1;
$isi_data=$nilai_label;
$data_grafik['label']=$label;
$data_grafik['nama_label']=$nama_label;
$data_grafik['background']=$background;
$data_grafik['border']=$border;
$data_grafik['type']=$type;
$data_grafik['border_width']=$border_width;
$data_grafik['isi_data']=$isi_data;

?>


<h5>

<?php

	// echo var_dump($data_grafik);

?>

</h5>
<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">

			</div>
			<div class="col-xl-3 col-sm-6 mb-3">

			</div>
			<div class="col-xl-3 col-sm-6 mb-3">

			</div>
			<div class="col-xl-3 col-sm-6 mb-3">

			</div>
</div>



		<h1><?php $statuslogin=$this->session->userdata('nama');
		$dosen=$this->session->userdata('dosen');
		
		?></h1>
		<div class="row">
			<div class="col-lg">
				<div class="card">
					<h5 class="card-header">Grafik Kredit SKP Setiap Semester</h5>
					<div class="card-body">
						<h5>Grafik</h5>
						
    						<div style="width: 1000px;height: 700px">
   							   <canvas id="grafikSKP"></canvas>
   							</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		

		<script>
      var grafik_bar=<?php echo json_encode($data_grafik, JSON_PRETTY_PRINT)?>;
      var ctx = document.getElementById("grafikSKP").getContext("2d");
      var chart = new Chart(ctx, {
        type: grafik_bar.type,
        data: {
          labels: grafik_bar.label,
          datasets: [
            {
              label: grafik_bar.nama_label,
              data: grafik_bar.isi_data,
              backgroundColor: grafik_bar.background,
              borderColor: grafik_bar.border,
              borderWidth: grafik_bar.border_width
            }
          ]
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true
                }
              }
            ]
          }
        }
      });
    </script>
</div>