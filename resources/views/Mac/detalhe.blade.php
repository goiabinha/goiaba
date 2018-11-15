@extends('lte')

@section('conteudo')
        <!--a tabela paginada começa aqui-->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">MAC Address</h3>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Detalhes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>MAC Address</strong>

            <p class="text-muted">
                {{ $DTL["mac"] }}
            </p>

            <hr>

            <strong><i class="fa fa-user margin-r-5"></i> Usu&aacute;rio</strong>

            <p class="text-muted">
                {{ $DTL["nome"] }}
            </p>

            <hr>

            <strong><i class="fa fa-tv margin-r-5"></i> Dispositivo</strong>

            <p class="text-muted">
                {{ $DTL["descricao"] }}
            </p>

            <hr>

            <strong><i class="fa fa-ticket margin-r-5"></i> Ticket OTRS</strong>

            <p class="text-muted">
                {{ $DTL["ticket"] }}
            </p>

            <hr>

            <strong><i class="fa fa-calendar margin-r-5"></i> Adicionado em</strong>

            <p class="text-muted">
                {{ $DTL["criado"] }}
            </p>

            <hr>

            <strong><i class="fa fa-calendar-o margin-r-5"></i> &Uacute;ltima altera&ccedil;&atilde;o</strong>

            <p class="text-muted">
                {{ $DTL["modificado"] }}
            </p>

            <hr>

            <strong><i class="fa fa-exchange margin-r-5"></i>Status</strong>

            <p>
               <span class="label {{ $DTL["ativo"] ? ' label-success' : 'label-danger' }}"> @if ($DTL["ativo"]=='1') Ativo @else Inativo @endif</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Observa&ccedil;&atilde;o</strong>

            <p>{{ $DTL["nome_eq"] }}</p>
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
@stop