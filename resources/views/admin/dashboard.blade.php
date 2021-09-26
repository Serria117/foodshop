@extends('admin.layout')
@section('page', 'Dashboard') {{-- The page title --}}

@section('content')
    <style>
        table {
            table-layout: fixed;
        }

        th {
            text-align: center;
            justify-content: center;
        }

        .mt {
            width: 40%;
        }

        td {
            text-align: center;
            justify-content: center;
        }

        .con-hang {
            font-size: smaller;
            color: white;
            background-color: #1e7e34;
            border-radius: 5px;
            width: 80%;
            margin: 0 auto;
            padding: 2px
        }

        .het-hang {
            font-size: smaller;
            color: white;
            background-color: crimson;
            border-radius: 5px;
            width: 80%;
            margin: 0 auto;
            padding: 2px
        }

        .kinh-doanh {
            font-size: smaller;
            color: white;
            background-color: blue;
            border-radius: 5px;
            width: 80%;
            margin: 10px auto;
            padding: 2px
        }

        .ngung-kinh-doanh {
            font-size: smaller;
            color: white;
            background-color: orange;
            border-radius: 5px;
            width: 80%;
            margin: 10px auto;
            padding: 2px
        }


    </style>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="product-tb" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:80px">Index</th>
                        <th>Sản phẩm</th>
                        <th class="mt">Mô tả</th>
                        <th style="width: 150px">Giá bán</th>
                        <th style="width: 150px">Tồn kho</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                    @foreach($product as $pd)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <p><b>{{$pd->name}}</b></p>
                                @if($pd->stock == 0)
                                    <p class="het-hang">Hết hàng</p>
                                @else
                                    <p class="con-hang">Còn hàng</p>
                                @endif
                                @if($pd->status == 1)
                                    <p class="kinh-doanh">Kinh doanh</p>
                                @else
                                    <p class="ngung-kinh-doanh">Ngừng kinh doanh</p>
                                @endif
                            </td>
                            <td style="text-align: justify">{{$pd->description}}</td>
                            <td>{{$pd->price}}</td>
                            <td>{{$pd->stock}}</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#edit-product"
                                        data-id="{{$pd->id}}" onclick="putInfo({{$pd->id}})">Edit
                                </button>
                            </td>
                        </tr>
                        @php $i++ @endphp
                    @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="edit-productTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="edit-productTitle">Cập nhật thông tin sản phẩm</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Content -->
                        <div class="container">
                            <form>
                                <input class="modal-id" type="hidden" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product-name">Tên sản phẩm:</label>
                                            <input type="text" class="form-control" id="product-name"
                                                   name="product-name" aria-describedby="nameHelp" placeholder="">
                                            <small id="nameHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Danh mục:</label>
                                            <select id="category" class="form-control" name="category">
                                                <option value="0">Select...</option>
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Mô tả:</label>
                                            <textarea class="form-control" id="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Kinh doanh</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                   id="inlineRadio2" value="0">
                                            <label class="form-check-label" for="inlineRadio2">Ngừng kinh doanh</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div><!-- /.card -->
    </div><!-- /.container-fluid -->
    <script>
        function putInfo(id){
            $(".modal-id").val(id);
            $.post('{{ route('admin.product.show') }}',
                {
                    '_token': $('[name=csrf-token]').attr('content'),
                    id: id
                },
                function(response){
                    let data = JSON.parse(response)
                    console.log(data);
                    $("#product-name").val(data[Object.keys(data)].name);
                    $("#description").val(data[Object.keys(data)].description);
                }
            );
        }
    </script>
@endsection
