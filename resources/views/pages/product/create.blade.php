@extends('layouts.default')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Data Product</h1>
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
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Barang</strong>
                                <input type="text" name="name" class="form-control" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tipe Barang</strong>
                                <input type="text" name="type" class="form-control" placeholder="Tipe Barang">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <textarea id="ckeditor" class="ckeditor form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Harga Barang</strong>
                                <input type="number" name="prince" class="form-control" placeholder="Harga Barang">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kuantity Barang</strong>
                                <input type="text" name="quantity" class="form-control" placeholder="Kuantity Barang">
                            </div>
                        </div>
                    <button class="btn btn-primary btn-block" type="submit">
                        Tambah Barang
                    </button>
                </form>
            </div>
        </div>
      </div>
    </div>
</section>
    
@endsection