<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Aktivitas Saya</h2>
                <a href="{{ route('activities.create') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(99,102,241,0.3)] active:scale-100">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="font-semibold">Tambah Aktivitas</span>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($activities as $activity)
                    <div class="bg-black border border-gray-800 rounded-xl overflow-hidden hover:border-indigo-500/50 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 text-sm rounded-full 
                                    @if($activity->category->name == 'Pekerjaan') bg-blue-500/10 text-blue-400
                                    @elseif($activity->category->name == 'Pribadi') bg-green-500/10 text-green-400
                                    @elseif($activity->category->name == 'Keluarga') bg-purple-500/10 text-purple-400
                                    @else bg-gray-500/10 text-gray-400
                                    @endif">
                                    {{ $activity->category->name }}
                                </span>
                                <div class="flex space-x-2">
                                    <a href="{{ route('activities.edit', $activity) }}" class="text-gray-400 hover:text-white transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('activities.destroy', $activity) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2 truncate">{{ $activity->title }}</h3>
                            <p class="text-gray-400 mb-4 line-clamp-2">{{ $activity->description }}</p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>{{ $activity->created_at->format('d M Y') }}</span>
                                <span>{{ $activity->created_at->format('H:i') }}</span>
                            </div>
                            <a href="{{ route('activities.show', $activity) }}" class="mt-4 block w-full px-4 py-2 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 text-indigo-400 text-center rounded-lg transition-all duration-300 hover:from-indigo-500/20 hover:to-purple-500/20 hover:shadow-[0_0_10px_rgba(99,102,241,0.2)]">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center py-12 bg-black border border-gray-800 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-white">Belum ada aktivitas</h3>
                            <p class="mt-2 text-gray-400">Mulai tambahkan aktivitas pertama Anda.</p>
                            <a href="{{ route('activities.create') }}" class="mt-4 inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(99,102,241,0.3)] active:scale-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Aktivitas
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($activities->hasPages())
                <div class="mt-6">
                    {{ $activities->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 