@extends('layouts.frontend')

@section('content')

    <div class="col-md-12">

      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Data {{ $title }}</h3>

          <div class="card-tools">
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
            <table id="tabel1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Daerah Irigasi</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach ($kabkota as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="#" onclick="zoomToCoordinate(<?= $data->geojson ?>)">{{ $data->nama_kabkota }}</a></td>
                        <td>{{ $data->warna }}</td>
                        <td>{{ $data->dirigasi->count() }}</td>
                        <td class="text-center">
                          {{-- <button class="btn btn-primary pull-right" data-target=".modal_detail_dirigasi" onclick='detil({
                            "nama":"@foreach ($data->dirigasi as $item){{ $item->nama_dirigasi }}@endforeach",
                            "id":"@foreach ($data->dirigasi as $item){{ $item->id }}@endforeach",
                            })'>Detail</button> --}}
                            @foreach ($data->dirigasi as $item)
                <a href="/kabkota/dirigasi/detail/{{ $item->id }}" class="btn btn-sm btn-info" id="nama"><i class="fas fa-info"></i> {{$item->nama_dirigasi}}</a>
                            @endforeach
                        </td>
                        
                        <button id="zoom-button">Zoom to GeoJSON</button>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            @include('outer.kabkota.linkdetail')

            
            
            
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

      function detil(x){
        console.log(x)
        $('#nama').empty();
        $('#id').empty();

    $('#nama').html(x.nama);
    $('#id').html(x.id);
  
    $('.modal_detail_dirigasi').modal('show');

}
$( "#target" ).submit(function( event ) {
          alert( "Berhasil !!" );

        });     

    </script>

@endsection
