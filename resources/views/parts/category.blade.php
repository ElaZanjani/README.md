@foreach ($urunler as $urun)
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-light text-center mb-4">
            <div class="card-body position-relative">
                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"></button></div>
                <div class="h-100px position-relative overflow-hidden">
                    <a class="text-default" href="{{ route('product', $urun->Urun_id) }}">
                        <div class="background background-h-100">
                            <img src="{{ asset('/assets/img/urunler') }}/{{ $urun->UrunResimPath }}" alt=""
                                style="display: block;width: 100%;margin-left: auto;margin-right: auto;">
                        </div>
                    </a>
                </div>
                <a class="text-default" href="{{ route('product', $urun->Urun_id) }}">
                    <h6 class="text-default">{{ __($urun->UrunAd) }}</h6>
                </a>
                <div class="row">
                    <div class="col text-left">
                        @php

                            $urunName = number_format((float) $urun->FixFiyat, 2, '.', '');
                            $parts = explode('.', $urunName);

                            if (count($parts) == 2) {
                                $part1 = explode('.', $urunName)[0];
                                $part2 = explode('.', $urunName)[1];
                            } else {
                                $part1 = $urun->FixFiyat;
                                $part2 = '00';
                            }

                        @endphp




                        <p class="text-success my-0"><span>{{ __('priceSymbol') }}</span>
                            {{ $part1 }}
                            <sup>.{{ $part2 }}</sup>
                        </p>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
