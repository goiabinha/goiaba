<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Aviso</h4>
</div>
<div class="modal-body">
    Confirmar a exclusão?
</div>
<div class="modal-footer">
    <form role="form" action="{{ route('dispositivos.destroy', $id) }}" method="post">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i> OK</button>
    </form>
</div>