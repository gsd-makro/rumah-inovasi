@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@section('main')
    <x-breadcrumb :breadcrumbs="[
        ['label' => 'Beranda', 'url' => route('landing.home')],
        ['label' => 'Data dan Dokumen', 'url' => null],
        ['label' => 'Pendidikan', 'url' => null],
        ['label' => 'Pendidikan Sub Menu 1', 'url' => route('landing.documents')],
    ]" />

    <div id="content" class="container-wrapper">
        <div class="content-area">
            <main id="main" class="site-main">
                <article id="post-853" class="post-853 page type-page status-publish hentry">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ $currentMenu->name }}</h1>
                    </header>

                    <div class="entry-content-wrap">
                        <div class="entry-content">
                            <table id="tablepress-1" class="tablepress tablepress-id-1">
                                <thead>
                                    <tr class="row-1 odd">
                                        <th class="column-1">NO</th>
                                        <th class="column-2">NAMA DOKUMEN</th>
                                        <th class="column-3">LINK DOWNLOAD</th>
                                    </tr>
                                </thead>
                                <tbody class="row-hover">
                                    @foreach ($documents as $document)
                                        <tr class="row-{{ $loop->iteration }} {{ $loop->even ? 'even' : 'odd' }}">
                                            <td class="column-1">{{ $loop->iteration }}</td>
                                            <td class="column-2">{{ $document->title }}</td>
                                            <td class="column-3">
                                                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">
                                                    {{ asset('storage/' . $document->file_path) }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('/vendor/js/chromenews.js') }}" id="chromenews-script-js"></script>
    <script type="text/javascript" src="{{ asset('/vendor/js/jquery.datatables.min.js') }}" id="tablepress-datatables-js">
    </script>
    <script type="text/javascript">
        jQuery(function($) {
            var DT_language = {
                "id_ID": {
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "infoPostFix": "",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "processing": "Sedang memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "paginate": {
                        "first": "Pertama",
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya",
                        "last": "Terakhir"
                    },
                    "decimal": ",",
                    "thousands": "."
                }
            };
            $('#tablepress-1').DataTable({
                "language": DT_language["id_ID"],
                "order": [],
                "orderClasses": false,
                "stripeClasses": ["even", "odd"],
                "pagingType": "simple"
            });
        });
    </script>
@endpush
