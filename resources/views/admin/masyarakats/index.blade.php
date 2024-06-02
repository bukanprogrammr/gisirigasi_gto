@extends('layouts.inner')

@section('content')
    <div class="col-md-12">
      @if (session('pesan'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
      </div>
      @endif
      
      <div class="card card-dark">
        <div class="card-header">
          <h5 class="card-title">{{ $title }}</h5>
          <div class="card-tools">  
          </div>
        </div>
        <div class="card-body">
         
            <table id="tabel1" class="table  table-striped">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Kritik</th>
                        <th>Tanggapan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($masyarakat as $data)
                  <tr role="button" onclick="location.href='/admin/masyarakats/{{ $data->id }}/edit'">
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama }}</td>
                        <td width="900px">{{substr($data->kritik, 0, 50) }}</td>
                        <td>
                          @if ($data->tanggapan === null)
                          <span class="badge badge-warning">Belum ditanggapi</span>
                          @else
                          <span class="badge badge-success">Sudah ditanggapi</span>
                          @endif
                        </td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
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
