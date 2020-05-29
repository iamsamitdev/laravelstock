@extends('backend.layouts.default_layout')
@section('title') Edit products @parent @endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product list</a></li>
            <li class="breadcrumb-item active">Edit product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    <!-- Default box -->
    @if($message = Session::get('success'))
    <div class="alert alert-success text-center">
      {{ $message }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">แก้ไขรายการสินค้า</h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body p-0">
        <form role="form" method="post" action="{{ route('products.update', $product->id) }}">

                @csrf
                @method('PUT')

                <div class="card-body">

                 <div class="row">
                     <div class="col-md-10">
                        <div class="form-group">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ป้อนชื่อสินค้า" value="{{$product->product_name}}">
                          </div>
        
                          <div class="form-group">
                            <label for="product_detail">รายละเอียด</label>
                            <textarea class="form-control" id="product_detail" name="product_detail"  style="height: 100px">{{ $product->product_detail }}</textarea>
                          </div>
        
                          <div class="form-group">
                            <label for="product_barcode">บาร์โค้ด</label>
                            <input type="text" class="form-control" id="product_barcode" name="product_barcode" placeholder="ป้อนบาร์โค้ด" value="{{$product->product_barcode}}">
                          </div>
        
                          <div class="form-group">
                            <label for="product_qty">จำนวนชิ้น</label>
                            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="ป้อนจำนวนชิ้น" value="{{$product->product_qty}}">
                          </div>
        
                          <div class="form-group">
                            <label for="product_price">ราคา</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="ป้อนราคา" value="{{$product->product_price}}">
                          </div>
        
                          <div class="form-group">
                            <label for="product_category">หมวดหมู่</label>
                            <input type="text" class="form-control" id="product_category" name="product_category" placeholder="ป้อนหมวดหมู่" value="{{$product->product_category}}">
                          </div>

                          <div class="form-group">
                            <label for="product_status">สถานะสินค้า</label>
                            <select class="custom-select" name="product_status" id="product_status">
                              <option value="1" @if($product->product_status == 1) selected @endif>In stock</option>
                              <option value="0" @if($product->product_status == 0) selected @endif>Out of stock</option>
                            </select>
                          </div>

                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                                <label for="product_image">ภาพสินค้า</label>
                                <img src="{{asset('assets/images/noImg.jpg')}}" id="output" class="img-fluid rounded ">
                                <span class="btn btn-primary btn-file">
                                    เลือกไฟล์ <input type="file" name="product_image" id="product_image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                </span>
                                <p class="label-uppic">เลือกภาพสินค้า</p>
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