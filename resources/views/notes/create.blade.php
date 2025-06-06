<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Catatan Baru</h2>
                <p class="mt-1 text-gray-400">Isi detail catatan yang ingin Anda tambahkan</p>
            </div>

            <div class="bg-black border border-gray-800 rounded-xl overflow-hidden shadow-xl shadow-indigo-500/10">
                <form action="{{ route('notes.store') }}" method="POST" class="relative">
                    @csrf
                    <div class="p-8 space-y-6">
                        <!-- Title Input -->
                        <div class="group">
                            <label for="title" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Judul Catatan</label>
                            <input type="text" name="title" id="title" required 
                                class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white placeholder-gray-500
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                       transition-all duration-200 hover:bg-gray-900/75"
                                placeholder="Masukkan judul catatan">
                        </div>

                        <!-- Content Input -->
                        <div class="group">
                            <label for="content" class="block text-sm font-medium text-gray-400 mb-2 group-focus-within:text-indigo-400 transition-colors duration-200">Isi Catatan</label>
                            <textarea name="content" id="content" rows="6" 
                                class="w-full px-4 py-3 bg-gray-900/50 border border-gray-800 rounded-xl text-white placeholder-gray-500
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500/50
                                       transition-all duration-200 hover:bg-gray-900/75"
                                placeholder="Masukkan isi catatan"></textarea>
                        </div>

                        <!-- Important Toggle -->
                        <div class="flex items-center">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_important" class="sr-only peer" value="1">
                                <div class="w-11 h-6 bg-gray-900/50 border border-gray-800 rounded-full peer 
                                          peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full 
                                          after:content-[''] after:absolute after:top-[2px] after:start-[2px] 
                                          after:bg-gray-400 after:rounded-full after:h-5 after:w-5 after:transition-all
                                          peer-checked:bg-indigo-500/20 peer-checked:after:bg-indigo-400"></div>
                                <span class="ms-3 text-sm font-medium text-gray-400 peer-checked:text-indigo-400 transition-colors duration-200">
                                    Tandai sebagai Penting
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="p-8 bg-gradient-to-t from-gray-900/50 border-t border-gray-800">
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('notes.index') }}" 
                               class="px-6 py-3 rounded-xl text-gray-400 hover:text-white transition-colors duration-200">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-blue-500 text-white rounded-xl
                                       transform transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/25
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500/50 active:scale-100">
                                Simpan Catatan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 