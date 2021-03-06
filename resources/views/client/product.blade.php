<!-- Content -->
@extends('client.layout.client')
@section('title' , 'Sản phẩm')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/product.css') }}">
@endsection
@section('main_content')
<div class="content">
    <div class="content_header padding__header">
        <ul class="position_page">
            <li><a href="">Trang chủ /</a></li>
            <li><a href="">Sản phẩm</a></li>
        </ul>
        <div class="filter_product-bg">
            <p class="sum__product-page">Showing 1–40 of 114 results</p>
            <select class="filter__product" name="" id="select-filter">
                <option value="1">Mới nhất</option>
                <option value="2">Theo giá : từ cao đến thấp</option>
                <option value="3">Theo giá : từ thấp đến cao</option>
            </select>
        </div>
    </div>
    <div class="content_list">
        <div class="product_cate-bg">
            <h4 class="product_cate-title">Danh mục sản phẩm</h4>
            <ul class="product__cate-list">
                @foreach($category as $key)
                <li data-id="{{ $key->id }}" class="product__cate-item"><a href="" class="product__cate-link">{{ $key->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="product__all-list-bg">
            <div class="product__all-list">
                @foreach($productAll as $key)
                <a href="{{ route('product.detail' , ['slug' => $key->slug]) }}">
                    <div class="product__all-list-item">
                        <img class="" src=" {{ asset('client/image/'.$key->img) }}" alt="">
                        <a href="" class="btn__view">Chọn mẫu</a>
                        <span class="percent_sale">-20%</span>
                        <span class="product__all-name"><a href="">{{$key->name}}</a></span>
                        <div class="product__hot-list-infor-price">
                            <bdo dir="ltr"><?= number_format("$key->price", 0, ",", "."); ?>₫</bdo>
                            <span><?= number_format("$key->priceSale", 0, ",", ".") ?>₫</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <ul class="page__paging-list">
                <li class="page__paging-item"><a href="">1</a></li>
                <li class="page__paging-item"><a href="">2</a></li>
                <li class="page__paging-item"><a href="">3</a></li>
                <li class="page__paging-item"><a href="">4</a></li>
            </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.product__cate-item').click(function(e) {
            e.preventDefault();
            var cate = $(this).data('id');
            // alert(cate);
            $.get("<?= route('product.paging') ?>", {
                cate_id: cate
            }, function($data) {
                $('.product__all-list').html($data);
            })
        })
        $('#select-filter').on('change', function() {
            filter_id = $('#select-filter').val();
            $.get("<?= route('product.filter') ?>", {
                filter_id: filter_id
            }, function($data) {
                $('.product__all-list').html($data);
            })
        })
    });
    // $(document).ready(function() {})
</script>
@endsection