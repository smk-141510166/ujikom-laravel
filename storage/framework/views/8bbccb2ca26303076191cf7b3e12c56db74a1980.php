<?php $page = $data->user->name.' Edit' ?>
<?php $root = 'pegawai' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('pegawai')); ?>">Pegawai</a> > <a href="<?php echo e(url('pegawai','update')); ?>">Update</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php echo Form::model($data,(['method'=>'PATCH','route'=>['pegawai.update',$data->id],'enctype'=>'multipart/form-data' ])); ?>

        <?php echo e(csrf_field()); ?>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Data Akun</div>
                <div class="panel-body">
                    <table class="table">
                    <tr>
                        <td>
                            <label for="name" class="col-md-4 control-label">Name</label>
                        </td>
                        <td>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($data->user->name); ?>">
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email" class="col-md-4 control-label">Email</label>
                        </td>
                        <td>
                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <input id="email" class="form-control" name="email" value="<?php echo e($data->user->email); ?>">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="type_user" class="col-md-4 control-label">Permisions</label>
                        </td>
                        <td>
                            <div class="form-group<?php echo e($errors->has('type_user') ? ' has-error' : ''); ?>">
                            <?php 
                                $selection = [''=>''];
                                if (Auth::user()->type_user == 'admin') {
                                    $selection['admin']='Admin';
                                }
                                    $selection['bendahara']='bendahara';
                                    $selection['hrd']='HRD';
                                    $selection['pegawai']='Pegawai';
                             ?>
                                <?php echo Form::select('type_user',$selection,$data->user->type_user,['class'=>'form-control']); ?>

                                <?php if($errors->has('type_user')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('type_user')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password" class="col-md-4 control-label">Password</label>
                        </td>
                        <td>
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <input id="password" type="text" class="form-control" name="password" value="<?php echo e(old('password')); ?>">
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                        <span class="help-block">
                                            <strong>Kosongkan bila tidak akan mengubah</strong>
                                        </span>
                            </div>
                        </td>
                    </tr>
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
                            <?php echo Form::text('nip',null,['class'=>'form-control']); ?>

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
                            <div class="form-group<?php echo e($errors->has('jabatan_id') ? ' has-error' : ''); ?>">
                            <select name="jabatan_id" class="form-control">
                                <option value=""></option>
                                <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($jabatan->id); ?>" <?php if ($data->jabatan_id==$jabatan->id) {echo "selected";} ?>><?php echo e($jabatan->nama_jabatan); ?></option>
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
                                <option value=""></option>
                                <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($golongan->id); ?>" <?php if ($data->golongan_id==$golongan->id) {echo "selected";} ?>><?php echo e($golongan->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            <?php if($errors->has('golongan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('golongan_id')); ?></strong>
                                </span>
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
                                <span class="help-block">
                                    <strong>Kosongkan bila tidak akan mengubah</strong>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><?php echo Form::submit('Update',['class'=>'btn btn-warning']); ?></td>
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