@extends('backend.layouts.default_layout')
@section('title') Products @parent @endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('backend/dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

        @if($message = Session::get('success'))
        <div class="alert alert-success text-center" role="alert">
             {{ $message }}
          </div>
         @endif

        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a name="" id="" class="btn btn-success" href="{{ route('products.create') }}" role="button">
                    <i class="fas fa-plus"></i> &nbsp;Add new product
                </a>
            </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th>Image</th>
                        <th style="width: 30%">
                            Name
                        </th>
                        <th  style="width: 10%">
                            Barcode
                        </th>
                        <th  style="width: 5%">
                            Qty
                        </th>
                        <th  style="width: 10%">
                            Price
                        </th>
                        <th  style="width: 10%">
                            Category
                        </th>
                        <th style="width: 1%" class="text-right">
                            Status
                        </th>
                        <th class="text-right">
                            Manage
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            @if(empty($product->product_image))
                                <img src="{{asset('assets/images/noImg.jpg')}}" class="rounded" width="50">
                            @else
                                <img src="{{asset('assets/images/products')}}/{{$product->product_image}}" class="rounded" width="50">
                            @endif
                        </td>
                        <td>
                            <a>
                               {{  $product->product_name  }}
                            </a>
                            <br/>
                            <small>
                                Created {{  $product->created_at  }}
                            </small>
                        </td>
                        <td>
                            {{  $product->product_barcode  }}
                        </td>
                        <td>
                            {{  $product->product_qty  }}
                        </td>
                        <td >
                            {{  $product->product_price  }}
                        </td>
                        <td> {{  $product->product_category  }}</td>
                        <td><span class="badge badge-success">{{  $product->product_status  }}</span></td>
                        <td class="project-actions text-right">

                            <form action="{{route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                <a class="btn btn-primary btn-sm" href="{{route('products.show', $product->id)}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('products.edit', $product->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ต้องการลบรายการนี้หรือไม่')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3" style="padding-left: 40%;">{{ $products->links() }}</div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

  </section>
  @endsection