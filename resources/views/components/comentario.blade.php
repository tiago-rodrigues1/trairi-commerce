<div class="mt-3 rounded-3 border hstack align-items-center gap-3 p-3">
    <img src="/storage/{{$objectData->usuario->foto_perfil_path}}" alt="" class="rounded-circle"
        style="width: 4rem; height: 4rem;">
    <div class="vstack">
        <div class="coment-header d-flex align-items-center justify-content-between">
            <span>
                <b>{{ $objectData->usuario->nome }}</b>
                <small class="tc-light-text">Em {{ date('d/m/Y', strtotime($objectData->pivot->created_at)) }}</small>
            </span>
            @if (session()->has('usuario'))
                @if (session()->get('usuario')->id == $objectData->usuario->id)
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical" style="color: #0D0A0B;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <button class="btn-edit-coment dropdown-item" type="button" data-target_coment="#coment_{{$tipoDeComentario}}__{{$objectData->pivot->id}}">Editar</button>
                            </li>
                            <li><a href="/{{ $tipoDeComentario }}/comentarios/{{ $objectData->pivot->id }}/deletar" class="dropdown-item">Excluir</a></li>
                        </ul>
                    </div>
                @endif
            @endif
        </div>
        <input type="text" id="coment_{{$tipoDeComentario}}__{{$objectData->pivot->id}}" value="{{ $objectData->pivot->comentario }}" class="input-coment py-1 form-control" disabled>
    </div>
</div>