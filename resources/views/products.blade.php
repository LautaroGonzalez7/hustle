@extends('layouts.app')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Tienda</a></li>
                <li><a href="#">Categoría</a></li>
                <li class="active">Siempre juntos</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- MAIN -->
                <div id="main" class="col-md-12">
                    <!-- STORE -->
                    <div>
                        <!-- row -->
                        <div class="row">
                        @foreach ($products as $product)
                            <!-- Product Single -->
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <span class="sale">{{round(($product->price - $product->old_price) * 100 / $product->price)}}%</span>
                                            </div>
                                            <a href="{{url('/single-product/'.$product->id)}}"
                                               class="main-btn quick-view"><i
                                                    class="fa fa-search-plus"></i> Ver producto
                                            </a>
                                            <img
                                                src="{{$product->images ? '/storage/products/'.json_decode($product->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                                alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">S/{{$product->price}}
                                                <del class="product-old-price">S/{{$product->old_price}}</del>
                                            </h3>
                                            <h2 class="product-name"><a href="#">{{$product->name}}</a></h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Product Single -->
                            @endforeach
                        </div>
                        <!-- /row -->
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination pagination-color">
                                @if($products->currentPage()-1 > 0)
                                <li>
                                    <a href="{{route('products', ['page' => $products->currentPage()-1])}}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @endif
                                @for ($page = 1; $page <= $products->lastPage(); $page++)
                                    <li class="{{$products->currentPage() === $page ? 'active' : '' }}">
                                        <a href="{{route('products', ['page' => $page])}}">{{$page}}</a>
                                    </li>
                                @endfor
                                @if($products->nextPageUrl())
                                <li>
                                    <a href="{{$products->nextPageUrl()}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <!-- /STORE -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
