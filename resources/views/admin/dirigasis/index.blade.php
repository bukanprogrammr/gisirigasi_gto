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
            <a href="/admin/dirigasis/create" type="button" class="btn btn-info btn-sm float-right">Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <table id="tabel1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width='10px'>No</th>
                        <th>Nama</th>
                        <th>Luas</th>
                        <th >Kabkota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($dirigasi as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_dirigasi }}</td>
                        <td>{{ $data->luas }}</td>
                        <td>
                          @foreach ($data->kabkota as $item)
                          - {{ $item->nama_kabkota }} <br>
                      @endforeach
                    </td>
                        <td class="text-center">
                          <a href="/admin/dirigasis/{{ $data->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                          <form  action="/admin/dirigasis/{{ $data->id }}" method="post" class="d-inline">
                            @method('delete')
                          @csrf
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data {{ $data->nama_dirigasi }}?')"><i class="fas fa-trash"></i></button>
                        </form>
                        </td>
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
