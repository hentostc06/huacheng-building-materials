@if(($blogPosts ?? collect())->isNotEmpty())
<section class="bg-hc-bg py-16">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Blog / 新闻</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Blog Perusahaan</h2>
                <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
                    Artikel perusahaan dari admin akan tampil di bagian ini.
                </p>
            </div>

            <a href="{{ route('blog.index') }}" data-hc-button-ready="1" class="inline-flex h-12 items-center justify-center rounded-full bg-hc-primary px-6 text-sm font-bold text-white shadow-soft transition hover:bg-hc-primaryDark">
                Lihat Semua Blog
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($blogPosts as $post)
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
                            <h3 class="mt-3 text-xl font-bold leading-snug text-hc-text transition hover:text-hc-primary">{{ $post->title }}</h3>
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
    </div>
</section>
@endif
