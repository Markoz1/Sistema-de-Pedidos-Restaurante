@extends('layout.main-menu') 
@section('content')


<section class="section">
<article class="content cards-page">
    <div class="card-block">
        <div class="title-block">
            <h3 class="title"> Pedidos por entregar </h3>
        </div>
        <section class="section">
            <div class="row">
                @foreach()
                    <div class="col-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="header-block">
                                    <p class="title"> {{' nombre pedido '}} </p>
                                </div>
                            </div>
                            <div class="card-block">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                            <div class="card-footer"> Card Footer </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </section>
    </div>
</article>
</section>

@endsection
