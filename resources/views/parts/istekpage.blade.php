<div class="tab-pane fade show active" id="search" role="tabpanel" aria-labelledby="search-tab">

    <input type="hidden" id="denemeke123" value="zaa">

    <div class="container mb-4 px-0 show pt-0" id="filtercollapse">
        {{-- <button id="allGroupsButton" onclick='btnGroupAll(this)' class="btn mb-2 btn-default">Tümü</button>
        @foreach ($ugrup as $u)
            <button onclick='btnGrupClick(this)' value='{{ $u->UrunGrubu_id }}'
                class="btn mb-2 btn-outline-default omaclasse"> {{ __($u->Urungrubu) }}</button>
        @endforeach --}}

        {{-- <button id="allGroupsButton" onclick='btnGroupAll(this)' class="category">
            <div class="overlay"></div>
            <div class="content">
                <div class="category-text">Tümü</div>
                <div class="category-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 -5 24 24" width="24" fill="currentColor">
                        <path
                            d="M5.314 7.071l-4.95-4.95A1 1 0 0 1 1.778.707l5.657 5.657a1 1 0 0 1 0 1.414l-5.657 5.657a1 1 0 0 1-1.414-1.414l4.95-4.95z">
                        </path>
                    </svg>
                </div>
            </div>
        </button> --}}

        <a href="/">
            <button id="backButton" class="category-back">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 -5 24 24" width="24" fill="currentColor">
                        <path
                            d="M2.757 7l4.95 4.95a1 1 0 1 1-1.414 1.414L.636 7.707a1 1 0 0 1 0-1.414L6.293.636A1 1 0 0 1 7.707 2.05L2.757 7z">
                        </path>
                    </svg>
                    Geri
                </div>
                <span id="backButtonSpan"></span>
            </button>
        </a>

        <div class="row" id="subGroup">
        </div>
    </div>
    <div class="container mb-4 MT-">
        <div class="row" id="groupFilterRow">
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('validate.form') }}" novalidate class="form-container">
                @csrf

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required
                        class="@error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telefon">Telefon:</label>
                    <input type="telefon" id="telefon" name="telefon" required
                        class="@error('telefon') is-invalid @enderror">
                    @error('telefon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">İstek ve Şikayetlerinizi Yazınız:</label>
                    <textarea id="message" name="message" required class="@error('message') is-invalid @enderror"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="send" value="Submit">Tamam</button>
                </div>
            </form>
        </div>
    </div>

</div>
