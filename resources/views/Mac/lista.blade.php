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
			</tr>
			</thead>
			<tbody>
			@foreach ($MAC as $M)
				<tr>
					<td>{{$M->mac}}</td>
					<td>{{$M->nome}}</td>
					<td>{{$M->descricao}}</td>
					<td>{{$M->ticket}}</td>
					<td><span class="label {{ $M->ativo ? ' label-success' : 'label-danger' }}"> @if ($M->ativo=='1') Ativo @else Inativo @endif</span></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	</div>
	<!--Tabela paginada encerra aqui-->
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