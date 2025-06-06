<x-app-layout>
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="gradient-border">
            <div class="p-6 bg-black rounded-xl">
                <h2 class="text-2xl font-bold text-white mb-2">Statistik Produktivitas</h2>
                <p class="text-gray-400">Analisis aktivitas dan catatan Anda secara menyeluruh.</p>
            </div>
        </div>

        <!-- Activity Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Activities -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-indigo-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-indigo-500/10">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $totalActivities }}</h3>
                        <p class="text-sm text-gray-400">Total Aktivitas</p>
                    </div>
                </div>
            </div>

            <!-- Activities This Week -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-purple-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-500/10">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $activitiesThisWeek }}</h3>
                        <p class="text-sm text-gray-400">Aktivitas Minggu Ini</p>
                    </div>
                </div>
            </div>

            <!-- Activities This Month -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-emerald-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-emerald-500/10">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $activitiesThisMonth }}</h3>
                        <p class="text-sm text-gray-400">Aktivitas Bulan Ini</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notes Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Notes -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-rose-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-rose-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-rose-500/10">
                        <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $totalNotes }}</h3>
                        <p class="text-sm text-gray-400">Total Catatan</p>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-amber-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-amber-500/10">
                        <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $importantNotes }}</h3>
                        <p class="text-sm text-gray-400">Catatan Penting</p>
                    </div>
                </div>
            </div>

            <!-- Notes This Month -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-blue-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-500/10">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $notesThisMonth }}</h3>
                        <p class="text-sm text-gray-400">Catatan Bulan Ini</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Activities by Category -->
            <div class="bg-black rounded-xl border border-gray-800">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Aktivitas per Kategori</h3>
                    <div class="space-y-4">
                        @forelse($activitiesByCategory as $category => $count)
                            <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-300">{{ $category }}</span>
                                <span class="text-indigo-400 font-semibold">{{ $count }}</span>
                            </div>
                        @empty
                            <p class="text-gray-400 text-center">Belum ada data aktivitas</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Activity Trend -->
            <div class="bg-black rounded-xl border border-gray-800">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Tren Aktivitas (7 Hari Terakhir)</h3>
                    <div class="space-y-4">
                        @foreach($activityTrend as $trend)
                            <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                                <span class="text-gray-300">{{ \Carbon\Carbon::parse($trend['date'])->format('d M') }}</span>
                                <span class="text-indigo-400 font-semibold">{{ $trend['count'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 