@extends('layout.main-menu')
@section('content')
    <section class="carousel slide" data-ride="carousel" id="carousel" data-interval="false">
        <div class="container">
            <div class="row">
                @php
                    $variable = 1;
                @endphp
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                </ol>
                <div class="col-1 lead d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary-outline prev" href="#carousel" title="go back" data-slide="prev"><i class="fa fa-lg fa-chevron-left"></i></a>
                </div>
                @php
                    $variable2 = $variable + 4;
                @endphp
                <div class="col-10 px-0">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-deck">
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $variable2 }}</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                </div>
                                <div class="card border-primary mb-3">
                                </div>
                            </div>
                            <div class="card-deck">
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-deck">
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-deck">
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <img class="card-img-top" src="http://i.imgur.com/EW5FgJM.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1 lead d-flex align-items-center justify-content-start">
                    <a class="btn btn-primary-outline next" href="#carousel" title="more" data-slide="next"><i class="fa fa-lg fa-chevron-right"></i></a>
                </div>
            </div>
        </div>        
    </section>
@endsection
@section('script')
    <script>
        // (function($) {
        // "use strict";

        // // manual carousel controls
        // $('.next').click(function(){ $('.carousel').carousel('next');return false; });
        // $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

        // })(jQuery);    
    </script>
@endsection