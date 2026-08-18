
@include('layouts.header')

@include('layouts.loader')



 <!-- Begin page content -->
 <main class="flex-shrink-0 main-container">
    <!-- page content goes here -->
    <div class="container-fluid h-300 position-relative overflow-hidden">
        <div class="background">
            <img src="{{asset('/assets/img/urunler')}}/{{$urun->UrunResimPath}}" alt="">
        </div>
    </div>
    <div class="container mb-4 top-100">
        <div class="card border-0 shadow-light mb-0">
            <div class="card-body position-relative">
                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                            class="material-icons text-danger vm">favorite</i></button></div>
                <h4 class="text-default">{{$urun->UrunAd}}</h4>
                <p class="mb-1">{{$urun->UrunGrubu}}</p>
                <div class="row mb-4">
                    <div class="col text-left">
                        @php

                                    $urunName = number_format((float)$urun->FixFiyat, 2, '.', '');
                                    $parts = explode(".",($urunName));

                                    if (count($parts) == 2){
                                        $part1 = explode(".",($urunName))[0];
                                        $part2 = explode(".",($urunName))[1];
                                    }
                                    else {
                                        $part1 = $urun->FixFiyat;
                                        $part2 = '00';
                                    }

                                    @endphp


                        <h4 class="text-success">
                        <div id="priceBig">{{__('priceSymbol')}} {{$part1}}<sup>.{{$part2}}</sup></div>

                    </div>
                </div>


               @php if ($urun->textraozellik != "") : @endphp
                @php if (strpos($urun->textraozellik , ',')) { $arrayim = explode(',', $urun->textraozellik);  } else {$arrayim = array([$urun->textraozellik]);} @endphp
               <div class="col text-center mb-0">
                    <select class="selectpicker" id="extraPicker" multiple  data-style="form-control w-200">,
                    @php foreach($arrayim as $ar) : @endphp
                        <option value="0">{{$ar}}</option>
                    @php endforeach @endphp
                    </select>
                </div>

                @php endif @endphp


                <!-- Porsiyon Bilgisi !-->

                @if ($urun->Porsiyon == 1)

                @php $partsOfPortionDescription =  explode(",", $urun->P_Tanim); @endphp
                <div class="col text-center mb-4">

                           <div class="card-body">
                               <select class="selectpicker" id="portionPicker" onchange="PortionChanged(this);" data-style="form-control w-100">
                                   <option>Porsiyon Seçin</option>

                                   @if (count($partsOfPortionDescription) == 1 && $partsOfPortionDescription[0] == $urun->P_Tanim)
                                   <option value="<?php $part1 = explode(".", ($urun->FixFiyat))[0]; echo $part1; ?>">Tek</option>
                                   <option value="<?php if ($urun->P_Yarim != 0) echo $urun->P_Yarim; else echo intval($urun->FixFiyat) * 0.5;  ?>">Yarım</option>
                                   <option value="<?php if ($urun->P_Birbucuk != 0) echo $urun->P_Birbucuk; else echo intval($urun->FixFiyat) * 1.5;  ?>">Bir Buçuk</option>
                                   <option value="<?php if ($urun->P_Duble != 0) echo $urun->P_Duble; else echo intval($urun->FixFiyat) * 2.0;  ?>">Duble</option>
                                   @else
                                       <?php foreach($partsOfPortionDescription as $partingo) :?>
                                           <?php if ($partingo == 0) : ?>
                                               <option value="<?php $part1 = explode(".", ($urun->FixFiyat))[0]; echo $part1; ?>">Tek</option>
                                           <?php elseif($partingo == 1) : ?>
                                               <option value="<?php if ($urun->P_Yarim != 0) echo $urun->P_Yarim; else echo intval($urun->FixFiyat) * 0.5;  ?>">Yarım</option>
                                           <?php elseif($partingo == 2) : ?>
                                               <option value="<?php if ($urun->P_Birbucuk != 0) echo $urun->P_Birbucuk; else echo intval($urun->FixFiyat) * 1.5;  ?>">Bir Buçuk</option>
                                           <?php elseif($partingo == 3) : ?>
                                               <option value="<?php if ($urun->P_Duble != 0) echo $urun->P_Duble; else echo intval($urun->FixFiyat) * 2.0;  ?>">Duble</option>
                                           <?php endif ?>
                                       <?php endforeach ?>
                                       @endif
                               </select>

                           </div>

                   </div>
                @endif
                <!-- Porsiyon Bilgisi !-->

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active was-validated " id="details" role="tabpanel"
                        aria-labelledby="details-tab">
                        <p class="text-mute">{{$urun->UrunAciklama}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End of page content -->

<!-- Footer -->
<footer class="footer mt-auto py-3">
    <hr class="mt-0">
    <div class="container-fluid">
        <p class="text-center">Mikale Yazılım</p>
    </div>
</footer>
<!-- Footer ends -->



 <!-- sticky footer tabs -->
 <div class="footer-tabs border-top text-center">
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="/" aria-controls="home" aria-selected="true">
                <i class="material-icons">home</i>
                <small class="sr-only">Home</small>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#" aria-controls="search" aria-selected="false">
                <i class="material-icons">room_service</i>
                <small class="sr-only">search</small>
            </a>
        </li>

    </ul>
</div>
<!-- sticky footer tabs ends -->


@include('layouts.footer')
