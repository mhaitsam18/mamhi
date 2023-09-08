
@php
    use Carbon\Carbon;
@endphp
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
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $jadwal->id }}">
                                Pilih Jadwal
                            </button>
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
@foreach ($jadwals as $jadwal)
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop{{ $jadwal->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop{{ $jadwal->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdrop{{ $jadwal->id }}Label">Apakah Anda Yakin?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/member/{{ $aksi }}/" method="post">
                    @csrf
                    <input type="hidden" name="member_id" value="{{ auth()->user()->member->id }}">
                    <input type="hidden" name="psikolog_id" value="{{ $jadwal->psikolog->id }}">
                    <input type="hidden" name="keluhan" value="{{ $keluhan }}">
                    <input type="hidden" name="kebutuhan" value="{{ $kebutuhan }}">
                    <input type="hidden" name="jenis_psikotes_id" value="{{ $jenis_psikotes_id }}">
                    <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                    <div class="modal-body">
                        <p class="fs-3">
                            Hari ini pada tanggal {{ Carbon::parse(now())->isoFormat('LLL') }} Anda akan membooking jadwal dengan ketentuan sebagai berikut:
                            <ul>
                                <li>Nama Pasien: {{ auth()->user()->name }}</li>
                                <li>Psikolog: {{ $jadwal->psikolog->user->name }}</li>
                                @if ($keluhan)
                                    <li>Keluhan: {{ $keluhan }}</li>
                                @endif
                                @if ($jenis_psikotes)
                                    <li>Kebutuhan: {{ $jenis_psikotes->jenis_psikotes }}</li>
                                @elseif ($kebutuhan)
                                    <li>Kebutuhan: {{ $kebutuhan }}</li>
                                @endif
                                <li>Tanggal praktik: {{ Carbon::parse($tanggal)->isoFormat('LL') }}</li>
                                <li>Pukul : {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</li>
                                <li>Jumlah Biaya yang harus dibayarkan: Rp.350.000,00</li>
                            </ul>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
