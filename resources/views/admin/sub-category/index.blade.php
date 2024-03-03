@extends('admin.master')
@section('title','Manage Sub Category')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">All Sub Category Information</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">SL No</th>
                                    <th class="wd-15p border-bottom-0">Category Name</th>
                                    <th class="wd-15p border-bottom-0">Sub Category Name</th>
                                    <th class="wd-20p border-bottom-0">Sub Category Description</th>
                                    <th class="wd-15p border-bottom-0">Sub Category Image</th>
                                    <th class="wd-10p border-bottom-0">Status</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                @foreach($sub_categories as $sub_category)
                                    <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{isset($sub_category->category->name) ? $sub_category->category->name : ''}}</td>
                                        <td>{{$sub_category->name}}</td>
                                        <td>{{$sub_category->description}}</td>
                                        <td><img src="{{asset($sub_category->image)}}" alt="" height="50" width="60"></td>
                                        <td>{{$sub_category->status}}</td>
                                        <td>
                                            <a href="{{route('sub-category.edit', ['id' => $sub_category->id])}}" class="btn btn-sm btn-success rounded-0">
                                                <i class="fa fa-edit">Edit</i>
                                            </a>
                                            <a href="{{route('sub-category.delete',['id' => $sub_category->id])}}" onclick="return confirm('Are you sure to delete this....')" class="btn btn-sm btn-danger rounded-0">
                                                <i class="fa fa-trash">Delete</i>
                                            </a>
                                        </td>

                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
@endsection
