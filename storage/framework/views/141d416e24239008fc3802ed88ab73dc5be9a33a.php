<?php $page = 'Create Jabatan' ?>
<?php $root = 'jabatan' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('jabatan')); ?>">Jabatan</a> > <a href="<?php echo e(url('jabatan','create')); ?>">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e($page); ?></div>

                <div class="panel-body">
                	<?php echo Form::open(['url'=>$root]); ?>

                    <?php echo e(csrf_field()); ?>

                            <?php $random = rand(111111,999999); ?>
                    <table class="table">
                        <tr>
                        <td><?php echo Form::label('Kode'); ?></td>
                        <td>
                            <?php echo Form::label('kode_jabatan','J-'.$random,['class'=>'form-control','disabled']); ?>

                            <?php echo Form::hidden('kode_jabatan','J-'.$random,['class'=>'form-control']); ?>

                            <div class="form-group<?php echo e($errors->has('kode_jabatan') ? ' has-error' : ''); ?>">
                			</div>
                        	<?php if($errors->has('kode_jabatan')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
	                            </span>
                        	<?php endif; ?>
                        </td>
                		</tr>
                		<tr>
                			<td><?php echo Form::label('Nama'); ?></td>
                			<td>
                			<div class="form-group<?php echo e($errors->has('nama_jabatan') ? ' has-error' : ''); ?>">
                			<?php echo Form::text('nama_jabatan',null,['class'=>'form-control','autofocus']); ?>

                			</div>
                        	<?php if($errors->has('nama_jabatan')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
	                            </span>
                        	<?php endif; ?>
                        	</td>
                		</tr>
                		<tr>
                			<td><?php echo Form::label('Tunjangan Uang'); ?></td>
                			<td>
                			<div class="form-group<?php echo e($errors->has('tunjangan_uang') ? ' has-error' : ''); ?>">
                			<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<?php echo Form::number('tunjangan_uang',null,['class'=>'form-control','id'=>'appendprepend']); ?>

								<span class="input-group-addon">.00</span>
							</div>
                			</div>
                        	<?php if($errors->has('tunjangan_uang')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('tunjangan_uang')); ?></strong>
	                            </span>
                        	<?php endif; ?>
							</td>
                		</tr>
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