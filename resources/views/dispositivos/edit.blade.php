@extends('lte')

@section('conteudo')
    <div class="row">
        <div class='col-md-12'>
            <div class="box box-primary">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" action="{{ route('dispositivos.update', $dispositivo->id) }}" method="post">
                    <div class="box-header with-border">
                        <h3 class="box-title">Usuário</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao">Dispositivo</label>
                                <input type="text" class="form-control" name="descricao" value="{{ $dispositivo->descricao }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
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
@stop