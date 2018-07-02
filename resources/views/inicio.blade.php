@extends('layout.main')
@section('content')
    <article class="content d-flex align-items-center justify-content-center">
        <section class="section">
            <h1 class="display-1 text-center">Bienvenido!</h1>
            <h1 class="display-3 text-center">{{ Auth::user()->role->nombre }}</h1>
        </section>
    </article>
@endsection