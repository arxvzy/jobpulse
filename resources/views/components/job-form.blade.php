@props(['job'])
<div class="space-y-4">
    <div>
        <label class="block font-medium">Judul Pekerjaan</label>
        <input type="text" name="title" value="{{ old('title', $job?->title) }}"
            class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block font-medium">Deskripsi</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $job?->description) }}</textarea>
    </div>
    <div>
        <label class="block font-medium">Gaji</label>
        <input type="number" name="salary" value="{{ old('salary', $job?->salary) }}"
            class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block font-medium">Lokasi</label>
        <input type="text" name="location" value="{{ old('location', $job?->location) }}"
            class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block font-medium">Jenis Pekerjaan</label>
        <select name="job_type" class="w-full border rounded px-3 py-2">
            <option value="Full Time" @selected(old('job_type', $job?->job_type) === 'Full Time')>Penuh Waktu</option>
            <option value="Part Time" @selected(old('job_type', $job?->job_type) === 'Part Time')>Paruh Waktu</option>
            <option value="Magang" @selected(old('job_type', $job?->job_type) === 'Magang')>Magang</option>
            <option value="Kontrak" @selected(old('job_type', $job?->job_type) === 'Kontrak')>Kontrak</option>
            <option value="Remote" @selected(old('job_type', $job?->job_type) === 'Remote')>Remote</option>
        </select>
    </div>
    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            <option value="open" @selected(old('status', $job?->status) === 'open')>Terbuka</option>
            <option value="closed" @selected(old('status', $job?->status) === 'closed')>Tutup</option>
        </select>
    </div>
    <div class="pt-4 text-right">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </div>
</div>
