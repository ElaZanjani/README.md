@include('layouts.header')

@include('layouts.loader')

<!-- Fixed navbar -->
<header class="header">
    <nav class="navbar">
        <div class="navbar-overlay"></div>

        <div>
            <a class="navbar-brand">
                {{-- <div class="logo" style="background-color: transparent;"><img
                        src="{{ asset('assets/img') }}/{{ $ayar->logo }}"></div> --}}
                <h4 class="logo-text"><span>
                        @isset($qrCodeCart)
                            {{ $qrCodeCart->Masaismi }}
                        @else
                            {{ $ayar->baslik }}
                        @endisset
                    </span></h4>
            </a>
        </div>

        @isset($qrCodeCart)
            <div>
                <input type="hidden" id="qrcode" value="{{ $qrCodeCart->QRCode }}">
                <a onclick="callWaiter(this);">
                    <p>Garson Çağır <i class="inline-icon material-icons"
                            style="
            vertical-align: middle;
            font-size: 18px !important;
                ">warning</i>
                    </p>
                </a>
            </div>
        @endisset

    </nav>
</header>
<!-- Fixed navbar ends -->


<!-- Begin page content -->
<main class="flex-shrink-0 main-container pb-0 pt-0">
    <!-- page content goes here -->
    <div class="tab-content" id="myTabContent">
        @include('parts.searchpagealternative')
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
            <a class="nav-link active" id="search-tab" data-toggle="tab" href="#search" role="tab"
                aria-controls="search">
                <i class="material-icons">room_service</i>
                <small class="sr-only">search</small>
            </a>
        </li>

    </ul>
</div>


@include('layouts.footer')
