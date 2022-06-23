<div class="row">
    @foreach($artikels as $a)
        <div class="blog__item">
            <div class="blog__item__pic">
                <img src="{{ $a -> url_gambar }}" alt="">
            </div>
            <div class="blog__item__text">
                <ul>
                    <li><i class="fa fa-user-o"></i> Admin</li>
                </ul>
                <h5><a href="#">{{ $a -> judul }}</a></h5>
                <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
            </div>
        </div>
    @endforeach
</div>
{!! $artikels->render() !!}
