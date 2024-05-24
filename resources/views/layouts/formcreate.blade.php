@extends('layouts.backend')

@section('content')

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Tambah {{ $title }}</h3>
      </div>

      <div class="card-body">
        
        @yield('form')

        {{-- button --}}
          <div class="row">
            <div class="col-sm-12 d-flex justify-content-end">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>

              
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection

