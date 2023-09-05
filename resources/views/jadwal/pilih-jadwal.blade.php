@error('jadwal_id')
    <div class="text-danger fs-6">
        {{ $message }}
    </div>
@enderror
<div class="table-responsive">
    <table class="table table-hover mb-0" id="dataTableExample">
        <thead>
            <tr>
                <th>No.</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Kode</th>
                <th>Nama Lengkap</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($jadwals)
                @foreach ($jadwals as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ substr($jadwal->jam_mulai, 0, 5).' - '.substr($jadwal->jam_selesai, 0, 5) }}</td>
                        <td>{{ $jadwal->psikolog->kode_psikolog ?? '-' }}</td>
                        <td>{{ $jadwal->psikolog->user->name ?? '-' }}</td>
                        <td>{{ $jadwal->ruangan->ruangan ?? '-' }}</td>
                        <td>
                            <form action="/{{ $aktor }}/{{ $aksi }}/" method="post">
                                @csrf
                                <input type="hidden" name="member_id" value="{{ $member_id }}">
                                <input type="hidden" name="psikolog_id" value="{{ $jadwal->psikolog->id }}">
                                <input type="hidden" name="keluhan" value="{{ $keluhan }}">
                                <input type="hidden" name="kebutuhan" value="{{ $kebutuhan }}">
                                <input type="hidden" name="jenis_psikotes_id" value="{{ $jenis_psikotes_id }}">
                                <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                <input type="hidden" name="tanggal_{{ $aksi }}" value="{{ $tanggal }}">
                                {{-- <input type="hidden" name="status" value="booking"> --}}
                                <button type="submit" class="btn btn-warning btn-sm">Pilih Jadwal</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Tidak Ada Jadwal Tersedia</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
