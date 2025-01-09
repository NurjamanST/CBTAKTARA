<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
		<div class="row">
   <!--     	<div class="col-sm-4">-->
				<!--<button type="button" onclick="bulk_delete()" class="btn btn-flat btn-sm bg-red"><i class="fa fa-trash"></i> Bulk Delete</button>-->
			<!--	<a href="<?php echo site_url('link/add') ?>" class="btn btn-flat btn-sm bg-red"><i class="fa fa-add"></i> Bulk Delete</a>-->
			<!--</div>-->
			<!--<div class="form-group col-sm-4 text-center">-->
			<!--	<?php if ( $this->ion_auth->is_admin() ) : ?>-->
			<!--		<select id="matkul_filter" class="form-control select2" style="width:100% !important">-->
			<!--			<option value="all">Semua Matkul</option>-->
			<!--			<?php foreach ($matkul as $m) :?>-->
			<!--				<option value="<?=$m->id_matkul?>"><?=$m->nama_matkul?></option>-->
			<!--			<?php endforeach; ?>-->
			<!--		</select>-->
			<!--	<?php endif; ?>-->
			<!--	<?php if ( $this->ion_auth->in_group('dosen') ) : ?>				-->
			<!--		<input id="matkul_id" value="<?=$matkul->nama_matkul;?>" type="text" readonly="readonly" class="form-control">-->
			<!--	<?php endif; ?>-->
			<!--</div>-->
			<!--<div class="col-sm-4">-->
			<!--	<div class="pull-right">-->
			<!--		<a href="<?=base_url('soal/add')?>" class="btn bg-purple btn-flat btn-sm"><i class="fa fa-plus"></i> Buat Soal</a>-->
			<!--		<button type="button" onclick="reload_ajax()" class="btn btn-flat btn-sm bg-maroon"><i class="fa fa-refresh"></i> Reload</button>-->
			<!--	</div>-->
			<!--</div>-->
		</div>
    </div>
	<?=form_open('soal/delete', array('id'=>'bulk'))?>
    <div class="table-responsive px-4 pb-3" style="border: 0">
        <table id="soal" class="w-100 table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="25">No.</th>
				<th>Link Zoom</th>
				<th>Link Penugasan</th>
				<th class="text-center">Aksi</th>
            </tr>        
        </thead>
        <tbody>
            <?php 
                $no=1;
                foreach($matkul as $row) :
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><a href="<?php echo $row->zoom ?>" target="_blank"><?php echo $row->zoom ?></a></td>
                <td><a href="<?php echo $row->penugasan ?>" target="_blank"><?php echo $row->penugasan ?></a></td>
                <td>
                    <a href="<?php echo site_url('link/edit/'. $row->id) ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
	<?=form_close();?>
</div>