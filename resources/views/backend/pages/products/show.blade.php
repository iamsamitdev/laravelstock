@extends('backend.layouts.default_layout')
@section('title') {{ $product->product_name }} @parent @endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>รายละเอียดสินค้า</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product list</a></li>
            <li class="breadcrumb-item active">Product detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $product->product_name }}</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="row mb-5">
                <div class="col-md-3 mx-4 mt-3">
                    <p><b>ภาพสินค้า</b></p>
                    <img src="{{asset('assets/images/products')}}/{{$product->product_image}}" class="img-fluid rounded">
                    <div class="row mt-2 mt-3">
                        <div class="col-md-6"><b>บาร์โค๊ด</b></div>
                        <div class="col-md-6">{{ $product->product_barcode }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>จำนวนชิ้น</b></div>
                        <div class="col-md-6">{{ $product->product_qty }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>ราคา</b></div>
                        <div class="col-md-6">{{ $product->product_price }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>หมวดหมู่</b></div>
                        <div class="col-md-6">{{ $product->product_category }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>สถานะ</b></div>
                        <div class="col-md-6">{!! config('global.pro_status')[ $product->product_status] !!}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>เพิ่มข้อมูลเมื่อ</b></div>
                        <div class="col-md-6">{{ date("d/m/Y", strtotime($product->created_at)) }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><b>แก้ไขข้อมูลเมื่อ</b></div>
                        <div class="col-md-6">{{ date("d/m/Y", strtotime($product->updated_at)) }}</div>
                    </div>
                </div>
                <div class="col-md-8 mx-4 mt-3">
                    <div class="col-md-12"><b>ชื่อสินค้า</b></div>
                    <div class="col-md-12 mb-3"><h4>{{ $product->product_name }}</h4></div>
                    <div class="col-md-12"><b>รายละเอียด</b></div>
                    <div class="col-md-12"><pre style="font-family: Kanit, sans-serif; padding-left:0px">{!! $product->product_detail !!}</pre></div>
                    </div>
                </div>
        </div>
    </div>
  </section>

@endsection