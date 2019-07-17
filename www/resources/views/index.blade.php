@extends('layouts.main')

@section('title', 'DronePilot | Главная страница')
@section('description', 'Статьи и записи от личного использования БПЛА DJI Mavic Air')
@section('keywords', 'drone, DJI, Mavic Air, dronepilots, DJI Spark')

@section('content')
    <div class="row">
        <div class="col-xl-10 col-lg-9 col-xl-80per">
            <div class="blog-listing">
                <div class="row">

                    @foreach ($result as $item)
                        @if (isset($item->alias))
                            <div class="col-xl-6 col-12">
                                <div class="blog-item">
                                    <div class="blog-media mb-20">
                                        <img src="{{ is_file(public_path('/storage/main/' . $item->image)) ? '/storage/main/' . $item->image : '/images/placeholder.png' }}" alt="Roadie">
                                        <div class="blog-effect"></div>
                                        <a href="{{ route('blog.inner', ['alias' => $item->alias]) }}" title="Click For Read More" class="read">&nbsp;</a>
                                    </div>
                                    <div class="blog-detail">
                                        <span class="post-date">{{ date('j', strtotime($item->created_at)) . ' ' . russianMonth($item->created_at) . ' ' . date('Y', strtotime($item->created_at))}}</span>
                                        <div class="blog-title"><a href="{{ route('blog.inner', ['alias' => $item->alias]) }}">{{ $item->name }}</a>
                                        </div>
                                        <p>Uses a dictionary of over 200 Latin words, combined with a handful of model
                                            sentence structures donec sollicitudin erat eget malesuada scelerisque.
                                            Nullam consectetur, arcu sed tincidunt mattis, massa nunc sodales mauris, ut
                                            lobortis arcu tortor in risus.</p>
                                        <hr>
                                        <div class="post-info">
                                            <ul>
                                                <li><span>By</span><a href="javascript:void(0)"> cormon jons</a></li>
                                                <li><a href="javascript:void(0)">(5) comments</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach



                </div>
            </div>
        </div>
        @widget('Sidebar')
    </div>
@endsection
