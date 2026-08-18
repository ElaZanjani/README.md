<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="position-relative overflow-hidden h-200">
        <div class="background">
            <img src="{{asset('assets/img/food1.jpg')}}" alt="">
        </div>
    </div>
    <div class="container top-100 text-center mb-4">
        <figure class="avatar avatar-180 rounded-circle shadow  mx-auto">
            <img src="{{asset('assets/img/user1.png')}}" alt="">
        </figure>
    </div>
    <div class="container-fluid text-center mb-4">
        <h4>Maxartkiller</h4>
        <p class="text-mute">Vennanya, USA.</p>
    </div>
    <div class="container mb-4">
        <ul class="nav nav-pills nav-fill justift-content-center mb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  active" id="account-tab" data-toggle="tab" href="#account" role="tab"
                    aria-controls="account" aria-selected="false">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="myorders-tab" data-toggle="tab" href="#myorders" role="tab"
                    aria-controls="myorders" aria-selected="true">My Orders</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                <h6 class="page-subtitle">Personal Details</h6>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-mute">Birth Date</label>
                            <p>25/10/1981</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="text-mute">Gender</label>
                            <p>Male</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-mute">Email Address</label>
                            <p>info@maxartkiller.com</p>
                        </div>
                    </div>
                </div>
                <h6 class="page-subtitle"><span>About</span></h6>
                <p class="text-mute">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut labore
                    et dolore magna aliqua.</p>
            </div>
            <div class="tab-pane fade " id="myorders" role="tabpanel" aria-labelledby="myorders-tab">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="card border-0 shadow-light text-center mb-4">
                            <div class="card-body position-relative">
                                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                                            class="material-icons text-danger vm">favorite</i></button></div>
                                <div class="h-100px position-relative overflow-hidden">
                                    <div class="background background-h-100">
                                        <img src="{{asset('assets/img/banner.png')}}" alt="">
                                    </div>
                                </div>
                                <h6 class="text-default">Kings Burger</h6>
                                <p class="small">Delicious Taste <br><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span></p>
                                <div class="row">
                                    <div class="col text-left">
                                        <p class="text-success my-0">$ 28<sup>.00</sup></p>
                                    </div>
                                    <div class="col-auto"><button
                                            class="btn btn-sm btn-link text-default p-0"><i
                                                class="material-icons">shopping_basket</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card  border-0 shadow-light text-center mb-4">
                            <div class="card-body position-relative">
                                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                                            class="material-icons text-danger vm">favorite</i></button></div>
                                <div class="h-100px position-relative">
                                    <div class="background background-h-100">
                                        <img src="{{asset('assets/img/banner2.png')}}" alt="">
                                    </div>
                                </div>
                                <h6 class="text-default">Pizza Special</h6>
                                <p class="small">Hand Tosted <br><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span></p>
                                <div class="row">
                                    <div class="col text-left">
                                        <p class="text-success my-0">$ 47<sup>.00</sup></p>
                                    </div>
                                    <div class="col-auto"><button
                                            class="btn btn-sm btn-link text-default p-0"><i
                                                class="material-icons">shopping_basket</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card border-0 shadow-light text-center mb-4">
                            <div class="card-body position-relative">
                                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                                            class="material-icons text-danger vm">favorite</i></button></div>
                                <div class="h-100px position-relative">
                                    <div class="background background-h-100">
                                        <img src="{{asset('assets/img/banner1.png')}}" alt="">
                                    </div>
                                </div>
                                <h6 class="text-default">Kings Meal</h6>
                                <p class="small">Amzaing Spices <br><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span></p>
                                <div class="row">
                                    <div class="col text-left">
                                        <p class="text-success my-0">$ 36<sup>.00</sup></p>
                                    </div>
                                    <div class="col-auto"><button
                                            class="btn btn-sm btn-link text-default p-0"><i
                                                class="material-icons">shopping_basket</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card border-0 shadow-light text-center mb-4">
                            <div class="card-body position-relative">
                                <div class="top-right mt-2"><button class="btn btn-link text-danger p-0"><i
                                            class="material-icons text-danger vm">favorite</i></button></div>
                                <div class="h-100px position-relative">
                                    <div class="background background-h-100">
                                        <img src="{{asset('assets/img/banner.png')}}" alt="">
                                    </div>
                                </div>
                                <h6 class="text-default">Kings Burger</h6>
                                <p class="small">Delicious Taste <br><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span><span
                                        class="text-warning icon_star"></span></p>
                                <div class="row">
                                    <div class="col text-left">
                                        <p class="text-success my-0">$ 12<sup>.00</sup></p>
                                    </div>
                                    <div class="col-auto"><button
                                            class="btn btn-sm btn-link text-default p-0"><i
                                                class="material-icons">shopping_basket</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
