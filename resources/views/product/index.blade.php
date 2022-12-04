@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Product </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Zircos</a>
                    </li>
                    <li>
                        <a href="#">Product </a>
                    </li>
                    <li class="active">
                        List
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div class="button-list m-b-0">
                    <a href="{{ route('product.create') }}" class="btn btn-success waves-effect w-md waves-light">Add</a>
                </div>
                <table id="datatable" class="table table-striped table-colored table-info">
                    <thead>
                        <tr>
                            <th>S. N.</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td><div class="button-list">
                                <a href="{{ route('product.edit', $value->id) }}" class="btn btn-warning btn-xs waves-effect w-xs waves-light">Edit</a>
                                <form method="post" action="{{ route('product.destroy', $value->id) }}">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs waves-effect w-xs waves-light">Delete</button>
                                </form>
                            </div></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#datatable').dataTable();
    </script>
@endsection
