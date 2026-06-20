@extends('layouts.website', ['title' => 'Proyek Dikerjakan - Huacheng Building Materials'])

@section('content')
<section class="bg-hc-light py-14">
    <div class="hc-container">
        <p class="text-sm font-bold uppercase tracking-[0.22em] text-hc-primary">Proyek / 项目案例</p>
        <h1 class="mt-4 text-4xl font-black tracking-tight text-hc-text">Proyek Dikerjakan</h1>
        <p class="mt-4 max-w-2xl text-base leading-8 text-hc-softText">
            Dokumentasi proyek dan penggunaan material Huacheng.
        </p>
    </div>
</section>

<section class="bg-white py-14">
    <div class="hc-container">
        @if($projects->count())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($projects as $project)
                    <article class="overflow-hidden rounded-2xl border border-hc-line bg-white shadow-sm">
                        <div class="hc-uniform-card-media">
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                        </div>

                        <div class="hc-uniform-card-body p-6">
                            @if($project->location)
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-hc-primary">{{ $project->location }}</p>
                            @endif

                            <h2 class="mt-3 text-xl font-bold leading-snug text-hc-text">{{ $project->title }}</h2>

                            @if($project->title_zh)
                                <p class="mt-1 text-base font-semibold text-hc-primary">{{ $project->title_zh }}</p>
                            @endif

                            @if($project->description)
                                <p class="mt-4 text-sm leading-7 text-hc-softText">{{ $project->description }}</p>
                            @endif

                            @if($project->description_zh)
                                <p class="mt-3 text-sm leading-7 text-slate-500">{{ $project->description_zh }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">{{ $projects->links() }}</div>
        @else
            <div class="rounded-2xl border border-dashed border-hc-line bg-hc-bg p-10 text-center">
                <h2 class="text-2xl font-bold text-hc-text">Belum ada proyek aktif</h2>
                <p class="mt-3 text-hc-softText">Input proyek dari admin dan aktifkan statusnya.</p>
            </div>
        @endif
    </div>
</section>
@endsection
