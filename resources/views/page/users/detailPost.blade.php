@extends('master')
@push('css')

@endpush
@section('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=735608016911729&autoLogAppEvents=1"></script>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-last ftco-animate">
                    <h3 class="mb-3" style="color: blueviolet">{{ $post->title }}</h3>
                    <div class="fb-like" data-href="https://blogmonngon.tk/{{$post->id}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                     <p>Tác giả: {{ $post->user->name }}  Created {{ $post->created_at->diffForHumans() }} ({{ $post->created_at}})
                    </p>
                    <h3 class="mb-3 mt-5"></h3>
                    <div class="row">
                        <div class="col-md-6">
                            {!! $post->description !!}
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('storage/upload/images/' . $post->image)}}" alt="" style="width: 650px;height: 433px" class="img-fluid">
                        </div>
                    </div>

                    <h3 class="mb-3 mt-5">Chuẩn bị nguyên liệu:</h3>
                    <p>{!! $post->material !!}</p>
                    <h2 class="mb-3 mt-5">Cách làm :</h2>
                    <p>
                        {!! $post->recipe !!}

                    </p>
                    <div class="col-md-12 text-center" style="text-align: justify">
                        @if(isset($post->video))
                            <video id="video" width="560" height="365" controls autoplay>
                                <source src="{{asset('storage/upload/videos/' . $post->video)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <div class="media-body">
                                {!! Embed::make($post->link)->parseUrl()->getIframe() !!}
                            </div>
                        @endif
                    </div>
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <h6>Từ Khóa:</h6>
                        <div class="tagcloud">
                            @foreach($post->tags as $tag)
                                <a href="{{ route('tag.posts',$tag->id) }}" class="tag-cloud-link">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="fb-comments" data-href="http://blogmonngon.tk/{{$post->id}}" data-width="" data-numposts="5"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 50px">
                        <h2>Món liên quan </h2>
                        <div class="col-md-12">
                            <div class="row">
                                @foreach($postTags as $postTag)
                                    <div class="col-md-3 ftco-animate">
                                        <div class="blog-entry">
                                            <a href="{{ route('page.showDetail',$postTag->id) }}" class="img-2"><img src="{{asset('storage/upload/images/'. $postTag->image) }}"
                                                                                          class="img-fluid" style="width: 450px;height: 213px" alt="Colorlib Template"></a>
                                            <div class="text pt-3">
                                                <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                                        class="ml-auto pl-3">{{$postTag->created_at}}</span>
                                                </p>
                                                <p class="mb-0"><a href="{{ route('page.showDetail',$postTag->id) }}" class="btn btn-black py-2">Đọc thêm
                                                        <span class="icon-arrow_forward ml-4"></span></a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
<div class="clear-fix"></div>
                        <div class="col-md-12">
                            <h2>Món gần đây</h2>
                            <div class="row">
                                @foreach($postRecents as $postRecent)
                                    <div class="col-md-3 ftco-animate">
                                        <div class="blog-entry">
                                            <a href="{{ route('page.showDetail',$postRecent->id) }}" class="img-2"><img src="{{asset('storage/upload/images/'. $postRecent->image) }}"
                                                                                          class="img-fluid" style="width: 520px;height: 245px" alt="Colorlib Template"></a>
                                            <div class="text pt-3">
                                                <p class="meta d-flex"><span class="pr-3">Dessert</span><span
                                                        class="ml-auto pl-3">{{$postRecent->created_at}}</span>
                                                </p>
                                                <p class="mb-0"><a href="{{ route('page.showDetail',$postRecent->id) }}" class="btn btn-black py-2">Đọc thêm
                                                        <span class="icon-arrow_forward ml-4"></span></a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $postRecents->links() }}

                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
        </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="clearfix" ></div>

@endsection
@push('js')
@endpush
