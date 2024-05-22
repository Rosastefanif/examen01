<div class="modal-content">
    <form id="formUpdate" action="{{$entrada->id ? route('entrada.update',$entrada) : route('entrada.store')}}"
     method="post">
    <div class="modal-header">
        <h4 class="modal-title" id="modal-title">Entradas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @if($entrada->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $entrada->id }}">
        @endif
        @csrf
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese placa" value="{{$entradas->placa}}">
            <div id="msg_placa"></div>
        </div>
        <div class= "form-group">
            <label for="fecha">Fecha</label>
            <input type="text"name="fecha" class="form-control" id="fecha"placeholder="Ingrese fecha" value="{{$entradas->fecha}}">
        </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">Guardar</span></button>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
</div>