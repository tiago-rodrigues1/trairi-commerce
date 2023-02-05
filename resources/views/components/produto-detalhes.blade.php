<div class="modal fade" id="detalheProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog overflow-y-scroll modal-xl">
        <div class="modal-content h-100">
            <div class="h-100 w-100 vstack p-4">
                <article class="d-flex flex-column flex-lg-row col-12">
                    <section class="col-12 col-lg-8 vstack gap-3 pe-lg-3">
                        <div class="vstack">
                            <div class="hstack align-items-center justify-content-between">
                                <h1 class="fs-4">Pizza de calabresa no capricho</h1>
                                <button type="button" class="btn-close d-lg-none" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="py-2 w-100 d-flex align-items-center gap-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="{{ $i < 3 ? '#72B01D': '#DDDDDD' }}" stroke="{{ $i < 3 ? '#72B01D': '#DDDDDD' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                @endfor
                            </div>
                        </div>
                        <div class="vstack gap-3 col-12 col-lg-10">
                            <img src="/images/pizza.jpg" class="rounded-3 w-100 h-75" alt="">
                            <div class="w-100 hstack align-items-center justify-content-between">
                                <div class="hstack align-items-center gap-3">
                                    <button class="btn disabled">Anterior</button>
                                    <button class="btn tc-btn">Próximo</button>
                                </div>
                                <button type="button" class="p-1 bg-transparent rounded-3 border" style="border-color: #DDDDDD">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#DDDDDD" stroke="#DDDDDD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </section>
                    <section class="h-100 ps-lg-3 col-12 col-lg-4">
                        <div class="mt-3 mt-lg-0 hstack align-items-center justify-content-between">
                            <h4>R$ 40,00</h4>
                            <button type="button" class="btn-close d-none d-lg-block" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <span>taxa de entrega</span>
                        <div class="mt-3">
                            <p class="mb-2">Por Pizzaria Trairi</p>
                            <p>Santa Cruz</p>
                        </div>
                        <div>
                            <h5>Descrição</h5>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus natus minima sint
                                libero nesciunt corporis commodi suscipit eaque quo. Voluptas, accusamus numquam illum
                                asperiores itaque porro ab magni adipisci officiis.
                            </p>
                        </div>
                        <div class="pt-2 vstack gap-1">
                            <h6>Aceitamos</h6>
                            <div class="w-100 hstack align-items-center gap-3">
                                <span class="px-2 py-1 badge bg-tc-green">Dinheiro</span>
                                <span class="px-2 py-1 badge bg-primary">PIX</span>
                                <span class="px-2 py-1 badge bg-danger">Cartões</span>
                            </div>
                        </div>
                        <button class="mt-4 btn tc-btn w-100">Solicitar</button>
                    </section>
                </article>
                <article class="vstack col-12 col-lg-8 pt-4">
                    <h6 class="pb-2">Comentários</h6>
                    <div class="col-12 col-lg-10 bg-tc-gray border rounded-3 hstack align-items-center gap-3 p-3">
                        <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                            style="width: 4rem; height: 4rem;">
                        <div class="vstack">
                            <div>
                                <span><b>Bruce Wayne</b></span>
                                <small class="tc-light-text">Em 06/07/2022</small>
                            </div>
                            <p>Veio no capricho! Super aprovado!</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
