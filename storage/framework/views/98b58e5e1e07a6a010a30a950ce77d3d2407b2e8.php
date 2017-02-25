<?php $page = 'Create Lembur' ?>
<?php $root = 'lembur_pegawai' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url($root)); ?>">Lembur Pegawai</a> > <a href="<?php echo e(url($root,'create')); ?>">Create</a>
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
                            <td><?php echo Form::label('Pegawai'); ?></td>
                            <td>
                            <?php if(!isset($pegawais->first()->id)): ?>
                            <div class="col-md-12 btn btn-danger disabled">Table Pegawai is Null</div>
                            <?php else: ?>
                            <div class="form-group<?php echo e($errors->has('pegawai_id') ? ' has-error' : ''); ?>">
                            <select class="form-control" name="pegawai_id" autofocus="">
                                <option></option>
                                <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($pegawai->id); ?>"><?php echo e($pegawai->user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('pegawai_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('pegawai_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <?php if(isset($error_klnf)): ?>
                            <div style="width: 100%;color: red;text-align: center;">
                                Pegawai ini tidak memiliki kategori lembur, silahkan untuk membuat kategori <a href="<?php echo e(url('kategori_lembur','create')); ?>">disini</a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Jumlah Jam'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('jumlah_jam') ? ' has-error' : ''); ?>">
                            <div class="input-group">
                                <?php echo Form::number('jumlah_jam',null,['class'=>'form-control','id'=>'appendprepend','style'=>'text-align:right;']); ?>

                                <span class="input-group-addon">Jam</span>
                            </div>
                            </div>
                            <?php if($errors->has('jumlah_jam')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo Form::label('Jumlah Jam'); ?></td>
                            <td>
                            <div class="form-group<?php echo e($errors->has('created_at') ? ' has-error' : ''); ?>">
                            <div class="input-group">
                                <?php echo Form::date('created_at',\Carbon\Carbon::now(),'',['class'=>'form-control']); ?>

                            </div>
                            </div>
                            <?php if($errors->has('created_at')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('created_at')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php if(isset($_GET['errors_sudah'])): ?>
                        <tr>
                            <td class="danger" colspan="99">
                                <strong>Pegawai Sudah Lembur</strong>
                            </td>
                        </tr>
                    <?php endif; ?>
                        <tr>
                            <td colspan="2" align="right">
                            <?php if(!isset($pegawais->first()->id)): ?>
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