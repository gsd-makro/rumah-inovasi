@extends('layouts.dashboard')

@section('title', 'Infografis')
@section('subtitle', 'Infografis.')

@section('main')
  <section class="section">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="mb-0 card-title">Kelola Infografis</h4>
          <!-- Button trigger for basic modal -->
          <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
            data-bs-target="#default">
            Tambah Data
          </button>
          @include('dashboard.infographic._add')
        </div>
      </div>
      <div class="card-body">
        <table class="table table-lg">
          <thead>
              <tr>
                  <th>NAME</th>
                  <th>RATE</th>
                  <th>SKILL</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td class="text-bold-500">Michael Right</td>
                  <td>$15/hr</td>
                  <td class="text-bold-500">UI/UX</td>

              </tr>
              <tr>
                  <td class="text-bold-500">Morgan Vanblum</td>
                  <td>$13/hr</td>
                  <td class="text-bold-500">Graphic concepts</td>

              </tr>
              <tr>
                  <td class="text-bold-500">Tiffani Blogz</td>
                  <td>$15/hr</td>
                  <td class="text-bold-500">Animation</td>

              </tr>
              <tr>
                  <td class="text-bold-500">Ashley Boul</td>
                  <td>$15/hr</td>
                  <td class="text-bold-500">Animation</td>

              </tr>
              <tr>
                  <td class="text-bold-500">Mikkey Mice</td>
                  <td>$15/hr</td>
                  <td class="text-bold-500">Animation</td>

              </tr>
          </tbody>
      </table>
      </div>
    </div>
  </section>
@endsection
