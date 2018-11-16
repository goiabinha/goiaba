@extends('adminlte::page')

@section('title', 'Goiaba WiFi - Mac')

@section('content_header')
    <h1>{{ trans('app.home') }}</h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
        <li class="active">{{ trans('app.home') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('app.home') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="tabela" class="table table-bordered table-striped">
                    <thead>
                    <tr role="row">
                        <th>MAC</th>
                        <th>Usuario</th>
                        <th>Descricao</th>
                        <th>Ticket</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($macs as $mac)
                        <tr>
                            <td>{{ $mac->mac }}</td>
                            <td>{{ $mac->usuarios->nome }}</td>
                            <td>{{ $mac->dispositivo->descricao }}</td>
                            <td>{{ $mac->ticket }}</td>
                            <td><span class="label {{ $mac->ativo ? ' label-success' : 'label-danger' }}"> @if ($mac->ativo=='1') Ativo @else Inativo @endif</span></td>
                            <td>
                                <a href="{{ route('macs.show', $mac->id) }}" title="Detalhes"><i class="fa fa-search"></i></a>
                                <a href="{{ route('macs.edit', $mac->id) }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ route('macs.confirm', $mac->id) }}" class="load-ajax-modal" data-toggle="modal" data-target="#modal_dialog" title="Apagar"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <p>Footer</p>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
    <!-- Body Bottom modal DEFAULT dialog-->
    <div class="modal fade" id="modal_dialog" tabindex="-1" role="dialog" aria-labelledby="modal_dialog_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop
@section('css')

@stop
@section('js')

@stop