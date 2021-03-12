@extends('frontend.layouts.master')

@section('title')
    <title>Show Blog Post</title>
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <img src="{{ asset($banner->image) }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">{{ $banner->heading }}</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 about single-blog">
                    <div class="blog-item mb-5">
                      <div class="video-box d-flex justify-content-center align-items-stretch" style=" background: url({{ asset($blog->image) }}) center center no-repeat;" data-aos="zoom-in">
                        @if ($blog->video != Null)
                      <a href="{{ $item->video }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                      @endif
                      </div>
                      <div class="content p-5 pt-5">
                          <h4 data-aos="zoom-in">{{ $blog->title }}</h4>
                          <small data-aos="zoom-in">
                              <strong>{{ $blog->category->name }} - {{ $blog->created_at->format('F d, Y') }} - {{ $blog->comment->count() + $blog->reply->count() }} Comments</strong>
                          </small>
                          {!! $blog->content !!}
                        </div>

                        <div class="share-link">
                            <h5>Share This Post</h5>
                            <div class="links">
                                <a href="">
                                    <i class="icofont-twitter"></i>
                                </a>
                                <a href="">
                                    <i class="icofont-facebook"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </div>
                        </div>
                        <div class="recent-post">
                            <h4>Recent post</h4>
                            <div class="recent-post-slide owl-carousel m-auto" style="width: 80%;">
                                @foreach ($recent->limit(6)->get() as $item)
                                <a class="text-dark" href="{{ route('front.blog.show', ['slug' => $item->slug, 'id' => encrypt($item->id)]) }}">
                                    <div class="item text-center pb-2">
                                        <img src="{{ asset($item->image) }}" alt="">
                                        <div class="pt-4">
                                            <h6 class="text-dark">Treat Computer System If We Start Project</h6>
                                            <small>{{ $item->category->name }} - {{ $item->created_at->format('F m, Y') }} -  {{ $blog->comment->count() + $blog->reply->count() }} Comments</small>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="comment p-3" id="comment-parent">
                            <h4>Comment</h4>
                            @foreach ($blog->comment as $item)
                            <div class="comment-item">
                                <div class="user-img">
                                    <img src="{{ $item->user->image ? asset($item->user->image) : asset('frontend/images/users/user.jpg') }}" alt="">
                                </div>
                                <div class="comment-content pb-3">
                                    <h5>{{ $item->name }}</h5>
                                    <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                    <p>{{ $item->content }}</p>
                                    <div>
                                        <a class="text-dark"><i class="far fa-thumbs-up"></i>12</a>
                                        <a href="#reply{{ $item->id }}" data-toggle="collapse" class="ml-5 text-dark py-2 px-3"><i class="far fa-comment-alt"></i> Reply</a>
                                    </div>
                                </div>
                                <div id="reply{{ $item->id }}" class="collapse reply" data-parent="#comment-parent">

                                    {{-- =====================   REPLY ==================== --}}
                                    {{-- =====================   REPLY ==================== --}}

                                    @foreach ($item->reply as $reply)
                                    <div class="reply-item mt-3">
                                        <div class="user-img">
                                            <img src="{{ $reply->user->image ? asset($reply->user->image) : asset('frontend/images/users/user.jpg') }}" alt="">
                                        </div>
                                        <div class="comment-content pb-3">
                                            <h5>{{ $reply->name }}</h5>
                                            <span class="time">{{ $reply->created_at->diffForHumans() }}</span>
                                            <p>{{ $reply->content }}</p>
                                            <div>
                                                <a class="text-dark"><i class="far fa-thumbs-up"></i>12</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- =====================   REPLY ==================== --}}
                                    {{-- =====================   REPLY ==================== --}}
                                    @auth
                                    <div class="reply-item mt-3">
                                        <div class="comment-item">
                                            <div class="user-img">
                                                <img src="{{ Auth::user()->image != Null ? asset(Auth::user()->image) : asset('frontend/images/users/user.jpg') }}" alt="">
                                            </div>
                                            <div class="comment-content pb-3">
                                                <form action="{{ route('reply.store') }}" method="POST"> @csrf
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 form-group">
                                                            <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $save ? $save->name :'' }}">
                                                        </div>

                                                        <div class="col-md-6 col-12 form-group">
                                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $save ? $save->email :'' }}">
                                                        </div>

                                                        {{-- <div class="col-12 form-group">
                                                            <label for="save">
                                                                <input type="checkbox" id="save" class="form-control-checkbox" name="save" value="saveData">
                                                                <small>Save my name, email, and website in this browser for the next time I comment.  </small>
                                                            </label>
                                                            
                                                        </div> --}}

                                                        <div class="col-md-6 col-12 form-group">
                                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $save ? $save->phone :'' }}">
                                                        </div>

                                                        <div class="col-md-6 col-12 form-group">
                                                            <input name="company" type="text" class="form-control" placeholder="Company Name" {{ $save ? $save->company :'' }}>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Your Comment">{{ old('comment') }}</textarea>
                                                        </div>
                                                        @php
                                                            $data = session(['post' => encrypt($blog->id)]);
                                                        @endphp
                                                        <input type="hidden" name="comment_id" value="{{ encrypt($item->id) }}">
                                                        <div class="form-group col-md-6 col-12">
                                                            <button type="submit" class="btn btn-primary">Post Comment</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                            @endforeach

                            @auth
                            <div class="comment-item">
                                <div class="user-img">
                                    <img src="{{ Auth::user()->image != Null ? asset(Auth::user()->image) : asset('frontend/images/users/user.jpg') }}" alt="">
                                </div>
                                <div class="comment-content pb-3">
                                    <form action="{{ route('comment.store') }}" method="POST"> @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12 form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $save ? $save->name :'' }}">
                                            </div>
                                            <div class="col-md-6 col-12 form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $save ? $save->email :'' }}">
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="save">
                                                    <input type="checkbox" id="save" class="form-control-checkbox" {{ $save ? 'checked' :'' }} name="save" value="save">
                                                    <small>Save my name, email, and website in this browser for the next time I comment.</small>
                                                </label>
                                                
                                            </div>
                                            <div class="col-md-6 col-12 form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ $save ? $save->phone :'' }}">
                                            </div>
                                            <div class="col-md-6 col-12 form-group">
                                                <input name="company" type="text" class="form-control" placeholder="Company Name" value="{{ $save ? $save->company :'' }}">
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea name="comment" id="" cols="30" rows="5" class="form-control" placeholder="Your Comment">{{ old('comment') }}</textarea>
                                            </div>
                                            @php
                                                $data = session(['post' => encrypt($blog->id)]);
                                            @endphp
                                            <div class="form-group col-md-6 col-12">
                                                <button type="submit" class="btn btn-primary">Post Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endauth

                        </div>
                    </div>


                </div>
                <div id="catagory-bar" class="col-12 col-md-4">
                    <div class="blog-search">
                        <form action="{{ route('blog.index') }}" method="get">
                          <div class="search-box">
                            <input type="text" name="search" class="form-control" placeholder="Serach Here">
                            <button type="submit"><i class="fas fa-search"></i></button>
                          </div>
                        </form>
                    </div>

                    <div class="catagory">
                      <div class="text-center">
                        <h3>Catagories</h3>
                      </div>
                      @foreach ($category as $item)
                      <a href="{{ route('front.blog.category', encrypt($item->id)) }}"> {{ $item->name }}</a>
                      @endforeach
                    </div>

                    <div class="feature-post">
                        @foreach ($recent->limit(6)->get() as $item)
                        <div class="item">
                            <a href="{{ route('front.blog.show', ['slug' => $item->slug, 'id' => encrypt($item->id)]) }}">
                              <div class="img float-left">
                                <img src="{{ asset($item->image) }}" alt="">
                              </div>
                              <div class="content">
                                <h6>{{ substr($item->title, 0, 25) }} ...</h6>
                                <small>{{ $item->category->name }} - {{ $item->created_at->format('F m, Y') }}</small>
                              </div>
                            </a>
                          </div>
                        @endforeach
                    </div>

                    <div class="calendar">
                      <div style="position: relative;">
                        <h3 id="monthAndYear"></h3>

                        <div class="nxt-prev">
                          <button id="previous" onclick="previous()"><i class="fas fa-chevron-left"></i></button>
                          <button id="next" onclick="next()"><i class="fas fa-chevron-right"></i></button>
                        </div>

                      </div>
                      <table class="table table-bordered text-center">
                        <thead>
                          <tr>
                            <th scope="col">Mo</th>
                            <th scope="col">Tu</th>
                            <th scope="col">We</th>
                            <th scope="col">Th</th>
                            <th scope="col">Fr</th>
                            <th scope="col">Sa</th>
                            <th scope="col">Su</th>
                          </tr>
                        </thead>
                        <tbody id="calendar-body">

                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection