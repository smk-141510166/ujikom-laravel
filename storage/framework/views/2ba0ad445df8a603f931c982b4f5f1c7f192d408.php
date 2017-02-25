<?php $page = 'Create Tunjangan Pegawai' ?>
<?php $root = 'tunjangan_pegawai' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Pegawai</a> > <a href="<?php echo e(url('tunjangan_pegawai','create')); ?>">Create</a>
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

                	<table class="table">
                            <?php if(isset($check)): ?>
                        <tr>
                            <td>Pilih tunjangan yang berkaitan</td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo e($pegawai->id); ?>">
                        <input type="hidden" name="pegawai_id" value="<?php echo e($pegawai->id); ?>">
                        <tr>
                            <td>
                                <div class="form-group<?php echo e($errors->has('kode_tunjangan_id') ? ' has-error' : ''); ?>">
                                    <select name="kode_tunjangan_id" class="form-control">
                                        <?php $__currentLoopData = $check; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->status); ?> <?php if ($data->jumlah_anak == 0) {} else{echo 'jumlah anak '.$data->jumlah_anak;} ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                            <?php if(!isset($check->first()->id)): ?>
                            <?php echo Form::submit('Create',['class'=>'btn btn-success','disabled']); ?>

                            <?php else: ?>
                            <?php echo Form::submit('Create',['class'=>'btn btn-success']); ?>

                            <?php endif; ?>
                            </td>
                        </tr>
                            <?php else: ?>
                        <tr>
                            <td><?php echo Form::label('pegawai'); ?></td>
                            <td>
                            <?php if(!isset($pegawais->first()->id)): ?>
                            <div class="btn btn-block btn-danger disabled">Table Pegawai is Null</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('pegawai_id') ? ' has-error' : ''); ?>">
                            <select name="id" class="form-control">
                                <option></option>
                                <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($pegawai->id); ?>"><?php echo e($pegawai->user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if(isset($error_ktnf)): ?>
                            <span class="help-block">
                                    <strong>Pegawai ini tidak memiliki tunjangan yang sesuai dengan jabatan dan golongannya</strong><br>
                                    <strong>Silahkan untuk membuatnya <a href="<?php echo e(url('tunjangan','create')); ?>">disini</a></strong>
                            </span>
                            <?php endif; ?>
                            <?php if($errors->has('pegawai_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('pegawai_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                            <?php endif; ?>
                        <tr>
                            <td colspan="2" align="right">
                            <?php if(!isset($pegawais->first()->id)): ?>
                            <?php echo Form::submit('Next',['class'=>'btn btn-success','disabled']); ?>

                            <?php else: ?>
                            <?php echo Form::submit('Next',['class'=>'btn btn-success']); ?>

                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                        
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