@extends('layouts.outer')

@section('content')

<section class="ud-page-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
        <div class="ud-banner-content">
          <h1>{{ $title }}</h1>
        </div>
        <div class="card" >
          <div class="card-body ">
            <table id="tabel1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="30px">No</th>
                      <th>Nama Daerah Irigasi</th>
                      {{-- <th>Geojson</th> --}}
                      <th>Luas</th>
                      <th>Wilayah Sebaran</th>
                      <th>Option</th>

                  </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach ($dirigasi as $data)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->nama_dirigasi }}</td>
                      <td>{{ $data->luas }}</td>
                      <td>@foreach ($data->kabkota as $item)
                        - {{ $item->nama_kabkota }} <br>
                    @endforeach
                      </td>
                      <td class="text-center"><a href="/dirigasi/detail/{{ $data->id }}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Detail</a></td>
                    </tr>
                @endforeach
              </tbody>
          </table>
              </div>
          </div>  
      </div>
    </div>
    
    </div>
  </section>
  <!-- ====== Banner End ====== -->
  
  <!-- ====== About Start ====== -->
  
@include('layouts.footer')


    <script>
      $(function () {
        $("#tabel1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>

@endsection
