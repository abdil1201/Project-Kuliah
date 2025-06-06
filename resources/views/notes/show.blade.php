<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('notes.index') }}" class="group inline-flex items-center text-gray-400 hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Catatan
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="bg-black border border-gray-800 rounded-xl overflow-hidden relative">
                <!-- Action Buttons - Positioned Absolutely -->
                <div class="absolute top-4 right-4 flex items-center space-x-3 z-10">
                    <a href="{{ route('notes.edit', $note) }}" 
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500/80 to-blue-500/80 text-white rounded-lg 
                              transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25
                              hover:from-indigo-400 hover:to-blue-400 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500/80 to-rose-500/80 text-white rounded-lg 
                                       transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-red-500/25
                                       hover:from-red-400 hover:to-rose-400 backdrop-blur-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>

                <div class="p-8">
                    <!-- Important Badge -->
                    <div class="mb-8">
                        @if($note->is_important)
                            <span class="px-4 py-2 text-sm rounded-full bg-rose-500/10 text-rose-400">
                                Penting
                            </span>
                        @endif
                    </div>

                    <!-- Title Section -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-white mb-2">{{ $note->title }}</h1>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="mb-8">
                        <h2 class="text-lg font-semibold text-gray-300 mb-4">Isi Catatan</h2>
                        <div class="bg-gradient-to-r from-gray-900/50 to-gray-800/50 rounded-xl p-6">
                            <p class="text-gray-300 whitespace-pre-wrap">{{ $note->content }}</p>
                        </div>
                    </div>

                    <!-- Metadata Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Created At -->
                        <div class="bg-gradient-to-r from-gray-900/50 to-gray-800/50 rounded-xl p-6 hover:from-indigo-500/10 hover:to-indigo-400/10 transition-all duration-300">
                            <h3 class="text-sm font-medium text-gray-400 mb-2">Dibuat pada</h3>
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-white">{{ $note->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Last Updated -->
                        <div class="bg-gradient-to-r from-gray-900/50 to-gray-800/50 rounded-xl p-6 hover:from-indigo-500/10 hover:to-indigo-400/10 transition-all duration-300">
                            <h3 class="text-sm font-medium text-gray-400 mb-2">Terakhir diperbarui</h3>
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-white">{{ $note->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 