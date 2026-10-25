<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 items-start">

                {{-- ===== Left column ===== --}}
                <section class="lg:col-span-3 space-y-5">

                    {{-- Greeting card --}}
                    <div class="bg-white rounded-2xl shadow-sm p-6 flex items-center justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                                Hello {{ auth()->user()->name }}!
                            </h1>
                            <p class="mt-1.5 text-sm text-gray-500">
                                It's good to see you again. Ready to learn together?
                            </p>
                            <div class="mt-4 flex gap-2.5">
                                <a href="{{ route('dashboard') }}"
                                   class="inline-flex items-center rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-gray-700 transition">
                                    Find a tutor
                                </a>
                                <a href="#sessions"
                                   class="inline-flex items-center rounded-xl border-[1.5px] border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-900 hover:border-gray-900 transition">
                                    My sessions
                                </a>
                            </div>
                        </div>
                        <div class="hidden sm:block shrink-0 text-6xl" aria-hidden="true">👋</div>
                    </div>

                    {{-- Continue learning card --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 bg-white rounded-2xl shadow-sm p-4 flex items-center gap-4 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 grid place-items-center text-2xl shrink-0">🗣️</div>
                            <div class="flex-1 min-w-0">
                                <strong class="block text-[15px] text-gray-900 truncate">Spanish B2</strong>
                                <span class="text-xs text-gray-500">with Alejandro Velasquez</span>
                            </div>
                            {{-- progress ring --}}
                            <div class="relative w-12 h-12 shrink-0">
                                <svg viewBox="0 0 46 46" class="w-12 h-12 -rotate-90">
                                    <circle cx="23" cy="23" r="19" fill="none" stroke="#eceef1" stroke-width="4.5"/>
                                    <circle cx="23" cy="23" r="19" fill="none" stroke="#111" stroke-width="4.5"
                                            stroke-linecap="round" stroke-dasharray="41.8 77.6"/>
                                </svg>
                                <span class="absolute inset-0 grid place-items-center text-[10.5px] font-bold text-gray-900">35%</span>
                            </div>
                            <a href="#"
                               class="rounded-xl bg-gray-900 px-4 py-2.5 text-[13px] font-semibold text-white hover:bg-gray-700 transition shrink-0">
                                Continue
                            </a>
                        </div>
                    </div>

                    {{-- Sessions header + tabs --}}
                    <div id="sessions" class="px-1 pt-2">
                        <h2 class="text-xl font-extrabold text-gray-900">Sessions</h2>
                        <div class="mt-3 flex gap-5 text-[13px]">
                            <a href="#" class="font-bold text-gray-900">All sessions</a>
                            <a href="#" class="text-gray-400 hover:text-gray-900 transition">The newest</a>
                            <a href="#" class="text-gray-400 hover:text-gray-900 transition">Top rated</a>
                            <a href="#" class="text-gray-400 hover:text-gray-900 transition">Most popular</a>
                        </div>
                    </div>

                    {{-- Session rows --}}
                    <div class="space-y-3">
                        @foreach ($upcomingSessions ?? [
                            ['emoji' => '📐', 'title' => 'Calculus II — Exam prep', 'tutor' => 'Maria Gonzalez', 'time' => '1h 30min', 'rating' => '4.9'],
                            ['emoji' => '🧪', 'title' => 'Organic Chemistry lab prep', 'tutor' => 'David Chen', 'time' => '2h 15min', 'rating' => '4.7'],
                            ['emoji' => '💻', 'title' => 'Intro to Python', 'tutor' => 'Sofia Ramirez', 'time' => '1h 45min', 'rating' => '4.8'],
                            ['emoji' => '🎨', 'title' => 'Design fundamentals', 'tutor' => 'Jean Tate', 'time' => '1h 10min', 'rating' => '4.8'],
                        ] as $session)
                            <div class="bg-white rounded-2xl shadow-sm p-3.5 px-4 flex items-center gap-3.5 hover:-translate-y-0.5 transition">
                                <div class="w-12 h-12 rounded-xl bg-gray-100 grid place-items-center text-2xl shrink-0">
                                    {{ $session['emoji'] }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <strong class="block text-sm text-gray-900 truncate">{{ $session['title'] }}</strong>
                                    <span class="text-xs text-gray-500">by {{ $session['tutor'] }}</span>
                                </div>
                                <div class="hidden md:flex items-center gap-1.5 text-xs font-semibold text-gray-900 whitespace-nowrap">
                                    🕐 {{ $session['time'] }}
                                </div>
                                <div class="hidden md:flex items-center gap-1.5 text-xs font-semibold text-gray-900 whitespace-nowrap">
                                    🔥 {{ $session['rating'] }}
                                </div>
                                <a href="#"
                                   class="rounded-xl bg-gray-900 px-3.5 py-2 text-xs font-semibold text-white hover:bg-gray-700 transition shrink-0">
                                    Book now
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- ===== Right column ===== --}}
                <aside class="lg:col-span-2 space-y-5">

                    {{-- Stats --}}
                    <div class="grid grid-cols-2 gap-3.5">
                        <div class="bg-white rounded-2xl shadow-sm p-5">
                            <b class="text-3xl font-extrabold tracking-tight text-gray-900">12</b>
                            <small class="block mt-1 text-xs leading-snug text-gray-500">Sessions<br>completed</small>
                        </div>
                        <div class="bg-white rounded-2xl shadow-sm p-5">
                            <b class="text-3xl font-extrabold tracking-tight text-gray-900">4</b>
                            <small class="block mt-1 text-xs leading-snug text-gray-500">Sessions<br>in progress</small>
                        </div>
                    </div>

                    {{-- Statistics chart card --}}
                    <div class="bg-white rounded-2xl shadow-sm p-5">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-[17px] font-extrabold text-gray-900">Your statistics</h3>
                            <span class="flex items-center gap-1.5 bg-gray-100 rounded-lg px-3 py-2 text-xs font-semibold text-gray-900">
                                Weekly
                                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                            </span>
                        </div>
                        <div class="mt-2.5 flex gap-3.5 text-xs">
                            <span class="font-bold text-gray-900">Learning hours</span>
                            <span class="text-gray-400">My sessions</span>
                        </div>
                        <svg viewBox="0 0 340 172" class="w-full h-auto mt-2" aria-hidden="true">
                            <g stroke="#eef0f3" stroke-width="1">
                                <line x1="26" y1="140" x2="322" y2="140"/><line x1="26" y1="112" x2="322" y2="112"/>
                                <line x1="26" y1="84" x2="322" y2="84"/><line x1="26" y1="56" x2="322" y2="56"/>
                                <line x1="26" y1="28" x2="322" y2="28"/>
                            </g>
                            <g fill="#9aa0aa" font-size="9" text-anchor="end">
                                <text x="18" y="143">0</text><text x="18" y="115">1</text><text x="18" y="87">2</text>
                                <text x="18" y="59">3</text><text x="18" y="31">4</text>
                            </g>
                            <polyline points="34,140 80,98 126,70 172,112 218,28 264,56 310,84"
                                      fill="none" stroke="#111" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round"/>
                            <g fill="#fff" stroke="#111" stroke-width="2.5">
                                <circle cx="34" cy="140" r="4.5"/><circle cx="80" cy="98" r="4.5"/><circle cx="126" cy="70" r="4.5"/>
                                <circle cx="172" cy="112" r="4.5"/><circle cx="218" cy="28" r="4.5"/><circle cx="264" cy="56" r="4.5"/>
                                <circle cx="310" cy="84" r="4.5"/>
                            </g>
                            <g font-size="10" font-weight="700" fill="#111" text-anchor="middle">
                                <text x="34" y="126">0h</text><text x="80" y="84">1.5h</text><text x="126" y="56">2.5h</text>
                                <text x="172" y="132">1h</text><text x="218" y="14">4h</text><text x="264" y="42">3h</text>
                                <text x="310" y="70">2h</text>
                            </g>
                            <g fill="#9aa0aa" font-size="10" text-anchor="middle">
                                <text x="34" y="164">mon</text><text x="80" y="164">tue</text><text x="126" y="164">wed</text>
                                <text x="172" y="164">thu</text><text x="218" y="164">fri</text><text x="264" y="164">sat</text>
                                <text x="310" y="164">sun</text>
                            </g>
                        </svg>
                    </div>

                    {{-- Premium card --}}
                    <div class="bg-white rounded-2xl shadow-sm p-5 flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-[17px] font-extrabold text-gray-900">Learn even more!</h3>
                            <p class="mt-2 mb-3.5 text-[13px] leading-relaxed text-gray-500">
                                Unlock premium features — unlimited bookings, priority tutoring and more for $9.99 per month.
                            </p>
                            <a href="#"
                               class="inline-block rounded-xl bg-gray-900 px-4 py-2.5 text-[13px] font-semibold text-white hover:bg-gray-700 transition">
                                Go Premium
                            </a>
                        </div>
                        <div class="text-5xl shrink-0" aria-hidden="true">🧠</div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>