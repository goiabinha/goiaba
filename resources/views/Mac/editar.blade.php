@extends('lte')

@section('conteudo')
        <!--a tabela paginada começa aqui-->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">MAC Address</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{URL('macs/altera')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">MAC Address</label>
                        <input type="text" class="form-control" id="mac" placeholder="MAC Address" name="mac" data-inputmask="'alias': 'mac'" data-mask value= {{ $EMAC["mac"] }} >
                        <input type="hidden" name="id" class="form-control" id="id" value="{{ $EMAC["id"] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usu&aacute;rio</label>
                        <section >
                            <header >
                        <td> <input type="text" name="searchname" class="form-control" id="searchname" placeholder="Nome do usu&aacute;rio" value= "{{ $EMAC["nome"] }}"></td>
                             <input type="hidden" name="id_user" class="form-control" id="id_user" value="{{ $EMAC["id_user"] }}">
                            </header>
                        </section>
                    </div>
                    <!-- select -->
                    <div class="form-group">
                        <label>Dispositivo</label>
                        <select class="form-control" placeholder="Dispositivo" id="dispositivo" name="id_dev">
                            <option value={{ $EMAC["id_dev"] }}  selected='selected'> {{ $EMAC["descricao"] }} </option>
                        @foreach ($dev as $d)
                            <option value= {{$d->id_dev}}>{{$d->descricao}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket</label>
                        <input type="form-control" class="form-control" id="ticket" placeholder="Ticket OTRS" name="ticket" value={{ $EMAC["ticket"] }}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Descricao</label>
                        <input type="form-control" class="form-control" id="descricao" placeholder="Descricao" name="nome_eq" value="{{ $EMAC["nome_eq"] }}">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="status" name="ativo" {{ $EMAC["ativo"] ? "checked": "" }} > Ativo
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary">ATUALIZAR</button>
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
<!-- Mascara IP -->
<script src="{{url('lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
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