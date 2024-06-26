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
                <!-- NAVBAR -->
                <div class="col-md-3">
                    <form action="" method="get">
                        <input name="filterSearch" type="text" class="form-control" placeholder="Buscar por nombre o codigo">
                    </form>

                    <div class="products-left-navbar">
                        <h5>Rango de precio</h5>

                        <div class="products-left-navbar-prices mt-3">
                            <input type="number" class="form-control" placeholder="Desde">
                            —
                            <input type="number" class="form-control" placeholder="Hasta">
                        </div>

                        <div class="mt-3">
                            <h5>Productos</h5>

                            <div class="products-left-navbar-checkboxes">
                                <div class="products-left-navbar-checkbox-item">
                                    <input type="checkbox" id="c1">
                                    <label for="c1">Flores</label>
                                </div>
                                <div class="products-left-navbar-checkbox-item">
                                    <input type="checkbox" id="c1">
                                    <label for="c1">Regalos</label>
                                </div>
                                <div class="products-left-navbar-checkbox-item">
                                    <input type="checkbox" id="c1">
                                    <label for="c1">Postres</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h5>Categorias</h5>

                            <div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="products-left-navbar-accordion">
                                            <a class="products-left-navbar-accordion-a" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <h4 class="panel-title">Ocasiones</h4>
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body products-left-navbar-accordion-content">
                                                <div class="products-left-navbar-checkboxes">
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Flores</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Regalos</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Postres</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="products-left-navbar-accordion">
                                            <a class="products-left-navbar-accordion-a" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                <h4 class="panel-title">Tipos</h4>
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body products-left-navbar-accordion-content">
                                                <div class="products-left-navbar-checkboxes">
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Flores</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Regalos</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Postres</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="products-left-navbar-accordion">
                                            <a class="products-left-navbar-accordion-a" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                <h4 class="panel-title">Regalos</h4>
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body products-left-navbar-accordion-content">
                                                <div class="products-left-navbar-checkboxes">
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Flores</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Regalos</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Postres</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="products-left-navbar-accordion">
                                            <a class="products-left-navbar-accordion-a" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                <h4 class="panel-title">Postres</h4>
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body products-left-navbar-accordion-content">
                                                <div class="products-left-navbar-checkboxes">
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Flores</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Regalos</label>
                                                    </div>
                                                    <div class="products-left-navbar-checkbox-item">
                                                        <input type="checkbox" id="c1">
                                                        <label for="c1">Postres</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NAVBAR -->
                <!-- MAIN -->
                <div id="main" class="col-md-9">
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
                                                src="{{$product->images ? asset('images/products/'.json_decode($product->images, true)[0]) : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
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
