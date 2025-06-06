<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-white">Edit Aktivitas</h2>
                <p class="mt-1 text-gray-400">Ubah detail aktivitas sesuai kebutuhan Anda</p>
            </div>

            <div class="bg-black border border-gray-800 rounded-xl overflow-hidden shadow-xl shadow-indigo-500/10">
                <form action="{{ route('activities.update', $activity) }}" method="POST" class="relative">
                    @csrf
                    @method('PUT')
                    <div class="p-8 space-y-6">
                        <!-- Title Input -->
                        <div class="group">
                            <label for="title" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Judul Aktivitas</label>
                            <input type="text" name="title" id="title" required value="{{ $activity->title }}"
                                class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white placeholder-gray-500
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                       transition-all duration-200 hover:bg-gray-900/75"
                                placeholder="Masukkan judul aktivitas">
                        </div>

                        <!-- Description Input -->
                        <div class="group">
                            <label for="description" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" 
                                class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white placeholder-gray-500
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                       transition-all duration-200 hover:bg-gray-900/75"
                                placeholder="Masukkan deskripsi aktivitas">{{ $activity->description }}</textarea>
                        </div>

                        <!-- Category Select -->
                        <div class="group">
                            <label for="category_id" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Kategori</label>
                            <div class="relative">
                                <select name="category_id" id="category_id" required
                                    class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                           transition-all duration-200 hover:bg-gray-900/75 appearance-none">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $activity->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Date and Time Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Start Time -->
                            <div class="group">
                                <label for="start_time" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Waktu Mulai</label>
                                <input type="datetime-local" name="start_time" id="start_time" required 
                                    value="{{ $activity->start_time->format('Y-m-d\TH:i') }}"
                                    class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                           transition-all duration-200 hover:bg-gray-900/75">
                            </div>

                            <!-- End Time -->
                            <div class="group">
                                <label for="end_time" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Waktu Selesai</label>
                                <input type="datetime-local" name="end_time" id="end_time" required 
                                    value="{{ $activity->end_time->format('Y-m-d\TH:i') }}"
                                    class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                           transition-all duration-200 hover:bg-gray-900/75">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="p-8 bg-gradient-to-t from-gray-900/50 border-t border-gray-800">
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('activities.show', $activity) }}" 
                               class="px-6 py-3 rounded-xl text-gray-400 hover:text-white transition-colors duration-200">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-xl
                                       transform transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 active:scale-100">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 