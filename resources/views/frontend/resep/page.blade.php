<div class="row">

    @foreach($reseps as $r)
    @php
    $arraytampung = [];
    @endphp
    @foreach ($userAktivitasResep as $item)
    @if ($item->user_id == Auth::user()->id && $item->resep_id == $r->id )
    @php
    array_push($arraytampung,$item->suka);
    @endphp
    @break
    @else
    @endif
    @endforeach
    @php
    // dd($arraytampung[0]);
    @endphp
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{ $r -> url_gambar }}">
                <ul class="product__item__pic__hover">
                    <li>
                        {{-- Jika Sudah Di Like --}}
                        @foreach ($arraytampung as $item)

                        @if ( $item == 1)
                        <a href=""><i class="fa fa-heart" style="color:red;"></i> </a>
                        @endif

                        @endforeach

                        <a href="/myresep/sukai/{{ $r->id }}"><i class="fa fa-heart"></i></a>



                    </li>
                    @if (Auth::user())

                    @if (Auth::user()->role_id == 2)
                    @can('resep-permission')
                    <li>
                        <form action="{{ route('my_resep.destroy', $r->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="if(!confirm('Are you sure you want to destroy this data')) return false;"><i
                                    class="fa fa-trash"></i></button>
                        </form>
                        @endcan
                    </li>
                    @endif
                    @endif
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="{{ route('resep.show', $r->id) }}">{{ $r -> nama }} </a></h6>
                <h5><i class="fa fa-heart"></i> {{ $r -> sukai }}&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 5</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
{!! $reseps->render() !!}