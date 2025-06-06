<x-app-layout>
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="gradient-border">
            <div class="p-6 bg-black rounded-xl">
                <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-400">Pantau dan tingkatkan produktivitas Anda hari ini.</p>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
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

            <!-- Total Notes -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-purple-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-500/10">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $totalNotes }}</h3>
                        <p class="text-sm text-gray-400">Total Catatan</p>
                    </div>
                </div>
            </div>

            <!-- Today's Activities -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-emerald-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-emerald-500/10">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $todayActivities }}</h3>
                        <p class="text-sm text-gray-400">Aktivitas Hari Ini</p>
                    </div>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="p-6 bg-black rounded-xl border border-gray-800 hover:border-rose-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-rose-500/10">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-rose-500/10">
                        <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-white">{{ $importantNotes }}</h3>
                        <p class="text-sm text-gray-400">Catatan Penting</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Activities -->
            <div class="bg-black rounded-xl border border-gray-800">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-white">Aktivitas Terbaru</h3>
                        <a href="{{ route('activities.create') }}" class="hover-translate-x inline-flex items-center text-sm text-indigo-400 hover:text-indigo-300">
                            Tambah Aktivitas
                            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentActivities as $activity)
                            <div class="p-4 bg-gray-900/50 rounded-lg hover:bg-gray-800/50 transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-white">{{ $activity->title }}</h4>
                                        <p class="text-sm text-gray-400">{{ $activity->category->name }}</p>
                                    </div>
                                    <span class="text-sm text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 text-center py-4">Belum ada aktivitas</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recent Notes -->
            <div class="bg-black rounded-xl border border-gray-800">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-white">Catatan Terbaru</h3>
                        <a href="{{ route('notes.create') }}" class="hover-translate-x inline-flex items-center text-sm text-indigo-400 hover:text-indigo-300">
                            Tambah Catatan
                            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentNotes as $note)
                            <div class="p-4 bg-gray-900/50 rounded-lg hover:bg-gray-800/50 transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-medium text-white">{{ $note->title }}</h4>
                                        <p class="text-sm text-gray-400">{{ Str::limit($note->content, 50) }}</p>
                                    </div>
                                    <span class="text-sm text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 text-center py-4">Belum ada catatan</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
