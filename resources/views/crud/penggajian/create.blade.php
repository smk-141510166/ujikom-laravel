<?php $page = 'Create Penggajian' ?>
<?php $root = 'penggajian' ?>
@extends('layouts.'.config('app.layout'))

@section('footer')
<a href="{{url($root)}}">Penggajian</a> > <a href="{{url($root,'create')}}">Create</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$page}}</div>

                <div class="panel-body">
                	{!! Form::open(['url'=>$root]) !!}
                    {{ csrf_field() }}
                	<table class="table">
                        <tr>
                            <td>{!! Form::label('pegawai') !!}</td>
                            <td>
                            @if(!isset($pegawais->first()->id))
                            <div class="col-md-12 btn btn-danger disabled">Table Pegawai is Null</div>
                            @else
                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <select name="id" class="form-control" required="">
                                <option></option>
                                @foreach($pegawais as $pegawai)
                                @if(Auth::user()->id==$pegawai->user_id)
                                @else
                                <option value="{{$pegawai->id}}">{{$pegawai->user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                            @endif
                            @if (isset($_GET['errors']))
                            <span class="help-block">
                                    <strong>Pegawai ini tidak memiliki tunjangan</strong>, 
                                    <strong>Silahkan untuk membuatnya <a href="{{url('tunjangan_pegawai','create')}}">disini</a></strong>
                            </span>
                            @endif
                            @if (isset($_GET['errors_nutadi']))
                            <span class="help-block">
                                    <strong>Pegawai ini sudah melakukan penggajian bulan ini</strong>, 
                            </span>
                            @endif
                            @if ($errors->has('id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </span>
                            @endif
                        </td>
                        </tr>
                        @if (isset($_GET['errors_sudah']))
                            <tr>
                                <td class="danger" colspan="99">
                                    <strong>Pegawai Sudah Digaji</strong>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2" align="right">{!! Form::submit('Create',['class'=>'btn btn-success']) !!}</td>
                        </tr>
                    </table>
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
