{{-- @foreach ($kabkota as $data)
                      
                  @foreach ($data->dirigasi as $item)
                  <a href="/kabkota/detail/{{ $item->id }}" class="btn btn-sm btn-info"><i class="fas fa-info"></i> Detail</a>
                  @endforeach
                  @endforeach --}}
 <!-- end modal partisipasi masyarakat -->

 <div class="modal fade modal_detail_dirigasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daerahIrigasiModalLabel">Daerah Irigasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="/dirigasi/detail/{{ $data->id }}" class="btn btn-sm btn-info" id="id"><i class="fas fa-info"></i> Detail</a>
                <ul id="nama">
                    
                    <!-- Daftar daerah irigasi akan dimasukkan di sini secara dinamis -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- 
<div class="modal fade modal_detail_dirigasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel">Detail Daerah Irigasi</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-5 col-lg-5">
                  <div  id="foto"></div>
                  </div>

                  <div class="col-md-7 col-lg-7 table-no-border">
                      <table class="table table-bordered">
                          <tbody>
                              <tr>
                                  <a href="/dirigasi/detail/{{ $item->id }}" class="btn btn-sm btn-info" id="nama"><i class="fas fa-info"></i> Detail</a>
                                  <td style="width: 120px;">Nama</td>
                                  <td style="width: 5px;">:</td>
                                  <td id="nama"></td>

                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
      </div>
    </div>
  </div> --}}