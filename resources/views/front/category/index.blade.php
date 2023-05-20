@extends('front.layouts.front')

@section('title', 'Блог')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-down">
                            <a href="{{ route('front.category.show', $category->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $category->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{ $categories->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
