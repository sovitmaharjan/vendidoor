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
                            <form class="form-horizontal" method="post" action="{{ route('product.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-1 control-label">Title *</label>
                                    <div class="col-md-11">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title') ?? "test" }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">Text area</label>
                                    <div class="col-md-11">
                                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">Variation *</label>
                                    <div class="col-md-11">
                                        <div style="margin-bottom: 15px">
                                            <button type="button" id="add-variant-button" class="btn btn-success waves-effect waves-light"
                                                data-toggle="modal" data-target="#add-variant">
                                                Add Variation
                                            </button>
                                        </div>

                                        <div id="add-variant" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="add-variant-Label" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:40%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="add-variant-Label">Select the attributes
                                                            for your product variant</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th width="45%">Attribute</th>
                                                                    <th width="45%">Value</th>
                                                                    <th width="10%">
                                                                        <button id="add-attribute" type="button"
                                                                            class="btn btn-success waves-effect waves-light">+</button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="attribute-tbody">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" id="add-variant-with-attribute"
                                                            class="btn btn-primary waves-effect waves-light">Add</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Variation</th>
                                                    <th width="20%">Sku</th>
                                                    <th width="10%">Base Price</th>
                                                    <th width="10%">Stock</th>
                                                    <th width="25%">Price Set</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="variant-tbody">
                                            </tbody>
                                        </table>

                                        <div id="add-price-set" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="add-price-set-Label" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:40%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="add-price-set-Label">Set the price sets
                                                            for your product variation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th width="45%">Set</th>
                                                                    <th width="45%">Price</th>
                                                                    <th width="10%">
                                                                        <button id="add-price-set-value" type="button"
                                                                            class="btn btn-success waves-effect waves-light">+</button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="price-set-tbody">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" id="add-price-set-for-variant"
                                                            class="btn btn-primary waves-effect waves-light">Add</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">Status *</label>
                                    <div class="col-md-11">
                                        <div class="radio">
                                            <input type="radio" name="status" id="active" value="1" required
                                                {{ old('status') ? (old('status') == 1 ? 'checked' : '') : 'checked' }}>
                                            <label for="active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="status" id="inactive" value="2"
                                                {{ old('status') ? (old('status') == 2 ? 'checked' : '') : '' }}>
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
@section('script')
    <script>
        var td, row_count;
        var attributes = {!! $attributes !!};
        var options = '';
        attributes.forEach(e => {
            options += '<option value="' + e.id + '">' + e.title + '</option>'
        });

        $(document).on('click', '#add-variant-button', function() {
            $('#attribute-tbody').html('');
        });

        $(document).on('click', '#add-attribute', function() {
            var row = '<tr><td><select class="form-control"><option value="">Choose...</option>' + options +
                '</select></td><td><input type="text" class="form-control"></td><td><button type="button" class="btn btn-danger waves-effect waves-light remove-attribute">-</button></td></tr>';
            $('#attribute-tbody').append(row);
        });

        $(document).on('click', '#add-variant-with-attribute', function() {
            row_count =  $('#variant-tbody tr').length;
            var attributes = '<div class="button-list">';
            $('#attribute-tbody tr').each(function(index, value) {
                var cols = $(this).children("td");
                attributes += '<button type="button" class="btn btn-custom btn-xs">' + cols.eq(0).find("select").children(':selected').text() + ': ' + cols.eq(1).find("input").val() + '</button><input type="hidden" name="variation[' + row_count + '][attribute][' + cols.eq(0).find("select").val() + '][value]" value="' + cols.eq(1).find("input").val() + '">';
            });
            attributes += '</div>';
            var row = '<tr> <td>' + attributes + '</td> <td>will be based on product title + attribute title, value and some random string to make it unique</td> <td><input class="form-control" type="number" name="variation[' + row_count + '][price]" min="1"></td><td><input class="form-control" type="number" name="variation[' + row_count + '][stock]" min="0"></td><td><button type="button" class="btn btn-success waves-effect waves-light add-price-set-button" data-toggle="modal" data-target="#add-price-set">Add Price Set</button></td><td><button type="button" class="btn btn-danger waves-effect waves-light remove-variant">-</button></td></tr>';
            $('#variant-tbody').append(row);
            $('#add-variant').modal('hide');
        });

        $(document).on('click', '.remove-attribute', function() {
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.remove-variant', function() {
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.add-price-set-button', function() {
            td = $(this).parent();
            $('#price-set-tbody').html('');
        });

        $(document).on('click', '#add-price-set-value', function() {
            var row =
                '<tr><td><input type="text" class="form-control" name="" placeholder="10-50"></td><td><input type="text" class="form-control" name="" placeholder="500"></td><td><button type="button" class="btn btn-danger waves-effect waves-light remove-price-set">-</button></td></tr>';
            $('#price-set-tbody').append(row);
        });

        $(document).on('click', '#add-price-set-for-variant', function() {
            var price_set = '<div class="button-list">';
            $('#price-set-tbody tr').each(function(index, value) {
                var cols = $(this).children("td");
                price_set += '<button type="button" class="btn btn-custom btn-xs">' + cols.eq(0).find("input").val() + ': ' + cols.eq(1).find("input").val() + '</button><input type="hidden" name="variation[' + row_count + '][price_set][' + index + '][set]" value="' + cols.eq(0).find("input").val() + '"><input type="hidden" name="variation[' + row_count + '][price_set][' + index + '][price]" value="' + cols.eq(1).find("input").val() + '">';
            });
            price_set += '</div>';
            td.html(price_set);
            $('#add-price-set').modal('hide');
        });

        $(document).on('click', '.remove-price-set', function() {
            $(this).parent().parent().remove();
        })
    </script>
@endsection
