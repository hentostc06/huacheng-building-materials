@extends('layouts.website', ['title' => 'Blog Perusahaan - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light py-14">
    <div class="hc-container">
        <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Blog / 新闻</p>
        <h1 class="mt-4 text-4xl font-black tracking-tight text-hc-text">Blog Perusahaan</h1>
        <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
            Artikel, update, dan informasi perusahaan Huacheng Building Materials.
        </p>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container">
        @if($posts->count())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($posts as $post)
                    <article class="overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                        <a href="{{ route('blog.show', ['blogPost' => $post->slug]) }}" class="block">
                            <div class="aspect-[4/3] bg-hc-bg">
                                <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}" class="h-full w-full object-cover">
                            </div>
                        </a>

                        <div class="p-6">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">
                                {{ optional($post->published_at)->format('d M Y') ?: 'Blog Perusahaan' }}
                            </p>

                            <a href="{{ route('blog.show', ['blogPost' => $post->slug]) }}">
                                <h2 class="mt-3 text-xl font-bold leading-snug text-hc-text transition hover:text-hc-primary">
                                    {{ $post->title }}
                                </h2>
                            </a>

                            @if($post->title_zh)
                                <p class="mt-1 text-base font-semibold text-hc-primary">{{ $post->title_zh }}</p>
                            @endif

                            @if($post->excerpt)
                                <p class="mt-4 line-clamp-3 text-sm leading-6 text-hc-softText">{{ $post->excerpt }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">{{ $posts->links() }}</div>
        @else
            <div class="rounded-[2rem] border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h2 class="text-2xl font-bold text-hc-text">Belum ada blog aktif</h2>
                <p class="mt-3 text-hc-softText">Input blog dari admin dan aktifkan statusnya.</p>
            </div>
        @endif
    </div>
</section>
@endsection
