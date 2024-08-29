@extends('layouts.app')

@section('title', 'LandingPage | ')

@section('content')
    <div class="main-content">
        <div class="card rounded rounded-4 border-0 p-4 shadow">
            <div class="card-header text-dark fw-bold d-flex justify-content-between align-items-center mt-2">
                <div class="h3 fw-bold">Landing Page</div>
                <button type="button" class="btn btn-primary fw-bold no-shadow rounded rounded-1"
                    data-bs-toggle="modal" data-bs-target="#createLandingPage"><i class="fas fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive vh-100">
                    <table id="dtLandingPage" class="table table-bordered table-flush" style="width:100%">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">#</th>
                                <th class="align-middle">Website</th>
                                <th class="align-middle text-center">Theme</th>
                                <th class="align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('layouts.website-landing-page.modal.create-new-landing')
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
                    width: '70%',
                    orderable: true,
                    searchable: true,
                    render: function(data, type, full, meta) {
                        var faviconUrl = 'https://' + full.domain + '/favicon.ico';
                        return '<div class="d-flex align-items-center">' +
                        '<img src="' + faviconUrl + '" alt="" class="img-fluid img-thumbnail mt-1 mb-1" style="width:45px; height:45px; margin-right:10px;" onerror="this.style.display=\'none\'; this.previousSibling.style.display=\'block\';">' +
                        '<div>' +
                        '<h5 class="fw-semibold mt-2 mb-0">' + full.name + '</h5>' +
                        '<a class="fw-semibold text-primary link-underline link-underline-opacity-0" href="' + full.domain + '" target="_blank">' + full.domain + '</a>' +
                        '</div>' +
                        '</div>';
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
                },
                {
                    data: null,
                    name: null,
                    width: '10%',
                    orderable: false,
                    searchable: false,
                    className: 'align-middle',
                    render: function(data, type, full, meta) {
                        var iconEdit = '<i class="fa fa-edit"></i>';
                        var actionEdit =
                            '<a class="btn btn-secondary" href="/get-detail-landing-page/' + full.id + '">' + iconEdit + '</a>';
                        return '<div class="d-flex align-items-center justify-content-center" style="height: 100%;">' +
                            actionEdit + '</div>';
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
