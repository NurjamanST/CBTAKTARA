<!-- Section Admin -->
<?php if( $this->ion_auth->is_admin() ) : ?>
    <div class="row">
        <?php foreach($info_box as $info) : ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-<?=$info->box?>">
            <div class="inner">
                <h3><?=$info->total;?></h3>
                <p><?=$info->title;?></p>
            </div>
            <div class="icon">
                <i class="fa fa-<?=$info->icon?>"></i>
            </div>
            <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Section Dosen -->
    <?php elseif( $this->ion_auth->in_group('dosen') ) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Akun</h3>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>Nama</th>
                        <td><?=$dosen->nama_dosen?></td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td><?=$dosen->nip?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$dosen->email?></td>
                    </tr>
                    <tr>
                        <th>Mata Kuliah</th>
                        <td><?=$dosen->nama_matkul?></td>
                    </tr>
                    <tr>
                        <th>Daftar Kelas</th>
                        <td>
                            <ol class="pl-4">
                            <?php foreach ($kelas as $k) : ?>
                                <li><?=$k->nama_kelas?></li>
                            <?php endforeach;?>
                            </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="box box-solid">
                
            </div>
        </div>
    </div>

    <!-- Section Mahasiswa -->
    <?php else : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Akun</h3>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>NIS</th>
                        <td><?=$mahasiswa->nim?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?=$mahasiswa->nama?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?=$mahasiswa->jenis_kelamin === 'L' ? "Laki-laki" : "Perempuan" ;?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$mahasiswa->email?></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td><?=$mahasiswa->nama_jurusan?></td>
                    </tr>
                    <tr>
                        <th>Sekolah</th>
                        <td><?=$mahasiswa->nama_kelas?></td>
                    </tr>
                    <tr>
                        <th>Help Desk yang bisa dihubungi</th>
                        <?php 
                        if($mahasiswa->jurusan_id === '8' & $mahasiswa->kelas_id === '16')
                            {
                                echo "<td>(+62 853-1914-7064) <br>Willy Muhammad Fauzi</td>";
                            }else{
                                echo "<td>(+62 895-3567-41241) <br>Mohammad Restu Johansyah</td>";
                            }
                        ?>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="box box-default">
                <div class="box-header with-border">
                <i class="fa fa-bullhorn"></i>

                <h3 class="box-title">Pemberitahuan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="callout callout-info">
                    <h4>Jika sudah selesai mengikuti ujian, silahkan klik link zoom dan penugasan dibawah!</h4>

                    <p>Link zoom : <a href="<?php echo $link->zoom ?>" target="_blank">klik disni</a></p>
                    <p>Link penugasan : <a href="<?php echo $link->penugasan ?>" target="_blank">klik disni</a></p>
                </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-sm-8">
            <div class="box box-solid">
            <?php if($mahasiswa->nama_kelas === 'SMK ISLAM CIPASUNG'){ ?>
                <div class="box-header bg-purple">
                    <h3 class="box-title">Pemberitahuan</h3>
                </div>
                <div class="box-body">
                <p>
                Untuk Sesi Wawancara, silahkan download jadwal yang sudah d sediakan. Selanjutnya hubungi penguji melalui link d bawah sesuai dengan jadwal wawancara masing-masing . 
        Silahkan perkenalkan diri anda, Jurusan dan Asal sekolah.
                </p>
                    <p>Penguji :</p>
                        <ul class="pl-4">
                    <li>Dewanto Rosian Adhy, MT. <a href="https://api.whatsapp.com/send?phone=+62 818-0217-6367">(Klik disini untuk memulai wawancara!)</a></li>
                    <li>Siti Maesaroh, ST., M.Kom. <a href="https://api.whatsapp.com/send?phone=+62 813-1361-8172">(Klik disini untuk memulai wawancara!)</a></li>  
                        </ul>
                <p><a href="<?php echo base_url().'Dashboard/lakukan_download' ?>">Download file Jadwal Wawancara</a></p>
                
                <p>Help Desk : +62 831-7611-3533 (Rudi Hermawan) </p>
                <p>Help Desk : +62 853-2010-4745 (Asep Mustopa) </p>
                
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>