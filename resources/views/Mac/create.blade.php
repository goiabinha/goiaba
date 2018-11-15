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
                <form role="form" action="{{ route('macs.store') }}" method="post">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro Mac</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mac">MAC Address</label>
                                <input type="text" class="form-control" id="mac" placeholder="MAC Address" name="mac" data-inputmask="'alias': 'mac'" data-mask value="">
                            </div>
                            <div class="form-group">
                                <label for="dispositivo">Dispositivo</label>
                                <select class="form-control" id="dispositivo" name="id_dev">
                                    @foreach ($dev as $d)
                                        <option value= {{ $d->id }}>{{ $d->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nome">Ticket</label>
                                <input type="text" class="form-control" id="ticket" placeholder="Ticket OTRS" name="ticket">
                            </div>
                            <div class="form-group">
                                <label for="expira">Data de Expiração</label>
                                <input type="date" class="form-control" id="expira" name="expira" value="{{ date('Y-m-d', strtotime('+1 years')) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="searchname">Usuário</label>
                                <input type="text" name="searchname" class="form-control" id="searchname" placeholder="Nome do usuário">
                                <input type="hidden" name="id_user" class="form-control" id="id_user">
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" placeholder="Descricao" name="nome_eq">
                            </div>
                            <div class="form-group">
                                <label for="sei">SEI</label>
                                <input type="text" class="form-control" id="sei" placeholder="SEI" name="sei">
                            </div>
                            <div class="form-group">
                                <label for="ativo">Ativo</label><br/>
                                <input type="checkbox" name="ativo" value="1" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger" checked>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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