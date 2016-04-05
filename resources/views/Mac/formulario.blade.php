@extends('lte')

@section('conteudo')
        <!--a tabela paginada começa aqui-->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Cadastro de MAC Address</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">MAC Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="example ">Usuario</label>
                        <input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dispositivo</label>
                        <input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket</label>
                        <input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descricao</label>
                        <input type="form-control" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Ativo
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Tabela paginada encerra aqui-->

@stop

@section('javascript')
        <!-- jQuery 2.2.0 -->
<script src="{{url('lte/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
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
@stop