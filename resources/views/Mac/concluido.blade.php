@extends('lte')

@section('conteudo')
        O MAC Address foi adicionado!
@stop

@section('javascript')
        <!-- jQuery 2.2.0 -->
<script src="{{url('lte/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Autocomplete -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="{{url('lte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('lte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('lte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('lte/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('lte/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#tabela').DataTable();
    });
</script>

<script type="text/javascript">
    $('#searchname').autocomplete({
        source : '{!!URL::route('autocomplete') !!}',
        minlenght:1,
        autoFocus:true,
        select:function(e,ui){
            $('#id_user').val(ui.item.id);
        }
    })
</script>

@stop