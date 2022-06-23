@extends('layouts.frontend')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tambah Artikel</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Tambah Artikel</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Form Tambah Artikel</h4>
                <form action="{{ route('myartikel.store') }}"  method="POST" enctype="multipart/form-data" id="usrform">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Judul Artikel<span>*</span></p>
                                        <input type="text" name="judul">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Url Gambar Artikel<span>*</span></p>
                                        <input type="text" name="url_artikel">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Isi Artikel<span>*</span></p>
                                <textarea rows="4" cols="100" name="isi_artikel" form="usrform"></textarea>
                            </div>
    
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <button type="submit" class="site-btn">TAMBAH ARTIKEL</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
