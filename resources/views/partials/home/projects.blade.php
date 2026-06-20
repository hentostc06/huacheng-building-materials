@php
    $projectItems = $projects ?? collect();
    $visibleProjects = $projectItems->take(3);
    $hasMoreProjects = $projectItems->count() > 3;
@endphp

@if($projectItems->isNotEmpty())
<section class="bg-hc-bg py-16">
    <div class="hc-container">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Proyek / 项目案例</p>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-hc-text sm:text-4xl">Proyek Dikerjakan</h2>
            </div>

            @if($hasMoreProjects)
                <a href="{{ route('projects.index') }}" class="button hc-section-head-cta">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            @endif
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($visibleProjects as $project)
                <article class="hc-uniform-card overflow-hidden rounded-[2rem] border border-hc-line bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                    <div class="hc-uniform-card-media">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                    </div>

                    <div class="hc-uniform-card-body p-6">
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

@if($hasMoreProjects)
            <div class="hc-section-bottom-cta">
                <a href="{{ route('projects.index') }}" class="button">
                    <span>Lihat Selengkapnya / 查看更多</span>
                </a>
            </div>
        @endif
    </div>
</section>
@endif
