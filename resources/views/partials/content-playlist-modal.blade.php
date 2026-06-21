<div
    id="contentPlaylistModal"
    class="fixed inset-0 z-[99999] hidden items-center justify-center bg-slate-950/75 px-4 py-5 backdrop-blur-md sm:px-6"
    data-content-playlist-modal
    aria-hidden="true"
>
    <button
        type="button"
        class="absolute inset-0 h-full w-full cursor-default"
        data-content-playlist-close
        aria-label="Tutup popup"
    ></button>

    <div class="relative z-10 w-full max-w-6xl overflow-hidden rounded-[30px] border border-white/15 bg-white shadow-[0_30px_80px_rgba(15,23,42,0.35)]">
        <div class="relative border-b border-slate-200/80 bg-gradient-to-r from-slate-50 via-white to-sky-50/70 px-5 py-5 sm:px-7 sm:py-6">
            <div class="flex items-start justify-between gap-4">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <span
                            class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-[11px] font-extrabold uppercase tracking-[0.22em] text-sky-700"
                            data-content-playlist-platform
                        >
                            Konten
                        </span>

                        <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-[11px] font-semibold text-slate-500">
                            Popup Konten
                        </span>
                    </div>

                    <h3
                        class="mt-3 max-w-4xl text-xl font-black leading-tight text-slate-900 sm:text-2xl lg:text-[2rem]"
                        data-content-playlist-title
                    >
                        Playlist Konten
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Tonton konten Huacheng tanpa kehilangan halaman utama.
                    </p>
                </div>

                <button
                    type="button"
                    class="inline-flex h-11 w-11 flex-none items-center justify-center rounded-full bg-white text-slate-500 shadow-sm ring-1 ring-slate-200 transition hover:bg-slate-50 hover:text-slate-900"
                    data-content-playlist-close
                    aria-label="Tutup popup"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid gap-0 lg:grid-cols-[minmax(0,1.45fr)_360px]">
            <div class="flex items-center justify-center bg-slate-950 px-4 py-4 sm:px-6 sm:py-6">
                <div
                    class="w-full overflow-hidden rounded-[24px] border border-white/10 bg-black shadow-[0_18px_50px_rgba(0,0,0,0.35)]"
                    style="aspect-ratio: 16 / 9; max-width: 980px;"
                    data-content-playlist-frame-wrap
                >
                    <iframe
                        src=""
                        title="Content player"
                        class="hidden h-full w-full"
                        data-content-playlist-frame
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        referrerpolicy="strict-origin-when-cross-origin"
                    ></iframe>

                    <div
                        class="hidden h-full w-full items-center justify-center bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 px-6 py-10 text-center"
                        data-content-playlist-tiktok-message
                    >
                        <div class="mx-auto max-w-md rounded-[28px] border border-white/10 bg-white/10 px-6 py-8 shadow-2xl backdrop-blur-md">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-3xl shadow-lg">
                                ♪
                            </div>

                            <p class="mt-6 text-xs font-black uppercase tracking-[0.26em] text-sky-300">
                                TikTok Content
                            </p>

                            <h4 class="mt-3 text-2xl font-black tracking-tight text-white sm:text-3xl">
                                Putar di TikTok yuk?
                            </h4>

                            <p class="mt-4 text-sm leading-7 text-white/70">
                                Konten TikTok lebih stabil diputar langsung dari aplikasi atau website TikTok.
                            </p>

                            <a
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-6 inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 text-sm font-black text-white shadow-lg shadow-sky-500/20 transition hover:bg-sky-400"
                                data-content-playlist-tiktok-link
                            >
                                Buka di TikTok
                            </a>
                        </div>
                    </div>

                    <div
                        class="hidden h-full w-full items-center justify-center bg-slate-950 px-6 py-10 text-center"
                        data-content-playlist-fallback
                    >
                        <div class="max-w-md">
                            <h4 class="text-2xl font-black text-white">
                                Konten tidak dapat diputar
                            </h4>

                            <p class="mt-3 text-sm leading-7 text-white/70">
                                Gunakan tombol Buka Sumber untuk melihat konten dari platform aslinya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col border-t border-slate-200 bg-white lg:border-l lg:border-t-0">
                <div class="flex-1 space-y-5 px-5 py-5 sm:px-6 sm:py-6">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
                        <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-sky-700">
                            Deskripsi Konten
                        </p>

                        <p
                            class="mt-3 text-sm leading-7 text-slate-600"
                            data-content-playlist-description
                        >
                            Konten video Huacheng akan tampil di sini.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5">
                        <p class="text-xs font-extrabold uppercase tracking-[0.18em] text-sky-700">
                            Catatan
                        </p>

                        <ul class="mt-3 space-y-3 text-sm leading-6 text-slate-600">
                            <li class="flex gap-3">
                                <span class="mt-[7px] h-2 w-2 flex-none rounded-full bg-sky-500"></span>
                                <span>YouTube diputar langsung lewat player popup.</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-[7px] h-2 w-2 flex-none rounded-full bg-sky-500"></span>
                                <span>TikTok akan diarahkan ke platform TikTok agar pemutaran lebih stabil.</span>
                            </li>
                            <li class="flex gap-3">
                                <span class="mt-[7px] h-2 w-2 flex-none rounded-full bg-sky-500"></span>
                                <span>Tekan tombol X atau Tutup untuk kembali ke website Huacheng.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <button
                            type="button"
                            class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-700 transition hover:border-slate-400 hover:bg-slate-100"
                            data-content-playlist-close
                        >
                            Tutup
                        </button>

                        <a
                            href="#"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-full bg-sky-500 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-sky-600"
                            data-content-playlist-external
                        >
                            Buka Sumber
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        function ready(callback) {
            if (document.readyState !== 'loading') {
                callback();
                return;
            }

            document.addEventListener('DOMContentLoaded', callback);
        }

        ready(function () {
            const modal = document.querySelector('[data-content-playlist-modal]');

            if (!modal || modal.dataset.ready === '1') {
                return;
            }

            modal.dataset.ready = '1';

            const frame = modal.querySelector('[data-content-playlist-frame]');
            const tiktokMessage = modal.querySelector('[data-content-playlist-tiktok-message]');
            const tiktokLink = modal.querySelector('[data-content-playlist-tiktok-link]');
            const fallback = modal.querySelector('[data-content-playlist-fallback]');
            const frameWrap = modal.querySelector('[data-content-playlist-frame-wrap]');
            const title = modal.querySelector('[data-content-playlist-title]');
            const platform = modal.querySelector('[data-content-playlist-platform]');
            const description = modal.querySelector('[data-content-playlist-description]');
            const external = modal.querySelector('[data-content-playlist-external]');

            function withAutoplay(url) {
                if (!url) {
                    return url;
                }

                if (url.includes('youtube')) {
                    const separator = url.includes('?') ? '&' : '?';
                    return url + separator + 'autoplay=1';
                }

                return url;
            }

            function resetPlayer() {
                frame.src = '';
                frame.classList.add('hidden');

                tiktokMessage.classList.add('hidden');
                tiktokMessage.classList.remove('flex');

                fallback.classList.add('hidden');
                fallback.classList.remove('flex');

                frameWrap.style.aspectRatio = '16 / 9';
                frameWrap.style.maxWidth = '980px';
            }

            function openModal(trigger) {
                const embedUrl = trigger.dataset.embedUrl || '';
                const watchUrl = trigger.dataset.watchUrl || embedUrl;
                const rawPlatform = trigger.dataset.platform || 'Konten';
                const rawTitle = trigger.dataset.title || 'Playlist Konten';
                const rawDescription = trigger.dataset.description || '';

                resetPlayer();

                title.textContent = rawTitle;
                platform.textContent = rawPlatform;
                description.textContent = rawDescription || 'Tidak ada deskripsi tambahan untuk konten ini.';

                const sourceUrl = watchUrl || embedUrl || '#';
                external.href = sourceUrl;
                tiktokLink.href = sourceUrl;

                const isTikTok = rawPlatform.toLowerCase().includes('tiktok') || String(sourceUrl).includes('tiktok.com');

                if (isTikTok) {
                    tiktokMessage.classList.remove('hidden');
                    tiktokMessage.classList.add('flex');
                } else if (embedUrl) {
                    frame.src = withAutoplay(embedUrl);
                    frame.classList.remove('hidden');
                } else {
                    fallback.classList.remove('hidden');
                    fallback.classList.add('flex');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                modal.setAttribute('aria-hidden', 'false');
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modal.setAttribute('aria-hidden', 'true');
                resetPlayer();
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            }

            document.addEventListener('click', function (event) {
                const trigger = event.target.closest('[data-content-playlist-trigger]');

                if (trigger) {
                    event.preventDefault();
                    openModal(trigger);
                    return;
                }

                if (event.target.closest('[data-content-playlist-close]')) {
                    event.preventDefault();
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    })();
</script>
