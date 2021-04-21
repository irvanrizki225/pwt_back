@extends('layouts.default')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Data user</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('permit.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" 
                        class="form-control-label">Nama User</label>
                        <select name="user_id"
                                class="form-control @error('user_id') is-invalid @enderror">
                            @foreach ($user as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="name" 
                        class="form-control-label">Nama Barang</label>
                        <select name="product_id"
                                class="form-control @error('product_id') is-invalid @enderror">
                            @foreach ($producs as $produc)
                              <option value="{{ $produc->id }}">{{ $produc->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name" 
                        class="form-control-label">Tanda Tangan</label>
                        <select name="signatur_id"
                                class="form-control @error('signatur_id') is-invalid @enderror">
                            @foreach ($signature as $signature)
                                <option value="{{ $signature->id }}" style="background-image:url({{ asset('signature/' . $signature->signature) }});">
                                    {{$signature->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('signatur_id') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Surat</strong>
                            <input type="text" name="name" class="form-control" placeholder="Nama Surat">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kontraktor</strong>
                            <input type="text" name="contraktor" class="form-control" placeholder="Kontraktor">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Waktu Mulai Permit</strong>
                            <input type="date" name="date_application" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Batas Waktu Permit</strong>
                            <input type="date" name="expiry_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleSelectBorder">Status</label>
                            <select name="status" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option value="Request">Request</option>
                                        <option value="Berhasil">Berhasil</option>
                                        <option value="Gagal">Gagal</option>
                            </select>
                            </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection