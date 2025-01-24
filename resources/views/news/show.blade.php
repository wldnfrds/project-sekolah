<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('acara') }}">Berita</a></li>
                    <li class="current">{{ $news->title }}</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- News Detail Section -->
    <section class="news-detail py-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <article class="blog-detail">
                        <div class="post-img mb-4">
                            <img src="{{ asset('storage/' . $news->img_news) }}" alt="{{ $news->title }}"
                                class="img-fluid rounded w-100" style="object-fit: cover;">
                        </div>

                        <h1 class="title mb-4">{{ $news->title }}</h1>

                        <div class="meta-top mb-4">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $news->created_at->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                </li>
                            </ul>
                        </div>

                        <div class="content">
                            {!! $news->content !!}
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Berita Terbaru</h3>
                            @foreach ($recentNews as $recent)
                                <div class="post-item mt-3">
                                    <div class="row gy-4">
                                        <div class="col-4">
                                            <img src="{{ asset('storage/' . $recent->img_news) }}"
                                                alt="{{ $recent->title }}" class="img-fluid rounded">
                                        </div>
                                        <div class="col-8">
                                            <h4>
                                                <a href="{{ route('news.show', $recent->id) }}"
                                                    class="text-decoration-none text-dark hover-primary">
                                                    {{ $recent->title }}
                                                </a>
                                            </h4>
                                            <time>
                                                {{ $recent->created_at->locale('id')->isoFormat('D MMMM Y') }}
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* .blog-detail .post-img {
            max-height: 500px;
            overflow: hidden;
        } */

        .blog-detail .content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 600;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #0d6efd;
            margin-bottom: 1rem;
        }

        .post-item {
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        .post-item:last-child {
            border-bottom: none;
        }

        .post-item h4 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .post-item time {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .hover-primary:hover {
            color: #0d6efd !important;
        }
    </style>

    <x-footer></x-footer>
</x-layout>
