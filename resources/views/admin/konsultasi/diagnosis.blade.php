
@extends('layouts.admin-main')

@section('content')
@php
    use Carbon\Carbon;
@endphp
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">{{ $title }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Diagnosis</h4>
                    <div class="row">
                        <div class="col-6">
                            @if (isset($diagnosis->id))
                                @php
                                    $diagnosis_id = $diagnosis->id ?? '';
                                    $action = '/admin/diagnosis/' . $diagnosis_id;
                                @endphp
                            @else
                                @php
                                    $action = '/admin/diagnosis/';
                                @endphp
                            @endif
                            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($diagnosis->id ?? null)
                                    @method('put')
                                    <input type="hidden" name="id" id="id" value="{{ $diagnosis->id }}">
                                @endif
                                <input type="hidden" name="konsultasi_id" id="konsultasi_id" value="{{ $konsultasi->id }}">
                                <div class="mb-3">
                                    <label for="nomor_rekam_psikolog" class="form-label">Nomor Rekam Psikolog</label>
                                    <input type="text" class="form-control  @error('nomor_rekam_psikolog') is-invalid @enderror" name="nomor_rekam_psikolog" id="nomor_rekam_psikolog" value="{{ old('nomor_rekam_psikolog', $diagnosis->nomor_rekam_psikolog ?? '') }}">
                                    @error('nomor_rekam_psikolog')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="hasil_diagnosis" class="form-label">Hasil Diagnosis</label>
                                    <textarea class="form-control  @error('hasil_diagnosis') is-invalid @enderror" name="hasil_diagnosis" id="hasil_diagnosis">{{ old('hasil_diagnosis', $diagnosis->hasil_diagnosis ?? '') }}</textarea>
                                    @error('hasil_diagnosis')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="dokumen" class="form-label">Upload Dokumen (.pdf)</label>
                                    <input type="fiile" class="form-control input-img filepond @error('dokumen') is-invalid @enderror" name="dokumen" id="dokumen"  multiple  data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                    <input type="hidden" name="nama_dokumen" id="nama_dokumen" value="">
                                    @error('dokumen')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-sm btn-warning float-end">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            @if (isset($diagnosis->id))
                                <h4>Diagnosis</h4>
                                <ul>
                                    <li>Nomor Rekam Psikolog : {{ ($diagnosis->nomor_rekam_psikolog ?? '') }}</li>
                                    <li>Hasil Diagnosis : {{ ($diagnosis->hasil_diagnosis ?? '') }}</li>
                                    <li><a href="{{ asset('storage/' . ($diagnosis->dokumen ?? '')) }}" class="btn btn-sm btn-primary">Download Dokumen</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@section('script')
    <script>
        function previewDokumen() {
            var namaDokumen = $('#nama_dokumen').val();
            var dokumenPath = '{{ asset('storage/') }}' + '/' + namaDokumen;
            $('.img-preview').attr('src', dokumenPath);
        }


        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit,
            FilePondPluginFileEncode
        );

        FilePond.create(
            document.querySelector('.filepond')
        );
        FilePond.setOptions({
            server: {
                process: {
                    url: '/file/dokumen-upload',
                    method: 'POST',
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response);
                        $('#nama_dokumen').val(response);
                        var namaDokumen = $('#nama_dokumen').val();
                        var dokumenPath = '{{ asset('storage/') }}' + '/' + namaDokumen;
                        $('.img-preview').attr('src', dokumenPath);
                    },
                    ondata: (formData) => {
                        formData.append('folder', 'dokumen-diagnosis');
                        return formData;
                    },
                    onerror: (response) => {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Format File Tidak Sesuai',
                            icon: 'error'
                        });
                    }
                },
                revert: {
                    url: '/file/tmp-delete',
                    method: 'DELETE',
                    onload: (response) => {
                        console.log(response);
                        $('#nama_dokumen').val(response);
                        var dokumenPath = '{{ asset('storage/'.($diagnosis->dokumen ?? '')) }}';
                        $('.img-preview').attr('src', dokumenPath);
                    },
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
            labelIdle: 'Seret &amp; Lepaskan file PDF atau <span class="filepond--label-action"> Telusuri </span>',
        });

    </script>
@endsection
