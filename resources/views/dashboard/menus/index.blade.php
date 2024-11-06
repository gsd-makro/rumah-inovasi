@extends('layouts.dashboard')

@section('title', 'Menu')
@section('subtitle', 'Menu.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Kelola Menu</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Menu
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="accordion" id="menuAccordion">
                    @foreach ($menus as $menu)
                        <div class="accordion-item">
                            <h2 class="accordion-header d-flex justify-content-between align-items-center"
                                id="headingMain{{ $menu->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseMain{{ $menu->id }}" aria-expanded="false"
                                    aria-controls="collapseMain{{ $menu->id }}">
                                    <div class="d-flex gap-2 justify-content-center align-items-center">
                                        {{ $menu->name }}
                                        <div class="badges">
                                            <span
                                                class="badge {{ $menu->is_active === 1 ? 'bg-success' : 'bg-danger' }}">{{ $menu->is_active === 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseMain{{ $menu->id }}" class="accordion-collapse collapse"
                                aria-labelledby="headingMain{{ $menu->id }}">
                                <div class="accordion-body">
                                    @if ($menu->children->isEmpty())
                                        <div class="d-flex justify-content-center flex-column align-items-center">
                                            <p class="text-muted">Submenu tidak ada</p>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#tambahsubmenu{{ $menu->id }}">Tambah
                                                    Submenu</button>
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#updateMain{{ $menu->id }}">Edit Menu</button>
                                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteMain{{ $menu->id }}">Hapus Menu</button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="d-flex gap-2 mt-2 justify-content-end me-3">
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#tambahsubmenu{{ $menu->id }}">Tambah Submenu</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateMain{{ $menu->id }}">Ubah Menu</button>
                                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteMain{{ $menu->id }}">Hapus Menu</button>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th width="50%">Sub Menu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($menu->children as $key => $subMenu)
                                                    <tr>
                                                        <td class="text-bold-500">{{ $key + 1 }}</td>
                                                        <td class="text-bold-500">
                                                            <div class="accordion"
                                                                id="submenuAccordion{{ $subMenu->id }}">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingSub{{ $subMenu->id }}">
                                                                        <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseSub{{ $subMenu->id }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseSub{{ $subMenu->id }}">
                                                                            <div
                                                                                class="d-flex gap-2 justify-content-center align-items-center">
                                                                                {{ $subMenu->name }}
                                                                                <div class="badges">
                                                                                    <span
                                                                                        class="badge {{ $subMenu->is_active === 1 ? 'bg-success' : 'bg-danger' }}">{{ $subMenu->is_active === 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseSub{{ $subMenu->id }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingSub{{ $subMenu->id }}">
                                                                        <div class="accordion-body">
                                                                            @if ($subMenu->children->isEmpty())
                                                                                <p class="text-muted">Subsubmenu tidak ada
                                                                                </p>
                                                                                <button class="btn btn-primary"
                                                                                    type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#tambahSubSub{{ $subMenu->id }}">Tambah
                                                                                    Sub Submenu</button>
                                                                            @else
                                                                                <table class="table table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th width="50%">Sub Sub Menu
                                                                                            </th>
                                                                                            <th>Aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($subMenu->children as $subSubMenu)
                                                                                            <tr>
                                                                                                <td class="text-bold-500">
                                                                                                    {{ $loop->iteration }}
                                                                                                </td>
                                                                                                <td class="text-bold-500">
                                                                                                    <div
                                                                                                        class="d-flex gap-2 justify-content-center align-items-center">
                                                                                                        {{ $subSubMenu->name }}
                                                                                                        <div class="badges">
                                                                                                            <span
                                                                                                                class="badge {{ $subSubMenu->is_active === 1 ? 'bg-success' : 'bg-danger' }}">{{ $subSubMenu->is_active === 1 ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        class="btn btn-warning btn-sm mb-1"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#updateSub{{ $subSubMenu->id }}">Ubah
                                                                                                        Sub Submenu</button>
                                                                                                    <button
                                                                                                        class="btn btn-danger btn-sm mb-1"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#deleteSub{{ $subSubMenu->id }}">Hapus
                                                                                                        Sub Submenu</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#tambahSubSub{{ $subMenu->id }}">Tambah
                                                                Sub Submenu</button>
                                                            <button class="btn btn-warning btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#update{{ $subMenu->id }}">Ubah
                                                                Submenu</button>
                                                            <button class="btn btn-danger btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $subMenu->id }}">Hapus
                                                                Submenu</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('dashboard.menus._add_menu')
    @foreach ($menus as $menu)
        <!-- Menu Modal -->
        @include('dashboard.menus._add_submenu')
        @include('dashboard.menus._edit_menu')
        @include('dashboard.menus._delete_menu')
    @endforeach

    @foreach ($menus as $menu)
        @foreach ($menu->children as $subMenu)
            <!-- Modal Tambah Submenu -->
            @include('dashboard.menus._add_subsubmenu')
            @include('dashboard.menus._edit_submenu')
            @include('dashboard.menus._delete_submenu')

            @foreach ($subMenu->children as $subSubMenu)
                <!-- Modal Hapus Sub Submenu -->
                @include('dashboard.menus._edit_subsubmenu')
                @include('dashboard.menus._delete_subsubmenu')
            @endforeach
        @endforeach
    @endforeach


    <!-- Repeat similar modal structures for submenus and sub submenus -->

@endsection
