@extends('layouts.default')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
@endif
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <h4 class="card-title">Data Product</h4>
          </div>
        <div class="card-body">
            <table class="table table-bordered signature">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nama Barang</th>
                        <th>Tanda Tangan</th>
                        <th>Nama Surat</th>
                        <th>Kontraktor</th>
                        <th>Tanggal Izin</th>
                        <th>Batas Waktu</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->User->name}}</th>
                    <th>{{$item->products->name}}</th>
                    <th>
                        <img src="{{ asset('signature/' . $item->Signature->signature) }}" width="auto" height="60px"/>
                    </th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->contraktor}}</th>
                    <th>{{$item->date_application}}</th>
                    <th>{{$item->expiry_date}}</th>
                    <th>{{$item->status}}</th>
                    <th>
                        <a href="{{ route('product.edit', $item->id)    }}" class="btn btn-primary btn-sm">
                            <i class="">Edit</i>
                        </a>
                        <form action="{{ route('product.destroy', $item->id) }}" 
                            method="post" 
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="">Delete</i>
                            </button>
                        </form>
                    </th>
                  </tr>
                </tbody>
                  @endforeach
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(function () {
      
      var table = $('.signature').DataTable({
          processing: true,
      });
      
    });
  </script>
@endsection