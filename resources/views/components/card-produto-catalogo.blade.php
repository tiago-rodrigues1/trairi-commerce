<article class="card p-0 mx-2 my-2">
    <img src="/storage/{{ $produto->imagens[0]->path }}" alt="Pizza" class="card-img-top">

    <main class="p-3 bg-tc-gray vstack gap-3 card-body">
        <section class="vstack gap-3">
            <h4>{{ $produto->nome }}</h4>
            <div class="hstack align-items-center justify-content-between">
                <h5 class="fw-normal m-0 p-0">R$ {{ number_format($produto->valor, 2, ',') }}</h5>
                <span>
                    {{ $produto->disponibilidade ? "Disponível" : "Indisponível" }}
                </span>
            </div>
        </section>
        <div class="vstack gap-2 py-1">
            <span>Categoria: {{ $produto->categoria->nome }}</span>
            <span>Adicionado em {{ date('d/m/Y',strtotime($produto->created_at)) }}</span>
        </div>
        <hr class="my-1">
        <section class="hstack align-items-center justify-content-between">
            <button class="btn tc-btn">Editar</button>
            <button class="btn tc-btn-outline-red">Excluir</button>
        </section>
    </main>
</article>