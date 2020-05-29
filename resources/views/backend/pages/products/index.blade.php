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
                    <?php for($i=1;$i<=10;$i++){?>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <a>
                                Lenovo Laptop Y30
                            </a>
                            <br/>
                            <small>
                                Created 01.01.2019
                            </small>
                        </td>
                        <td>
                            99565656565656
                        </td>
                        <td>
                           20
                        </td>
                        <td >
                            24,500.00
                        </td>
                        <td>Electronic</td>
                        <td><span class="badge badge-success">Success</span></td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

  </section>
  @endsection