@extends('frontend.layouts.master')

@section('title')
    <title>Blog</title>
@endsection
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <img src="{{ asset('storage/frontend/images/Rectangle_2.png') }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">Blog</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 about">
                  @forelse ($blog as $item)
                  <div class="blog-item mb-5">
                    <div class="video-box d-flex justify-content-center align-items-stretch" data-aos="zoom-in" style=" background: url({{ asset($item->image) }}) center center no-repeat;">
                      @if ($item->video != Null)
                      <a href="{{ $item->video }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                      @endif
                      <div class="meta">
                        <span>{{ $item->category->name }} - {{ $item->created_at->format('F d, Y') }} - {{ $item->comment->count() + $item->reply->count() }} Comments</span>
                      </div>
                    </div>
                    <div class="content p-3 pt-5">
                      <a href="{{ route('blog.show', ['slug' => $item->slug, 'id' => encrypt($item->id)]) }}">
                        <h4>{{ $item->title }}</h4>
                        <p>{!! substr($item->content, 0, 300) !!}</p>
                      </a>
                    </div>
                  </div>
                  @empty
                  <div class="col-12 text-center">
                    <h4>Opos! Post Not Found....</h4>
                  </div>
                  @endforelse
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
                        <a href="{{ route('blog.index.category', encrypt($item->id)) }}"> {{ $item->name }}</a>
                      @endforeach
                    </div>

                    <div class="feature-post">
                      @foreach ($query->limit(3)->get() as $item)
                      <div class="item">
                        <a href="#">
                          <div class="img float-left">
                            <img src="{{ asset($item->image) }}" alt="">
                          </div>
                          <div class="content">
                            <h6>{{ substr($item->title, 0, 25) }} ...</h6>
                            <small>{{ $item->created_at->format('F d, Y') }}</small>
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