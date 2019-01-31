@extends('layouts.app')
@section('title', '購物車')

@section('content')
<div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-header">我的購物車</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>商品</th>
                            <th>單價</th>
                            <th>數量</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody class="product_list">
                    @foreach($cartItems as $item)
                        <tr data-id="{{ $item->productSku->id }}">
                            <td>
                                <input type="checkbox" name="select" value="{{ $item->productSku->id }}" {{ $item->productSku->product->on_sale ? 'checked' : 'disabled' }}>
                            </td>
                            <td class="product_info">
                                <div class="preview">
                                    <a target="_blank" href="{{ route('products.show', [$item->productSku->product_id]) }}">
                                        <img src="{{ $item->productSku->product->image_url }}">
                                    </a>
                                </div>
                                <div @if(!$item->productSku->product->on_sale) class="not_on_sale" @endif>
                                    <span class="product_title">
                                        <a target="_blank" href="{{ route('products.show', [$item->productSku->product_id]) }}">{{ $item->productSku->product->title }}</a>
                                    </span>
                                    <span class="sku_title">{{ $item->productSku->title }}</span>
                                    @if(!$item->productSku->product->on_sale)
                                        <span class="warning">該商品已下架</span>
                                    @endif
                                </div>
                            </td>
                            <td><span class="price">NT${{ $item->productSku->price }}</span></td>
                            <td>
                                <input type="text" class="form-control form-control-sm amount" @if(!$item->productSku->product->on_sale) disabled @endif name="amount" value="{{ $item->amount }}">
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger btn-remove">移除</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptAfterJs')
<script>
    $(document).ready(function () {
        $('.btn-remove').click(function () {
            var id = $(this).closest('tr').data('id');
            swal({
                title: "確定要將該商品移除？",
                icon: "warning",
                buttons: ['取消', '確定'],
                dangerMode: true,
            })
                .then(function (willDelete) {
                    if (!willDelete) {
                        return;
                    }
                    axios.delete('/cart/' + id)
                        .then(function () {
                            location.reload();
                        });
                });
        });

        $('#select-all').change(function () {
            var checked = $(this).prop('checked');

            $('input[name=select][type=checkbox]:not([disabled])').each(function () {
                $(this).prop('checked', checked);
            });
        });
    });
</script>
@endsection