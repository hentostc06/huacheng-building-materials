@extends('layouts.website', ['title' => 'Playlist Konten - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light py-14">
    <div class="hc-container">
        <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Konten / 内容</p>
        <h1 class="mt-4 text-4xl font-black tracking-tight text-hc-text">Playlist Konten</h1>
        <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
            Kumpulan konten video, promosi, dan dokumentasi Huacheng.
        </p>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container">
        @if($playlists->count())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($playlists as $playlist)
                    <article class="overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm">
                        @if($playlist->embed_url)
                            <div class="aspect-video bg-black">
                                <iframe
                                    src="{{ $playlist->embed_url }}"
                                    title="{{ $playlist->title }}"
                                    class="h-full w-full"
                                    allowfullscreen
                                ></iframe>
                            </div>
                        @else
                            <a href="{{ $playlist->url }}" target="_blank" rel="noopener noreferrer" class="block">
                                <div class="aspect-video bg-hc-bg">
                                    <img src="{{ $playlist->thumbnail_url }}" alt="{{ $playlist->title }}" class="h-full w-full object-cover">
                                </div>
                            </a>
                        @endif

                        <div class="p-6">
                            @if($playlist->platform)
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">{{ $playlist->platform }}</p>
                            @endif

                            <h2 class="mt-3 text-xl font-bold leading-snug text-hc-text">{{ $playlist->title }}</h2>

                            @if($playlist->title_zh)
                                <p class="mt-1 text-base font-semibold text-hc-primary">{{ $playlist->title_zh }}</p>
                            @endif

                            @if($playlist->description)
                                <p class="mt-4 text-sm leading-7 text-hc-softText">{{ $playlist->description }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">{{ $playlists->links() }}</div>
        @else
            <div class="rounded-[2rem] border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h2 class="text-2xl font-bold text-hc-text">Belum ada playlist aktif</h2>
                <p class="mt-3 text-hc-softText">Input playlist dari admin dan aktifkan statusnya.</p>
            </div>
        @endif
    </div>
</section>
@endsection
