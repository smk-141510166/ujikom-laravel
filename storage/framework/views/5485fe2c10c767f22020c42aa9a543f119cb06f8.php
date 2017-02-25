<?php $page = 'Create Kategori Tunjangan' ?>
<?php $root = 'tunjangan' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a> > <a href="<?php echo e(url('tunjangan','create')); ?>">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e($page); ?></div>

                <div class="panel-body">
                	<?php echo Form::open(['url'=>$root]); ?>

                    <?php $random = rand(111111,999999); ?>
                    <?php echo e(csrf_field()); ?>

                    <table class="table">
                        <tr>
                            <td><?php echo Form::label('Kode'); ?></td>
                            <td>
                            <?php echo Form::label('kode_tunjangan','KT-'.$random,['class'=>'form-control','disabled']); ?>

                            <?php echo Form::hidden('kode_tunjangan','KT-'.$random,['class'=>'form-control']); ?>

                            <div class="form-group<?php echo e($errors->has('kode_tunjangan') ? ' has-error' : ''); ?>">
                            </div>
                            <?php if($errors->has('kode_tunjangan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Jabatan'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <select name="jabatan_id" class="form-control" autofocus="">
                                <option></option>
                                <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($jabatan->id); ?>"><?php echo e($jabatan->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('jabatan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Golongan'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('golongan_id') ? ' has-error' : ''); ?>">
                            <select name="golongan_id" class="form-control">
                                <option></option>
                                <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($golongan->id); ?>"><?php echo e($golongan->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('jabatan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Status'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <?php echo Form::select('status',['','Sudah Menikah'=>'Sudah Menikah','Belum Menikah'=>'Belum Menikah'],'',['class'=>'form-control']); ?>

                            </div>
                            <?php if($errors->has('status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Jumlah Anak'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('jumlah_anak') ? ' has-error' : ''); ?>">
                            <?php echo Form::number('jumlah_anak',0,['class'=>'form-control']); ?>

                            </div>
                            <?php if($errors->has('jumlah_anak')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php if(isset($_GET['errors_ilegal'])): ?>
                        <tr>
                            <td colspan="2" class="danger">Mohon isi status dengan jumlah anak dengan benar</td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                        </tr>
                		<tr>
                			<td><?php echo Form::label('Besar Uang'); ?></td>
                			<td>
                			<div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
                			<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php echo Form::number('besaran_uang',null,['class'=>'form-control','id'=>'appendprepend']); ?>

								<span class="input-group-addon">.00</span>
							</div>
                			</div>
                        	<?php if($errors->has('besaran_uang')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
	                            </span>
                        	<?php endif; ?>
							</td>
                		</tr>
                        <?php if(isset($_GET['errors_sama'])): ?>
                        <tr>
                            <td colspan="2" class="danger">Data Yang Anda Masukan Ada yang sama, silahkan lihat <a href="<?php echo e(url('tunjangan/'.$_GET['errors_sama'])); ?>">disini</a></td>
                        </tr>
                        <?php endif; ?>
                		<tr>
                			<td colspan="2" align="right"><?php echo Form::submit('Create',['class'=>'btn btn-success']); ?></td>
                		</tr>
                	</table>
                	<?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.'.config('app.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>