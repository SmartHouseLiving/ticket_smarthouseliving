<div class="flex-none border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur-sm">
    <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex min-w-0 items-center gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ $header?->logo ? asset('storage/' . $header->logo) : asset('images/logo.png') }}"
                    class="h-10 w-auto object-contain">
            </div>

            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-cyan-600/80">
                    {{ $header?->header_badge ?? 'Automation Support Portal' }}
                </p>

                <h1 class="truncate text-base font-semibold tracking-tight text-slate-900 sm:text-lg">
                    {{ $header?->header_title ?? 'Centro de Suporte Técnico' }}
                </h1>
            </div>
        </div>

        @auth
            <div class="flex items-center gap-3">

                <div class="hidden items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 sm:flex">
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 text-sm font-semibold text-slate-950">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium text-slate-900">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="truncate text-xs text-slate-500">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>

                <a href="{{ route('account.settings') }}"
                    class="inline-flex items-center rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-cyan-300 hover:bg-cyan-50 hover:text-slate-900">
                    {{ $header?->account_button_label ?? 'Conta' }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:scale-[1.02] hover:shadow-md">
                        {{ $header?->logout_button_label ?? 'Logout' }}
                    </button>
                </form>

            </div>
        @endauth
    </div>
</div>
