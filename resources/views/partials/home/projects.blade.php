@if(($projects ?? collect())->isNotEmpty())
<section class="bg-hc-bg py-16">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Proyek / 项目案例</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Proyek Dikerjakan</h2>
                <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
                    Proyek yang sudah diinput dari admin akan tampil di bagian ini.
                </p>
            </div>

            <a href="{{ route('projects.index') }}" data-hc-button-ready="1" class="inline-flex h-12 items-center justify-center rounded-full bg-hc-primary px-6 text-sm font-bold text-white shadow-soft transition hover:bg-hc-primaryDark">
                Lihat Semua Proyek
            </a>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($projects as $project)
                <article class="overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                    <div class="aspect-[4/3] bg-hc-bg">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                    </div>

                    <div class="p-6">
                        @if($project->location)
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">{{ $project->location }}</p>
                        @endif

                        <h3 class="mt-3 text-xl font-bold leading-snug text-hc-text">{{ $project->title }}</h3>

                        @if($project->title_zh)
                            <p class="mt-1 text-base font-semibold text-hc-primary">{{ $project->title_zh }}</p>
                        @endif

                        @if($project->description)
                            <p class="mt-4 line-clamp-3 text-sm leading-6 text-hc-softText">{{ $project->description }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
