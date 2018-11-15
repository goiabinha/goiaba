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
                <form role="form" action="#" method="post">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mac</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mac">MAC Address</label>
                                <input class="form-control" value="{{ $mac->mac }}" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="dispositivo">Dispositivo</label>
                                <input class="form-control" value="{{ $mac->dispositivo->descricao }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nome">Ticket</label>
                                <input class="form-control" value="{{ $mac->ticket }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="expira">Expira</label>
                                <input class="form-control" value="{{ $mac->expira->format('d/m/Y') }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="searchname">Usuário</label>
                                <input class="form-control" value="{{ $mac->usuarios->nome }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input class="form-control" value="{{ $mac->nome_eq }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="sei">SEI</label>
                                <input class="form-control" value="{{ $mac->sei }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="ativo">Ativo</label><br/>
                                <input type="checkbox" name="ativo" disabled data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger" {{ $mac->ativo == 1 ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('macs.edit', $mac->id) }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                        <a href="{{ route('macs.confirm', $mac->id) }}" type="button" class="btn btn-danger load-ajax-modal" data-toggle="modal" data-target="#modal_dialog"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</a>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
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
    <!-- Mascara IP -->
    <script src="{{url('lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{url('lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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

    <script>
        $("[data-mask]").inputmask();

    </script>
@stop