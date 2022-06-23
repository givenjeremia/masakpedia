@extends('layouts.frontend')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kategori</h2>
                    {{-- <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Resep</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

{{-- leaderboard --}}

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($kategori as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/kategori/'.$item->nama.'.jpeg') }}">
                    </div>
                    <div class="product__item__text">
                        <h6><a href="/kategori/{{ $item->nama }}/{{ $item->id }}">{{ $item->nama }}</a></a></h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection