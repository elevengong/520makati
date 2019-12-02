@extends("frontend.layout")
@section('content')
    <style>
        .container .i-title {
            border-bottom: 1px dotted #ccc;
            margin-bottom: 35px;
            position: relative;
            clear: both;
            height: 30px;
            top: 20px;
        }
        .container .i-title h5 {
            border-bottom: 1px solid #E43D4D;
            color: #634E4B;
            height: 40px;
            line-height: 40px;
            position: absolute;
            left: 0px;
            bottom: -1px;
            font-size: 18px;
            font-weight: bold;
        }
        .container .imgbox {
            float: left;
            padding: 3px;
            border-radius: 12px;
        }

        .container .imgbox img {
            width: 380px;
            height: 500px;
            border-radius: 12px;
        }

        .container .about {
            float: left;
            position: relative;
            width: 500px;
            line-height: 24px;
            font-size: 16px;
            color: #333;
            margin-left: 80px;
        }

        .container .about p {
            margin-bottom: 8px;
        }

        .fuwu-list ul li {
            float: left;
            width: 50%;
            font-size: 16px;
            padding: 5px 0;
            list-style: disc;
        }
        .container .video video, .container .video embed {
            height: 400px;
            width: 600px;
            background-color: #000;
            margin: 0 auto;
        }
        .container .video{
            text-align: center;
        }

        .csmx-section {
            padding: 20px 0;
        }
        @media screen and (min-width: 760px) and (max-width: 1200px) {
            .container .imgbox img {
                width: 300px;
                height: 400px;
            }
            .container .about {
                margin-left: 20px;
            }
            .container .about {
                width: 22rem;
                line-height: 19px;
                font-size: 14px;
                margin-left: 10px;
            }

        }

        @media screen and (min-width: 320px) and (max-width: 750px) {
            .container .imgbox img {
                width: 10rem;
                height: 15rem;
                border-radius: 12px;
            }
            .container .about {
                width: 13rem;
                line-height: 13px;
                font-size: 12px;
                color: #333;
                margin-left: 10px;
            }

            .fuwu-list ul li {
                width: 90%;
                font-size: 11px;
            }
            .csmx-section {
                padding: 10px 0;
            }
            .container .video video, .container .video embed {
                width: 20rem;
                height: 13rem;
            }
        }
    </style>
    <div class="csmx-section">
        <div class="container full">
            <div class="i-title"><h5>Girl Details/女孩详细</h5></div>

            <div>
                <div class="imgbox"><img src="{{$girl['cover']}}"></div>
                <div class="about">
                    <p style="color: red;font-weight: bold;">{{$statusArray[$girl['status']]}}</p>
                    @foreach($introArray as $intro)
                        <p>{{$intro}}</p>
                    @endforeach

                    @if(!empty($number))
                    <p class="phone">
                        Mobile 联络号码 : {{$number[0]}}
                    </p>
                    @endif

                    @if(!empty($telegram))
                    <p class="telegram">
                        电报 : {{$telegram[0]}}
                    </p>
                    @endif
                    @if(!empty($weixin))
                    <p class="weixin">
                        微信 : {{$weixin[0]}}
                    </p>
                    @endif
                </div>
            </div>

            @if(!empty($serviceArray))
            <div class="i-title"><h5>Server/服务</h5></div>

            <div class="fuwu-list">
                <ul class="fix">
                    @foreach($serviceArray as $service)
                    <li>{{$service}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(!empty($videosArray))
            <div class="i-title" style="margin-top:30px;"><h5>Video/视频</h5></div>
            <div class="video">
                @foreach($videosArray as $video)
                <div>
                    <iframe width="560" height="315" src="{{$video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endforeach
            </div>
            @endif

            <div class="i-title" style="margin-top:30px;"><h5>More Photos/更多照片</h5></div>
            <div class="wpb_wrapper">
                @foreach($photos as $photo)
                <p><img class="alignnone wp-image-7257 size-full" src="{{$photo['photo']}}" alt=""></p>
                @endforeach

            </div>


            <div class="csmx-post-nav clearfix">
                <div class="row">

                    <div class="col-sm-6">
                        @if(!empty($preData))
                        <a href="/beauty/{{$preData['0']['id']}}" title="{{$preData['0']['name']}}">
                            <i class="icon-navigation-prev"></i>
                            <div class="thumb">
                                <div class="csmx-media">
                                    <img src="{{$preData['0']['cover']}}" alt="">
                                    <span class="overlay-border"></span>
                                </div>
                            </div>
                            <div>
                                <strong>{{$preData['0']['name']}} <img draggable="false" role="img" class="emoji" src="{{$preData['0']['flag']}}"></strong><br>
                                <span>{{$preData['0']['nation']}}</span>
                            </div>
                        </a>
                        @endif
                    </div>

                    @if(!empty($nextData))
                    <div class="col-sm-6 next-post">
                        <!-- next project -->
                        <a href="/beauty/{{$nextData['0']['id']}}" title="{{$nextData['0']['name']}}">
                            <div>
                                <strong>{{$nextData['0']['name']}} <img draggable="false" role="img" class="emoji" src="{{$nextData['0']['flag']}}"></strong><br>
                                <span>{{$nextData['0']['nation']}}</span>
                            </div>
                            <div class="thumb"><div class="csmx-media">
                                    <img src="{{$nextData['0']['cover']}}" alt="">
                                    <span class="overlay-border"></span>
                                </div>
                            </div>
                            <i class="icon-navigation-next"></i>
                        </a>
                        <!-- #next project -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection