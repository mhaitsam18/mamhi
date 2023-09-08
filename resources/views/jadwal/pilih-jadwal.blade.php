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
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Pilih Jadwal
                                </button> --}}
                                <!-- Modal -->
                                {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Anda Yakin?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>anda telah booking jadwal dengan {{ $jadwal->psikolog->user->name }}</h4>
                                                <h4>Jumlah Biaya yang harus dibayarkan adalah Rp.350.000,00</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                <button type="button" class="btn btn-primary">Lanjut</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
