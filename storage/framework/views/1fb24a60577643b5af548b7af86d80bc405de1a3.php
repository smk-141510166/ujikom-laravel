<?php $page = 'Create Pegawai' ?>
<?php $root = 'pegawai' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('pegawai')); ?>">Pegawai</a> > <a href="<?php echo e(url('pegawai','create')); ?>">Create</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php echo Form::open(['url'=>$root,'enctype'=>'multipart/form-data']); ?>

        <?php echo e(csrf_field()); ?>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Data Akun</div>
                <div class="panel-body">
                    <table class="table">
                    <tr><td>
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" autofocus="">

                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('type_user') ? ' has-error' : ''); ?>">
                        <label for="type_user" class="col-md-4 control-label">Permisions</label>

                        <div class="col-md-6">
                            <?php 
                                if (Auth::user()->type_user == 'admin') {
                                    $selection = [''=>''];
                                    $selection['admin']='Admin';
                                    $selection['hrd']='HRD';
                                }
                                    $selection['bendahara']='bendahara';
                                    $selection['pegawai']='Pegawai';
                             ?>
                            <?php echo Form::select('type_user',$selection,'',['class'=>'form-control']); ?>

                            <?php if($errors->has('type_user')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('type_user')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="password" value="<?php echo e(old('password')); ?>">

                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    </td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Data Pegawai</div>
                <div class="panel-body">
                	<table class="table">
                		<tr>
                			<td><?php echo Form::label('NIP'); ?></td>
                			<td>
                			<div class="form-group<?php echo e($errors->has('nip') ? ' has-error' : ''); ?>">
                            <?php $nip = ''.rand(111,999).''.rand(111,999).''.rand(111,999).''; ?>
                            <!-- <?php echo Form::label('nip',$nip,['class'=>'form-control','min'=>'9','max'=>'9','disabled']); ?> -->
                            <?php echo Form::text('nip',$nip,['class'=>'form-control','min'=>'9','max'=>'9']); ?>

                            </div>
                        	<?php if($errors->has('nip')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('nip')); ?></strong>
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
                                <option value=""></option>
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
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Golongan'); ?></td>
                            <td>
                            <?php if(!isset($golongans->first()->id)): ?>
                            <div class="col-md-12 btn btn-danger disabled">Mohon untuk mengisi data golongan terlebih dahulu</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('golongan_id') ? ' has-error' : ''); ?>">
                            <select name="golongan_id" class="form-control">
                                <option value=""></option>
                                <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($golongan->id); ?>"><?php echo e($golongan->nama_golongan); ?></option>
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
                		<tr>
                			<td><?php echo Form::label('Foto'); ?></td>
                			<td>
                			<div class="form-group<?php echo e($errors->has('foto') ? ' has-error' : ''); ?>">
                			<div class="form-group">
                                <?php echo Form::file('foto',['class'=>'form-control']); ?>

                            </div>
                			</div>
                        	<?php if($errors->has('foto')): ?>
	                            <span class="help-block">
	                                <strong><?php echo e($errors->first('foto')); ?></strong>
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
                </div>
            </div>
        </div>
<?php echo Form::close(); ?>

    </div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.'.config('app.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>