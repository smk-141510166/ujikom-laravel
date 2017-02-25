<?php $page = 'Create Kategori Lembur' ?>
<?php $root = 'kategori_lembur' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a> > <a href="<?php echo e(url('kategori_lembur','create')); ?>">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e($page); ?></div>

                <div class="panel-body">
                	<?php echo Form::open(['url'=>$root]); ?>

                    <?php $random = rand('111111','999999'); ?>
                    <?php echo e(csrf_field()); ?>

                    <table class="table">
                        <tr>
                            <td><?php echo Form::label('Kode Kategori Lembur'); ?></td>
                            <td>
                            <?php echo Form::label('kode_lembur','KL-'.$random,['class'=>'form-control','disabled']); ?>

                			<?php echo Form::hidden('kode_lembur','KL-'.$random,['class'=>'form-control']); ?>

                            <div class="form-group<?php echo e($errors->has('kode_lembur') ? ' has-error' : ''); ?>">
                            </div>
                            <?php if($errors->has('kode_lembur')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Jabatan'); ?></td>
                            <td>
                            <?php if(!isset($jabatans->first()->id)): ?>
                            <div class="col-md-12 btn btn-danger disabled">Mohon untuk mengisi data jabatan terlebih dahulu</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <select name="jabatan_id" class="form-control">
                                <option value="">List Jabatan</option>
                                <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('jabatan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jabatan_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('golongan'); ?></td>
                            <td>
                            <?php if(!isset($golongans->first()->id)): ?>
                            <div class="col-md-12 btn btn-danger disabled">Mohon untuk mengisi data golongan terlebih dahulu</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('golongan_id') ? ' has-error' : ''); ?>">
                            <select name="golongan_id" class="form-control">
                                <option value="">List Golongan</option>
                                <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('golongan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('golongan_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php if(isset($_GET['errors_unique'])): ?>
                        <tr>
                            <td colspan="999" class="danger">
                                <span class="help-block">
                                    <strong>Pegawai dan Golongan yang sama sudah tedatar<br>silahkan check  <a href="<?php echo e(url($_GET['url'])); ?>">disini</a></strong>
                                </span>
                            </td>
                        </tr>
                        <?php endif; ?>
                		<tr>
                			<td><?php echo Form::label('Besaran uang'); ?></td>
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
                		<tr>
                			<td colspan="2" align="right">
                            <?php if(!isset($jabatans->first()->id)||!isset($golongans->first()->id)): ?>
                            <?php echo Form::submit('Create',['class'=>'btn btn-success','disabled']); ?>

                            <?php else: ?>
                            <?php echo Form::submit('Create',['class'=>'btn btn-success']); ?>

                            <?php endif; ?>
                            </td>
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