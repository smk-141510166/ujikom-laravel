<?php $page = 'Create Penggajian' ?>
<?php $root = 'penggajian' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url($root)); ?>">Penggajian</a> > <a href="<?php echo e(url($root,'create')); ?>">Create</a>
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
                        <tr>
                            <td><?php echo Form::label('pegawai'); ?></td>
                            <td>
                            <?php if(!isset($pegawais->first()->id)): ?>
                            <div class="col-md-12 btn btn-danger disabled">Table Pegawai is Null</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('id') ? ' has-error' : ''); ?>">
                            <select name="id" class="form-control" required="">
                                <option></option>
                                <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if(Auth::user()->id==$pegawai->user_id): ?>
                                <?php else: ?>
                                <option value="<?php echo e($pegawai->id); ?>"><?php echo e($pegawai->user->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($_GET['errors'])): ?>
                            <span class="help-block">
                                    <strong>Pegawai ini tidak memiliki tunjangan</strong>, 
                                    <strong>Silahkan untuk membuatnya <a href="<?php echo e(url('tunjangan_pegawai','create')); ?>">disini</a></strong>
                            </span>
                            <?php endif; ?>
                            <?php if(isset($_GET['errors_nutadi'])): ?>
                            <span class="help-block">
                                    <strong>Pegawai ini sudah melakukan penggajian bulan ini</strong>, 
                            </span>
                            <?php endif; ?>
                            <?php if($errors->has('id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        </tr>
                        <?php if(isset($_GET['errors_sudah'])): ?>
                            <tr>
                                <td class="danger" colspan="99">
                                    <strong>Pegawai Sudah Digaji</strong>
                                </td>
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