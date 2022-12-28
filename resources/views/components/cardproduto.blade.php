<article class="card p-0 mx-2 my-2">
    <img src="/images/pizza.jpg" alt="Pizza" class="card-img-top">
    <button class="border-0 p-0 m-0" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Abrir</button>
    <x-produto-detalhes />
    <main class="p-3 bg-tc-gray vstack gap-3 card-body">
        <section class="vstack gap-3">
            <h4>Pizza de calabresa</h4>
            <div class="hstack align-items-center justify-content-between">
                <h5 class="fw-normal m-0 p-0">R$ 40,00</h5>
                <div class="hstack gap-2 align-items-center justify-content-center">
                    <span class="text-tc-green">5</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="#72B01D" stroke="#72B01D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </div>
            </div>
        </section>
        <section class="vstack gap-2">
            <span>Por Pizzaria Trairi</span>
            <span>Santa Cruz</span>
        </section>
        <hr class="my-1">
        <section class="vstack gap-1">
            <h6>Aceitamos</h6>
            <div class="w-100 hstack align-items-center justify-content-evenly">
                <span
                    class="d-flex align-items-center justify-content-center badge bg-success bg-opacity-50 p-2 rounded-2">
                    dinheiro
                </span>
                <span
                    class="d-flex align-items-center justify-content-center badge bg-danger bg-opacity-50 p-2 rounded-2">
                    pix
                </span>
                <span
                    class="d-flex align-items-center justify-content-center badge bg-primary bg-opacity-50 p-2 rounded-2">
                    cartões
                </span>
            </div>
        </section>
    </main>
</article>
