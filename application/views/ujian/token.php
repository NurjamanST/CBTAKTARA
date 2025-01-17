<div class="callout callout-info">
    <h4>Peraturan Ujian!</h4>
    <p>Assalamualaikum wr wb
        Soal sebanyak <?=$ujian->jumlah_soal?> soal pilihan ganda, waktu yang diberikan <?=$ujian->waktu?> menit.
        silahkan masukan Token <b class="btn-sm btn-warning"><?=$ujian->token?></b> yang di dapatkan dari guru/asessor/help desk. untuk mengikuti atau memulai sesi ujian.
    </p><br>
    <ul>
        <li>Klik Ragu untuk menandai jawaban anda yang masih diragukan</li>
        <li>Klik lanjut untuk menjawab soal selanjutnya</li>
        <li>klik Prev bila ada jawaban yang ingin anda periksa kembali</li>
        <li>Klik selesai untuk mengakhiri sesi ujian anda</li>
    </ul><br>
    <p>Semoga Berhasil, Jangan Lupa Berdoa.</p> <br>
    <h6>Regards,</h6>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Konfirmasi Data</h3>
    </div>
    <div class="box-body">
        <span id="id_ujian" data-key="<?=$encrypted_id?>"></span>
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?=$mhs->nama?></td>
                    </tr>
                    <tr>
                        <th>Assessor</th>
                        <td><?=$ujian->nama_dosen?></td>
                    </tr>
                    <tr>
                        <th>Kelas/Jurusan</th>
                        <td><?=$mhs->nama_kelas?> / <?=$mhs->nama_jurusan?></td>
                    </tr>
                    <tr>
                        <th>Nama Ujian</th>
                        <td><?=$ujian->nama_ujian?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Soal</th>
                        <td><?=$ujian->jumlah_soal?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td><?=$ujian->waktu?> Menit</td>
                    </tr>
                    <tr>
                        <th>Terlambat</th>
                        <td>
                            <?=strftime('%d %B %Y', strtotime($ujian->terlambat))?> 
                            <?=date('H:i:s', strtotime($ujian->terlambat))?>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align:middle">Token</th>
                        <td>
                            <input autocomplete="off" id="token" placeholder="Token" type="text" class="input-sm form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="box box-solid">
                    <div class="box-body pb-0">
                        <div class="callout callout-info">
                            <p>
                                Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau.
                            </p>
                        </div>
                        <?php
                        $mulai = strtotime($ujian->tgl_mulai);
                        $terlambat = strtotime($ujian->terlambat);
                        $now = time();
                        if($mulai > $now) : 
                        ?>
                        <div class="callout callout-success">
                            <strong><i class="fa fa-clock-o"></i> Ujian akan dimulai pada</strong>
                            <br>
                            <span class="countdown" data-time="<?=date('Y-m-d H:i:s', strtotime($ujian->tgl_mulai))?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br/>
                        </div>
                        <?php elseif( $terlambat > $now ) : ?>
                        <button id="btncek" data-id="<?=$ujian->id_ujian?>" class="btn btn-success btn-lg mb-4">
                            <i class="fa fa-pencil"></i> Mulai
                        </button>
                        <div class="callout callout-danger">
                            <i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?=date('Y-m-d H:i:s', strtotime($ujian->terlambat))?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br/>
                            Batas waktu menekan tombol mulai.
                        </div>
                        <?php else : ?>
                        <div class="callout callout-danger">
                            Waktu untuk menekan tombol <strong>"MULAI"</strong> sudah habis.<br/>
                            Silahkan hubungi Help Desk anda untuk bisa mengikuti ujian pengganti.
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/dist/js/app/ujian/token.js"></script>