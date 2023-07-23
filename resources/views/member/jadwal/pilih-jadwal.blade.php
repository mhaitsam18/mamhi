<div class="table-responsive">
    <table class="table table-hover mb-0">
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
                            <form action="/member/{{ $aksi }}/" method="post">
                                @csrf   
                                <input type="hidden" name="member_id" value="{{ auth()->user()->member->id }}">
                                <input type="hidden" name="psikolog_id" value="{{ $jadwal->psikolog->id }}">
                                <input type="hidden" name="keluhan" value="{{ $keluhan }}">
                                <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                <input type="hidden" name="tanggal" value="{{ $tanggal }}">
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