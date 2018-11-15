@extends('lte')


@section('conteudo')
<!--a tabela paginada começa aqui-->
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
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
	</div>
	<!--Tabela paginada encerra aqui-->
    <!-- Body Bottom modal DEFAULT dialog-->
    <div class="modal fade" id="modal_dialog" tabindex="-1" role="dialog" aria-labelledby="modal_dialog_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
@stop

@section('javascript')
		<!-- jQuery 2.2.0 -->
	<script src="lte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="lte/bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="lte/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="lte/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="lte/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="lte/dist/js/demo.js"></script>
	<!-- page script -->
	<script>
		$(function () {
		  	$('#tabela').DataTable();
		});
	</script>
@stop