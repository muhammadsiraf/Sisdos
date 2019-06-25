<h2>Simulasi Konten</h2>
<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    
                    
                    <form action="<?php echo base_url("Serdos/simulasi_serdos")?>" method="post">
                        <h5>Nilai NKP : <?php echo $nilai_nkp?></h5>
                        <input type="hidden" name="nilai_nkp" value="<?php echo $nilai_nkp?>">
                         <br>
                        <h5>Nilai NAP : <?php echo $nilai_jabatan?></h5>
                        <input type="hidden" name="nilai_nap" value="<?php echo $nilai_jabatan?>">
                         <br>

                        <hr>
                        <h5>Persepsional</h5>
                        <div class="row">
                            
                            <div class="col-sm">
                                <h5>Skor rerata 5 mahasiswa </h5>
                                <label for="">pedagogik</label> 
                                <input type="number" class="form-control" name="pedagogik_mhs" required>
                                <label for="">profesional</label> 
                                <input type="number" class="form-control" name="profesional_mhs" required>
                                <label for="">kepribadian</label>
                                <input type="number" class="form-control" name="kepribadian_mhs" required>
                                <label for="">sosial</label> 
                                <input type="number" class="form-control" name="sosial_mhs" required>
                            </div>
                            <div class="col-sm">
                                <h5>Skor rerata 3 teman sejawat </h5>
                                <label for="">pedagogik</label> 
                                <input type="number" class="form-control" name="pedagogik_teman" required>
                                <label for="">profesional</label> 
                                <input type="number" class="form-control" name="profesional_teman" required>
                                <label for="">kepribadian</label>
                                <input type="number" class="form-control" name="kepribadian_teman" required>
                                <label for="">sosial</label> 
                                <input type="number" class="form-control" name="sosial_teman" required>
                            </div>
                            <div class="col-sm">
                                <h5>Skor rerata 1 dosen yang disertifikasi </h5>
                                <label for="">pedagogik</label> 
                                <input type="number" class="form-control" name="pedagogik_dys" required>
                                <label for="">profesional</label> 
                                <input type="number" class="form-control" name="profesional_dys" required>
                                <label for="">kepribadian</label>
                                <input type="number" class="form-control" name="kepribadian_dys" required>
                                <label for="">sosial</label> 
                                <input type="number" class="form-control" name="sosial_dys" required>
                            </div>
                            <div class="col-sm">
                                <h5>Skor rerata 1 atasan langsung </h5>
                                <label for="">pedagogik</label> 
                                <input type="number" class="form-control" name="pedagogik_atasan" required>
                                <label for="">profesional</label> 
                                <input type="number" class="form-control" name="profesional_atasan" required>
                                <label for="">kepribadian</label>
                                <input type="number" class="form-control" name="kepribadian_atasan" required>
                                <label for="">sosial</label> 
                                <input type="number" class="form-control" name="sosial_atasan" required>
                            </div>
                        </div>
                        <hr>
                        <hr>

                        <h5>Deskripsi Diri</h5>
                        <h5>Rerata Nilai dari 2 Asesor</h5>
                        <div class="row">
                            <div class="col-6">
                                <h5>Perkembangan Kualitas </h5>          
                                <label for="">Usaha Kreatif</label>
                                <input type="number" class="form-control" name="des_1" required>
                                <label for="">Dampak Perubahan</label>
                                <input type="number" class="form-control" name="des_2" required>
                                <label for="">Kedisiplinan</label>
                                <input type="number" class="form-control" name="des_3" required>
                                <label for="">Keteladanan</label>
                                <input type="number" class="form-control" name="des_4" required>
                                <label for="">Keterbukaan terhadap kritik</label>
                                <input type="number" class="form-control" name="des_5" required>      
                            </div>
                            <div class="col-6">
                                <h5>Perkembangan Keilmuan dan Keahlian</h5>
                                <label for="">Publikasi Karya Ilmiah</label>
                                <input type="number" class="form-control" name="des_6" required>
                                <label for="">Makna dan kegunaan</label>
                                <input type="number" class="form-control" name="des_7" required>
                                <label for="">Usaha Inovatif</label>
                                <input type="number" class="form-control" name="des_8" required>
                                <label for="">Konsistensi</label>
                                <input type="number" class="form-control" name="des_9" required>
                                <label for="">Target Kerja</label>
                                <input type="number" class="form-control" name="des_10" required>
                        
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6">

                                <h5>Pengabdian kepada Masyarakat </h5>        
                                <label for="">Kegiatan PKM</label>
                                <input type="number" class="form-control" name="des_11" required>
                                <label for="">Dampak Perubahan</label>
                                <input type="number" class="form-control" name="des_12" required>
                                <label for="">Dukungan Masyarakat</label>
                                <input type="number" class="form-control" name="des_13" required>
                                <label for="">Kemampuan Berkomunikasi</label>
                                <input type="number" class="form-control" name="des_14" required>

                            </div>

                            <div class="col-6">

                                 <h5>Manajemen Pengolaan Institusi</h5>
                                <label for="">Kemampuan Kerjasama</label>
                                <input type="number" class="form-control" name="des_15" required>
                                <label for="">Implementasi Kegiatan dari usulan/pemikiran</label>
                                <input type="number" class="form-control" name="des_16" required>
                                <label for="">Dukungan Institusi</label>
                                <input type="number" class="form-control" name="des_17" required>
                                <label for="">Kendali diri</label>
                                <input type="number" class="form-control" name="des_18" required>
                                <label for="">Tanggung jawab</label>
                                <input type="number" class="form-control" name="des_19" required>
                                <label for="">Keteguhan pada Prinsip </label>
                                <input type="number" class="form-control" name="des_20" required>   

                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">

                                <h5>Peningkatan kualitas kegiatan mahasiswa</h5>
                                <label for="">Peran pada Kegiatan Kemahasiswaan</label>
                                <input type="number" class="form-control" name="des_21" required>
                                <label for="">Implementasi Peran</label>
                                <input type="number" class="form-control" name="des_22" required>
                                <label for="">Interaksi dengan Mahasiswa</label>
                                <input type="number" class="form-control" name="des_23" required>
                                <label for="">Manfaat Kegiatan</label>
                                <input type="number" class="form-control" name="des_24" required>
                        
                            </div>
                        </div>

                        <hr>
                        <hr>

                        <div class="row">
                            <div class="col">
                                <h5>Nilai Toep</h5>
                                <input type="number" class="form-control" name="toep" required>
                                <br>
                                <h5>Nilai TPA</h5>
                                <input type="number" class="form-control" name="tpa" required>
                            </div>
                        </div>

                        <br>

                        <button class="btn btn-success" type="submit">Simulasikan</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php 
    if(isset($hasil_simulasi)){?>
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                             <h5>Hasil Simulasi</h5> 
                             <h5>Penilaian Persepsional : <?php echo $hasil_simulasi['penilaian_persepsional']?></h5>
                             <h5>Penilaian Personal : <?php echo $hasil_simulasi['penilaian_deskripsi']?></h5>
                             <h5>Nilai Konsistensi : <?php echo $hasil_simulasi['penilaian_konsistensi']?></h5>
                             <h5>Nilai Gabungan : <?php echo $hasil_simulasi['penilaian_gabungan']?></h5>
                             <h5>Hasil Simulasi : <?php echo $hasil_simulasi['lulus_simulasi']?></h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>

<br>