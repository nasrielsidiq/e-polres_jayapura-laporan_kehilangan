<div class="flex gap-2">
    <a href="{{ route('admin.laporan.detail', $row->id_laporan) }}" 
       class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded font-medium transition">
        Lihat
    </a>
    @if($row->status === 'pending')
        <form action="{{ route('admin.laporan.verifikasi', $row->id_laporan) }}" method="POST" class="inline">
            @csrf
            <button type="submit" 
                    class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded font-medium transition"
                    onclick="return confirm('Verifikasi laporan ini?')">
                Verifikasi
            </button>
        </form>
    @endif
</div>
