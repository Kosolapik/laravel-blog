@extends('front.layouts.front')

@section('title')
    [ laravel-blog | {{ $post->title }} ]
@endsection

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-down">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('d F Y') }} • {{ $date->format('W:i') }} • {{ $post->comments->count() }}
                коментариев • {{ $post->likedUsers->count() }} лайков</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <div class="col-md-12" data-aos="fade-up" style="max-height: 90vh">
                        <img class="rounded mx-auto d-block img-thumbnail img-fluid"
                            src="{{ asset('storage/' . $post->preview) }}" alt="blog post" style="max-height: 100%">
                    </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <section class="row mb-3 ml-2">
                <div class="">
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
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="comment-list">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                        @foreach ($post->comments as $comment)
                            <div class="blog-post post-content">
                                <blockquote data-aos="fade-up" class="aos-init aos-animate">
                                    <p>{{ $comment->message }}</p>
                                    <footer class="blockquote-footer">
                                        {{ $comment->user->name }} <span
                                            class="text-muted float-right">{{ $comment->created_date->diffForHumans() }}</span>
                                    </footer>
                                </blockquote>
                        @endforeach
                    </section>
                    @auth
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Оставьте коментарий</h2>
                            <form action="{{ route('front.post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Комментарий</label>
                                        <textarea name="message" class="form-control" placeholder="Напишити ваш комментарий" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                    @if ($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4 aos-init aos-animate" data-aos="fade-up">Вам может понравиться
                            </h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"
                                        style="height: 200px">
                                        <img src="{{ asset('storage/' . $relatedPost->preview) }}" alt="related post"
                                            class="post-thumbnail" style="object-fit:contain; height: 100%">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <a href="{{ route('front.post.show', $relatedPost->id) }}"
                                            class="blog-post-permalink">
                                            <h5 class="post-title">{!! $relatedPost->title !!}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
