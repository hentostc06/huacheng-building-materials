@extends('layouts.website', ['title' => $post->title . ' - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light py-14">
    <div class="hc-container max-w-4xl">
        <a href="{{ route('blog.index') }}" class="text-sm font-bold text-hc-primary">← Kembali ke Blog</a>

        <h1 class="mt-5 text-4xl font-black leading-tight tracking-tight text-hc-text sm:text-5xl">
            {{ $post->title }}
        </h1>

        @if($post->title_zh)
            <h2 class="mt-4 text-2xl font-black text-hc-primary">{{ $post->title_zh }}</h2>
        @endif

        <p class="mt-5 text-sm font-semibold text-slate-500">
            {{ optional($post->published_at)->format('d M Y H:i') ?: 'Blog Perusahaan' }}
        </p>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container max-w-4xl">
        <div class="overflow-hidden rounded-2xl border border-hc-line bg-hc-bg shadow-sm">
            <img src="{{ $post->cover_image_url }}" alt="{{ $post->title }}" class="h-auto w-full object-cover">
        </div>

        <article class="prose prose-slate mt-10 max-w-none text-hc-softText">
            @if($post->content)
                <div class="whitespace-pre-line leading-8">{{ $post->content }}</div>
            @endif

            @if($post->content_zh)
                <hr class="my-8">
                <div class="whitespace-pre-line leading-8 text-slate-500">{{ $post->content_zh }}</div>
            @endif
        </article>
    </div>
</section>
@endsection
