@extends('layouts.main')

@section('title', 'DronePilot | Мои работы')
@section('description', 'Примеры моих работ с использованием БПЛА')
@section('keywords', 'drone, DJI, Mavic Air')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
            <article role="pge-title-content" class="blog-header">
                <header>
                    <h2><span>Работы</span> Фото, видео, панормы в 360"</h2>
                </header>
                <p>Get all information about our studio from latest news posts & updates page.</p>
            </article>
            <ul class="grid-lod effect-2" id="grid">
                @foreach ($left as $item)
                    @if (isset($item->alias))
                        <li>
                            <section class="blog-content">
                                <a href="{{ route('work.inner', ['alias' => $item->alias]) }}">
                                    <figure>
                                        <div class="post-date">
                                            <span>{{ date('j', strtotime($item->created_at)) }}</span>{{ russianMonth($item->created_at) . ' ' . date('Y', strtotime($item->created_at)) }}
                                        </div>
                                        <img
                                            src="{{ is_file(public_path('/storage/main/' . $item->image)) ? '/storage/main/' . $item->image : '/images/placeholder.png' }}"
                                            alt="" class="img-responsive"/>
                                    </figure>
                                </a>
                                <article>{{ $item->name }}</article>
                            </section>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <ul class="grid-lod effect-2" id="grid">
                @foreach ($right as $item)
                    @if (isset($item->alias))
                        <li>
                            <section class="blog-content">
                                <a href="{{ route('work.inner', ['alias' => $item->alias]) }}">
                                    <figure>
                                        <div class="post-date">
                                            <span>{{ date('j', strtotime($item->created_at)) }}</span>{{ russianMonth($item->created_at) . ' ' . date('Y', strtotime($item->created_at)) }}
                                        </div>
                                        <img
                                            src="{{ is_file(public_path('/storage/main/' . $item->image)) ? '/storage/main/' . $item->image : '/images/placeholder.png' }}"
                                            alt="" class="img-responsive"/>
                                    </figure>
                                </a>
                                <article>{{ $item->name }}</article>
                            </section>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
