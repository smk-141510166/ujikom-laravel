<?php $page = 'Pegawai' ?>
<?php $root = 'pegawai' ?>

<?php 
if (!isset($field_old)) {
     $field_old = '';
 } ?>

<?php $__env->startSection('search'); ?>
<form action="<?php echo e(url($root)); ?>" method="get">
    <div class="input-group">
        <div class="input-group-btn">
            <select class="form-control" name="field">
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($field); ?>" <?php if ($field==$field_old) {echo "selected";} ?>><?php echo e($field); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
        <input class="form-control" id="appendbutton" type="text" name="search" value="<?php if (isset($search)) {echo($search);} ?>">
        <div class="input-group-btn">
            <button class="btn btn-primary" type="submit">
                Cari
            </button>
            <a href="<?php echo e(url($root)); ?>" class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url($root)); ?>">Pegawai</a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e($page); ?></div>
                <div class="panel-body" align="center">
                	<table class="table table-hover">
                        <?php if(isset($datas->first()->id)): ?>
                        <thead>
                		<tr>
                			<th><a href="<?php echo e(url('pegawai/?sortBy=nip')); ?>">NIP</a></th>
                            <th>Nama</th>
                			<th>Jabatan</th>
                			<th colspan="3" style="text-align: center !important;">Tindakan</th>
                		</tr>
                        </thead>
                        <tbody>
                		<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if(Auth::user()->email != $data->user->email): ?>
                		<tr>
                			<td><?php echo e($data->nip); ?></td>
                            <td><?php echo e($data->user->name); ?></td>
                			<td><?php echo e($data->jabatan->nama_jabatan); ?></td>
                			<td class="action-web"><a href="<?php echo e(url($root,$data->id)); ?>" class="btn btn-default">Lihat</a></td>
                            <td class="action-web"><a href="<?php echo e(route('pegawai.edit',$data->id)); ?>" class="btn btn-warning lebar">Ubah</a></td>
                            <td class="action-web">
                            <?php if(Auth::user()->type_user=='admin'): ?>
                            <?php echo Form::open(['method'=> 'DELETE', 'route'=>['pegawai.destroy',$data->id]]); ?>

                            <?php echo Form::submit('Hapus', ['class'=>'btn btn-danger lebar']); ?>

                            <?php echo Form::close(); ?>

                            <?php else: ?>
                            <?php echo Form::label('','Hapus',['class'=>'btn btn-danger lebar disabled']); ?>

                            <?php endif; ?></td>
                            <td class="action-mobile dropdown" colspan="3">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(url($root,$data->id)); ?>">View</a></li>
                                    <li><a href="<?php echo e(route('pegawai.edit',$data->id)); ?>">Edit</a></li>
                                </ul>
                            </td>
                		</tr>
                        <?php endif; ?>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <?php else: ?>
                        <thead>
                            <tr>
                                <td><h1>Not Found</h1></td>
                            </tr>
                        </thead>
                        <?php endif; ?>
                	</table>
                    <?php echo e($datas->links()); ?>

                </div>
            </div>
        </div>
        <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.'.config('app.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>