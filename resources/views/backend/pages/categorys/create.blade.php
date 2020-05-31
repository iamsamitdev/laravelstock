@extends('backend.layouts.default_layout')
@section('title') Add new category @parent @endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add new category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('categorys.index') }}">Category list</a></li>
            <li class="breadcrumb-item active">Add category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    {!! Session::get('status') !!}

    <!-- Default box -->
    @if($message = Session::get('success'))
    <div class="alert alert-success text-center">
      {{ $message }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">เพิ่มหมวดหมู่ใหม่</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body p-0">
        <form role="form" method="post" action="{{ route('categorys.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                 <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                            <label for="category_name">ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control {{ $errors->has('category_name') ? 'is-invalid' :'' }}" id="category_name" name="category_name" placeholder="ป้อนชื่อหมวดหมู่" value="{{old('category_name')}}">
                            <span class="help-block text-danger"><small>{{ $errors->first('category_name') }}</small></span>
                          </div>
                          <div class="form-group">
                             <p><label for="category_attachment">ไฟล์แนบ</label></p>
                             <input type="file" name="category_attachment" id="category_attachment">
                          </div>
                     </div>
                 </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">บันทึกรายการ</button>
                </div>
              </form>
        </div>
    </div>
  </section>



@endsection