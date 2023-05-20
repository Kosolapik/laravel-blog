@extends('front.layouts.front')

@section('title')
    {{ $categoryTitle }}
@endsection

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $categoryTitle }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-down">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth
                                    <form action="{{ route('front.post.likes.store', $post->id) }}" method="POST">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button class="border-0 bg-transparent" type="submit">
                                            @if (auth()->user()->likedPosts->contains($post->id))
                                                <i class="fa-solid fa-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('front.post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
