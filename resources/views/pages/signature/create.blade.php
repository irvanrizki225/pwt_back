@extends('layouts.default')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
  
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
    
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
                <form method="POST" action="{{ route('signature.store') }}">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" 
                        class="form-control-label">Nama tanda Tangan</label>
                    <select name="user_id"
                        class="form-control @error('user_id') is-invalid @enderror">
                        @foreach ($user as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <br/>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama User</strong>
                            <input type="text" name="name" class="form-control" placeholder="Nama Barang">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="" for="">Signature:</label>
                        <br/>
                        <div id="sig" ></div>
                        <br/>
                        <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
                    <br/>
                    <button class="btn btn-success">Save</button>
                    </form>
            </div>
        </div>
      </div>
    </div>
</section>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>

@endsection