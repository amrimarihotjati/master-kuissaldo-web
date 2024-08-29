@extends('layouts.app')

@section('title', 'LandingPage | ')

@section('content')
    <div class="main-content">
        <div class="card rounded rounded-4 border-0 p-2 shadow">
            <div class="card-header text-dark fw-bold d-flex justify-content-between align-items-center mt-2">
                <div class="h3 fw-bold">Landing Page</div>
            </div>
            <div class="card-body">
                <div class="table-responsive vh-100">
                    <table id="dtLandingPage" class="table table-bordered table-flush" style="width:100%">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle">Website</th>
                                <th class="align-middle text-center">Theme</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script type="module">
        $('#dtLandingPage').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDTLandingPage') }}",
            aLengthMenu: [
                [10, 50, 100, 1000, 10000, -1],
                [10, 50, 100, 1000, 10000, "Semua"]
            ],
            iDisplayLength: 10,
            columns: [{
                    data: null,
                    orderable: false,
                    searchable: false,
                    width: '10%',
                    className: 'align-middle text-center text-muted',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    width: '80%',
                    orderable: true,
                    searchable: true,
                    render: function(data, type, full, meta) {
                        var landingName = '<span class="fw-bold h6">' + full.name + '</span>';
                        var landingDomain = '<a class="fw-semibold text-primary" href="' + full.domain +'" target="_blank">' + full.domain + '</a>';
                        return landingName + '</br>' + landingDomain + '</br>';
                    }
                },
                {
                    data: 'theme',
                    name: 'theme',
                    width: '10%',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var landingColorTheme =
                            '<span class="form-control form-control-color" style="background-color:' + full
                            .theme + '; display: inline-block; vertical-align: middle;"></span>';
                        return '<div class="d-flex align-items-center justify-content-center" style="height: 100%;">' +
                            landingColorTheme + '</div>';
                    }
                }
            ],
            language: {
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                },
                "emptyTable": "Tidak Ada data",
                "info": "_START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Dari 0 sampai 0 of 0 data",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "lengthMenu": "_MENU_<br/></br/>",
                "search": "",
                "zeroRecords": "Tidak ditemukan",
            },
            initComplete: function(settings, json) {}
        });
    </script>
@endpush
