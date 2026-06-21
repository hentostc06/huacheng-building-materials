@once
<div
    class="fixed inset-0 z-[99999] hidden items-center justify-center bg-slate-950/60 px-4 backdrop-blur-sm"
    data-tiktok-mini-modal
>
    <button
        type="button"
        class="absolute inset-0 h-full w-full cursor-default"
        data-tiktok-mini-close
        aria-label="Tutup popup"
    ></button>

    <div class="relative z-10 w-full max-w-sm rounded-2xl border border-white/15 bg-white p-6 text-center shadow-2xl">
        <button
            type="button"
            class="absolute right-4 top-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition hover:bg-slate-200 hover:text-slate-900"
            data-tiktok-mini-close
            aria-label="Tutup popup"
        >
            ×
        </button>

        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-100 text-2xl font-black text-sky-700">
            ♪
        </div>

        <h3 class="mt-5 text-2xl font-black tracking-tight text-slate-900">
            Tonton di TikTok yuk?
        </h3>

        <p class="mt-3 text-sm leading-6 text-slate-500">
            Konten TikTok lebih stabil dibuka langsung dari TikTok.
        </p>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-center">
            <button
                type="button"
                class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50"
                data-tiktok-mini-close
            >
                Batal
            </button>

            <a
                href="#"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center rounded-full bg-sky-500 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-sky-600"
                data-tiktok-mini-link
            >
                Buka TikTok
            </a>
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
            const miniModal = document.querySelector('[data-tiktok-mini-modal]');
            const miniLink = document.querySelector('[data-tiktok-mini-link]');

            function openTikTokMiniModal(url) {
                if (!miniModal || !miniLink) {
                    window.open(url, '_blank', 'noopener,noreferrer');
                    return;
                }

                miniLink.href = url || '#';
                miniModal.classList.remove('hidden');
                miniModal.classList.add('flex');
                document.documentElement.style.overflow = 'hidden';
                document.body.style.overflow = 'hidden';
            }

            function closeTikTokMiniModal() {
                if (!miniModal) {
                    return;
                }

                miniModal.classList.add('hidden');
                miniModal.classList.remove('flex');
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
            }

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

            function hideElement(el) {
                if (!el) return;
                el.classList.add('hidden');
                el.classList.remove('flex', 'block');
            }

            function showElement(el, display = 'block') {
                if (!el) return;
                el.classList.remove('hidden');

                if (display) {
                    el.classList.add(display);
                }
            }

            function resetCard(card) {
                const preview = card.querySelector('[data-inline-playlist-preview]');
                const shell = card.querySelector('[data-inline-playlist-player-shell]');
                const iframe = card.querySelector('[data-inline-playlist-iframe]');
                const video = card.querySelector('[data-inline-playlist-video]');
                const fallback = card.querySelector('[data-inline-playlist-fallback]');

                showElement(preview, 'block');
                hideElement(shell);
                hideElement(iframe);
                hideElement(video);
                hideElement(fallback);

                if (iframe) {
                    iframe.src = '';
                }

                if (video) {
                    try {
                        video.pause();
                    } catch (e) {}

                    video.removeAttribute('src');
                    video.load();
                }
            }

            function closeOtherCards(currentCard) {
                document.querySelectorAll('[data-inline-playlist-card]').forEach(function (card) {
                    if (card !== currentCard) {
                        resetCard(card);
                    }
                });
            }

            function openCard(card, trigger) {
                const preview = card.querySelector('[data-inline-playlist-preview]');
                const shell = card.querySelector('[data-inline-playlist-player-shell]');
                const iframe = card.querySelector('[data-inline-playlist-iframe]');
                const video = card.querySelector('[data-inline-playlist-video]');
                const fallback = card.querySelector('[data-inline-playlist-fallback]');

                const embedUrl = trigger.dataset.embedUrl || '';
                const watchUrl = trigger.dataset.watchUrl || embedUrl || '#';
                const videoUrl = trigger.dataset.videoUrl || '';
                const platform = (trigger.dataset.platform || '').toLowerCase();

                const isTikTok = platform.includes('tiktok') || String(watchUrl).includes('tiktok.com');

                if (isTikTok && !videoUrl) {
                    openTikTokMiniModal(watchUrl);
                    return;
                }

                closeOtherCards(card);
                resetCard(card);

                hideElement(preview);
                showElement(shell, 'block');

                if (videoUrl) {
                    video.src = videoUrl;
                    showElement(video, 'block');
                    video.load();

                    const playPromise = video.play();

                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(function () {});
                    }

                    return;
                }

                if (embedUrl) {
                    iframe.src = withAutoplay(embedUrl);
                    showElement(iframe, 'block');
                    return;
                }

                showElement(fallback, 'flex');
            }

            document.addEventListener('click', function (event) {
                const trigger = event.target.closest('[data-inline-playlist-trigger]');

                if (trigger) {
                    event.preventDefault();

                    const card = trigger.closest('[data-inline-playlist-card]');

                    if (card) {
                        openCard(card, trigger);
                    }

                    return;
                }

                const closer = event.target.closest('[data-inline-playlist-close]');

                if (closer) {
                    event.preventDefault();

                    const card = closer.closest('[data-inline-playlist-card]');

                    if (card) {
                        resetCard(card);
                    }

                    return;
                }

                if (event.target.closest('[data-tiktok-mini-close]')) {
                    event.preventDefault();
                    closeTikTokMiniModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeTikTokMiniModal();

                    document.querySelectorAll('[data-inline-playlist-card]').forEach(function (card) {
                        resetCard(card);
                    });
                }
            });
        });
    })();
</script>
@endonce
