@props(['job'])

<div class="space-y-5">
    <div>
        <label class="block font-semibold text-gray-700 mb-1">Judul Pekerjaan</label>
        <input type="text" name="title" value="{{ old('title', $job?->title) }}"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-1">Deskripsi</label>
        <textarea name="description" rows="4"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            required>{{ old('description', $job?->description) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-1">Gaji</label>
        <input type="number" name="salary" value="{{ old('salary', $job?->salary) }}"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-1">Lokasi</label>
        <input type="text" name="location" value="{{ old('location', $job?->location) }}"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-1">Jenis Pekerjaan</label>
        <select name="job_type"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option disabled selected>Pilih jenis pekerjaan</option>
            <option value="Full Time" @selected(old('job_type', $job?->job_type) === 'Full Time')>Penuh Waktu</option>
            <option value="Part Time" @selected(old('job_type', $job?->job_type) === 'Part Time')>Paruh Waktu</option>
            <option value="Magang" @selected(old('job_type', $job?->job_type) === 'Magang')>Magang</option>
            <option value="Remote" @selected(old('job_type', $job?->job_type) === 'Remote')>Remote</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-1">Status</label>
        <select name="status"
            class="w-full border border-gray-300 bg-white rounded-lg px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="open" @selected(old('status', $job?->status) === 'open')>Open</option>
            <option value="closed" @selected(old('status', $job?->status) === 'closed')>Closed</option>
        </select>
    </div>

    <div class="pt-6 text-right">
        <button type="submit"
            class="inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Simpan
        </button>
    </div>
</div>
