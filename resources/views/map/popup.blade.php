<!-- File: popup_template.blade.php -->
@if ($type === 'jaringan')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">
                    <img width="10" src="{{ asset('storage/foto-jaringan/' . $data->foto) }}">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">
                    Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <button onclick="zoomToLayer({{ $loop->index }})" class="btn btn-primary">Zoom</button>
                </td>
            </tr>
        </tbody>
    </table>


@elseif ($type === 'bendung')
    


@elseif ($type === 'masalah')


@endif
