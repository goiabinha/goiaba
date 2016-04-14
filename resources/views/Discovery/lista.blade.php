@extends('lte')

@section('conteudo')
		<!--a tabela paginada começa aqui-->
<div class="box">
	<div class="box-header">
		<h3 class="box-title">MAC Address</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="tabela" class="table table-bordered table-striped">
			<thead>
			<tr role="row">
				<th>MAC</th>
				<th>Cadastrar</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($DSC as $M)
				<tr>
					<td>{{$M->mac}}</td>
					<!--<td><a href="/macs/novo?mac={{$M->mac}}"><span class="fa fa-plus "></span></a></td> -->
					<td><a href="{{ action('MacController@novo',$M->mac )}} "><span class="fa fa-plus "></span></a></td>

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
	<script src="{{asset('lte/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="{{asset('lte/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- DataTables -->
	<script src="{{asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('lte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<!-- SlimScroll -->
	<script src="{{asset('lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{asset('lte/plugins/fastclick/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('lte/dist/js/app.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('lte/dist/js/demo.js')}}"></script>
	<!-- page script -->
	<script>
		$(function () {
		  	$('#tabela').DataTable();
		});
	</script>
@stop