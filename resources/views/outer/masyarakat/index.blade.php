<!-- modal partisipasi masyarakat -->
<div class="modal fade modal_partisipasi_masyarakat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="gridSystemModalLabel">Formulir Pengaduan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form action="/smasyarakat" id="target" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" name="nik"  required>
                  </div>

                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama"  required>
                    </div>

                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" name="no_hp"  required>
                </div> 
                </div>
          </div>
          <div class="row">
              <div class="col-md-12 col-lg-12">
              </div>
          </div>
          {{-- <div class="row">
              <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                      <label>Tanggapan</label>
                      <textarea class="form-control" name="tanggapan"  required rows="4"></textarea>
                    </div>
                </div>
            </div> --}}
            
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Koordinat Permasalahan</label>
                        <input type="text" class="form-control" name="koordinat"  required placeholder="0.5xxxxxx, 123.1xxxxxx">
                    </div>
                </div>     
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Kritik/Saran/Permasalahan</label>
                        <textarea class="form-control" name="kritik"  required rows="4"></textarea>
                    </div>
                </div>
            </div>

          <div class="row">
              <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                      <label>Upload Foto Permasalahan</label>
                      <input name="foto" type="file" id="foto" class="form-control" onchange="previewImage()" accept="image/jpeg,image/png" value="{{ old('foto') }}">
              <img class="img-preview img-fluid mb-3 col-sm-5">
                  </div>
              </div>
          </div>

          <div class="row m-t-15">
              <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                  <button class="btn btn-primary btn-block btn-lg" type="submit">Simpan</button>
              </div>
          </div>
          </form>
      </div>
      </div>
    </div>
  </div>
  <!-- end modal partisipasi masyarakat -->

      <!-- modal detail pengaduan -->
      <div class="modal fade" id="modal_detail_pengaduan" tabindex="-1" role="dialog" aria-labelledby="modal_detail_pengaduan_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_detail_pengaduan_label">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mt-3">
                        <img id="detail_foto" class="rounded" style="max-height: 500px; max-width: 100%;">
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> <span id="detail_nama"></span></p>
                            <p><strong>Kritik:</strong> <span id="detail_kritik"></span></p>
                            <p><strong>Koordinat:</strong> <span id="detail_koordinat"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong style="color : green;">Tanggapan:</strong> <span id="detail_tanggapan"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
      <!-- end modal detail pengaduan -->

      <script>

        function previewImage(){
              const foto = document.querySelector('#foto');
              const imgPreview = document.querySelector('.img-preview');
    
              imgPreview.style.dispaly = 'block';
    
              const oFReader = new FileReader();
              oFReader.readAsDataURL(foto.files[0]);
              
              oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
              }
            }
      </script>