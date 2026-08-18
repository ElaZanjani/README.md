<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="container mb-4">

        <div id="statusloader">

        </div>

        <div class="autocomplete" style="width:100%">
            <input id="searchInput" class="form-control border-0 shadow-light" style="width:100%" type="text"
                name="myCountry" placeholder="Ürün ismi giriniz">
        </div>
    </div>
    <div class="container mb-4">
        <div class="swiper-container swiper-offers">
            <div class="swiper-wrapper">

                @isset($kampanya)
                <?php foreach($kampanya as $m) :?>
                <div class="swiper-slide w-auto">
                    <div class="card w-250 position-relative overflow-hidden bg-dark text-white border-0">
                        <div class="background opacity-60">
                            <img src="<?php echo base_url();?>/assets/img/kampanyalar/<?= esc($m['foto']); ?>"
                                alt="" s>
                        </div>
                        <div class="card-body text-center z-1 h-50"></div>
                        <div class="card-footer border-0 z-1">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="my-0 font-weight-bold"><?= esc($m['baslik']); ?></h4>
                                    <h6 class="mb-1"><?= esc($m['aciklama']); ?></h6>
                                    <p>Code: <span class="badge badge-success"><?= esc($m['code']); ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                @endisset

            </div>
        </div>
    </div>
    <div class="container">
        <h6 class="page-subtitle">En Sevilenler <a href="#" class="btn btn-sm float-right px-0"></a></h6>
        <div class="row">

            @isset($coksatan)
            @foreach ( $coksatan as $c )
            <div class="col-6 col-md-3">
                <div class="card border-0 shadow-light text-center mb-4">
                    <div class="card-body position-relative">
                        <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                                    class="material-icons text-danger vm">favorite</i></button></div>
                        <div class="h-100px position-relative overflow-hidden">
                            <a class="text-default"
                                href="<?php echo base_url();?>/dashboard/product/{{ $c->Urun_id }}">
                                <div class="background background-h-100">

                                    <img src="<?php echo base_url();?>/assets/img/urunler/{{ $c->UrunResimPath }}"
                                        alt="">

                                </div>
                            </a>
                        </div>
                        <a class="text-default"
                            href="<?php echo base_url();?>/dashboard/product/<?= esc($c['Urun_id']); ?>">
                            <h6 class="text-default"><?= esc($c['UrunAd']); ?></h6>
                        </a>
                        <p class="small"><?= esc($c['UrunGrubu']); ?><br><span
                                class="text-warning icon_star"></span><span
                                class="text-warning icon_star"></span><span
                                class="text-warning icon_star"></span><span
                                class="text-warning icon_star"></span><span
                                class="text-warning icon_star"></span></p>
                        <div class="row">
                            <div class="col text-left">
                                @php
                    $part1 = explode(".",($c->FixFiyat))[0];
                    $part2 = explode(".",($c->FixFiyat))[1];
                    @endphp

                                <p class="text-success my-0"><span>&#8378;</span>
                                    {{ $part1 }}<sup>.{{ substr($part2, 0, 2) }}</sup></p>
                            </div>
                            <div class="col-auto"><button class="btn btn-sm btn-link text-default p-0"><i
                                        class="material-icons">shopping_basket</i></button></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset

        </div>
    </div>


</div>
