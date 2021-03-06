@extends('layouts.frontend')

@section('content')
<!-- Hero Section Begin -->
{{-- <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/Logo.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Home</h2>
                    <div class="breadcrumb__option">
                        <a href="/home">Home</a>
                        {{-- <span>Resep</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

{{-- leaderbord --}}

<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title related__product__title">
                <h2>Leaderboard</h2>
            </div>
        </div>
    </div>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Rangking</th>
            <th scope="col">Resep Nama</th>
            <th scope="col">Upload By</th>
            <th scope="col">Count Like</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($leaderbord as $item)
            <tr>
              <th scope="row">{{ $i }}</th>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->user->name }}</td>
              <td>{{ $item->sukai }}</td>
            </tr>  
            @php
                $i++;
            @endphp 
            @endforeach
        </tbody>
      </table>
</div>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                {{-- <div class="sidebar">
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-1.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-2.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-3.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-1.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-2.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('frontend/img/latest-product/lp-3.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="section-title related__product__title">
                    <h2>Artikel</h2>
                </div>
                <section class="blog spad">
                    <div class="container">
                        @include('frontend.page_artikel')
                    </div>
                </section>
            </div>
            <div class="col-lg-9 col-md-7">
                {{-- <h4>Resep</h4> --}}
                <div class="section-title related__product__title">
                    <h2>Resep</h2>
                </div>
                @include('frontend.page_resep')
                
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection