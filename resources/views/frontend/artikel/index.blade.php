@extends('layouts.frontend')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Artikel</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Artikel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="row">
                @foreach($artikels as $a)
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ $a -> url_gambar }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li>
                                    <i class="fa fa-user-o"></i> Admin
                                </li>
                                @if (Auth::user())

                                @if (Auth::user()->role_id == 1)
                                {{-- @can('artikel-permission') --}}
                                <li>
                                    <form action="{{ route('myartikel.destroy', $a->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="if(!confirm('Are you sure you want to destroy this data')) return false;"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                    {{-- @endcan --}}
                                </li>
                                @endif
                                @endif
                            </ul>
                            <h5><a href="#">{{ $a ->judul }}</a></h5>
                            <a href="/myartikel/{{ $a->id }}" class="blog__btn">READ MORE <span
                                    class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection