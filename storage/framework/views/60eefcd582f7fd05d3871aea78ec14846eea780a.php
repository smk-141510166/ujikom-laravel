<?php $page = $data->user->name ?>
<?php $root = 'pegawai' ?>


<?php $__env->startSection('footer'); ?>
<a href="<?php echo e(url('pegawai')); ?>">Pegawai</a> > <a href="<?php echo e(url('pegawai','create')); ?>">View</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body" align="center">
                    <div class="foto-profile" style="background-image: url(<?php echo e(url('account',$data->foto)); ?>)">
                    <div class="foto-comment"><a href="<?php echo e(url('account',$data->foto)); ?>" class="btn btn-default" style="background-color: #222;color: #fff;">Image</a></div>
                        <!-- <img src="<?php echo e(url('account',$data->foto)); ?>" class="fp"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Data Pengguna</div>
                <div class="panel-body">
                    <table class="table">
                    <tr><td>
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <?php echo Form::label('name',$data->user->name,['class'=>'form-control']); ?>


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
                            <?php echo Form::label('name',$data->user->email,['class'=>'form-control']); ?>


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
                            <?php echo Form::select('type_user',[''=>$data->user->type_user],'',['class'=>'form-control','disabled']); ?>

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
                            <a href="#" class="btn btn-block btn-danger disabled">Bcrypt Data</a>

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
                			<?php echo Form::label('nip',$data->nip,['class'=>'form-control']); ?>

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
                            <?php echo Form::label('jabatan',$data->jabatan->nama_jabatan,['class'=>'form-control']); ?>

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
                            <?php echo Form::label('golongan',$data->golongan->nama_golongan,['class'=>'form-control']); ?>

                            </div>
                            <?php if($errors->has('golongan_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('golongan_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </td>
                        </tr>
                		<tr>
                			<td><a href="<?php echo e(route('pegawai.edit',$data->id)); ?>" class="btn btn-block btn-warning">Edit</a></td>
                            <td>
                            <?php echo Form::open(['method'=> 'DELETE', 'route'=>['pegawai.destroy',$data->id]]); ?>

                            <?php echo Form::submit('Delete', ['class'=>'btn btn-block btn-danger lebar']); ?>

                            <?php echo Form::close(); ?></td>
                		</tr>
                	</table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Lembur</div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Jam</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_pendapatan = 0; ?>
                            <?php $__currentLoopData = $data->lembur_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lembur): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($lembur->created_at); ?></td>
                                <td><?php echo e($lembur->jumlah_jam); ?></td>
                                <?php 
                                    $pendapatan = $lembur->jumlah_jam*$kategori_lembur->where('id',$lembur->kategori_lembur_id)->first()->besaran_uang;
                                    $total_pendapatan+=$pendapatan;
                                    $pendapatan = number_format($pendapatan,2,',','.');
                                 ?>
                                <td align="right">Rp. <?php echo e($pendapatan); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td class="success"></td>
                                <td class="success">Total</td>
                                <td align="right" class="success"><?php echo e('Rp. '.number_format($total_pendapatan,2,',','.')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.'.config('app.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>