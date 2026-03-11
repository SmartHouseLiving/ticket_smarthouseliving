<div class="flex-none border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur-sm">
    <div class="flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

        <a href="{{ route('tickets.front') }}" class="flex min-w-0 items-center gap-4 group">

            <div class="flex items-center gap-3">
                <img src="{{ $header?->logo ? asset('storage/' . $header->logo) : asset('images/logo.png') }}"
                    alt="{{ $header?->company_name ?? 'SmartHouseLiving' }}"
                    class="h-10 w-auto object-contain transition group-hover:opacity-90">
            </div>

            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-cyan-600/80">
                    {{ $header?->header_badge ?? 'Automation Support Portal' }}
                </p>

                <h1
                    class="truncate text-base font-semibold tracking-tight text-slate-900 sm:text-lg group-hover:text-cyan-600 transition">
                    {{ $header?->header_title ?? 'Centro de Suporte Técnico' }}
                </h1>
            </div>

        </a>

        @auth
            <div class="flex items-center gap-3">

                <a href="{{ route('account.settings') }}"
                    class="hidden sm:flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 transition hover:border-cyan-300 hover:bg-cyan-50">

                    @if (auth()->user()->profile_photo)
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}"
                            class="h-10 w-10 rounded-full object-cover shadow-sm">
                    @else
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 text-sm font-semibold text-slate-950 shadow-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif

                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium text-slate-900">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="truncate text-xs text-slate-500">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    @php
                        $field = env('TICKETING_NAV_FIELD', 'email');
                        $allowed = array_map('trim', explode(',', env('TICKETING_NAV_ALLOWED', '')));
                        $isAdmin = in_array(auth()->user()->{$field}, $allowed);
                    @endphp

                    @if ($isAdmin)
                        <a href="/admin"
                            class="inline-flex items-center rounded-xl border border-cyan-200 bg-cyan-50 px-4 py-2 text-sm font-semibold text-cyan-700 transition hover:border-cyan-300 hover:bg-cyan-100">
                            Administração
                        </a>
                    @endif
                    <button type="submit"
                        class="inline-flex items-center rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:scale-[1.02] hover:shadow-md">
                        {{ $header?->logout_button_label ?? 'Logout' }}
                    </button>
                </form>

            </div>
        @endauth

    </div>
</div>
