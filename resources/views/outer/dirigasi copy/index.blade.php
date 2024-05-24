@extends('layouts.frontend')

@section('content')

    <div class="col-md-12">
      @if (session('pesan'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
      </div>
      @endif
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Data {{ $title }}</h3>

          <div class="card-tools">
            <a href="/admin/dirigasis/create" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
              Data
            </a>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
            <table id="tabel1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>Nama Daerah Irigasi</th>
                        {{-- <th>Geojson</th> --}}
                        <th>Luas</th>
                        <th>Kab.Kota</th>
                        <th>Jumlah Bangunan</th>
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
                        <td>{{ $data->bendung->count() }}</td>
                        <td class="text-center"><a href="/dirigasi/detail/{{ $data->id }}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Detail</a></td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

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
