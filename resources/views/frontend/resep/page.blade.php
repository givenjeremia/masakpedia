<div class="row">
    @foreach($reseps as $r)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{ $r -> url_gambar }}">
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="{{ route('resep.show', $r->id) }}">{{ $r -> nama }}</a></h6>
                <h5><i class="fa fa-heart"></i> {{ $r -> sukai }}&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 5</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
{!! $reseps->render() !!}
