@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Attribute </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Zircos</a>
                    </li>
                    <li>
                        <a href="#">Attribute </a>
                    </li>
                    <li class="active">
                        Create
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-color panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Fields with * are mendatory</h3>
                </div>
                <div class="panel-body">
                    
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post" action="{{ route('attribute.store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-1 control-label">Title *</label>
                                <div class="col-md-11">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-md-1 control-label">Text area</label>
                                <div class="col-md-11">
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-md-1 control-label">Status *</label>
                                <div class="col-md-11">
                                    <div class="radio">
                                        <input type="radio" name="status" id="active" value="1" required {{ old('status') ? (old('status') == 1 ? "checked" : "") : "" }}>
                                        <label for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="status" id="inactive" value="2" {{ old('status') ? (old('status') == 2 ? "checked" : "") : "" }}>
                                        <label for="inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-11 col-sm-offset-1">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        Save
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
