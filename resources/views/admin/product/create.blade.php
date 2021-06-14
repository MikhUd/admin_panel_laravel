@extends('layouts.admin_layout')

@section('title', 'Добавить товар')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить товар</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success')) <!--Если пришел ответ со статусом succes, то выводим алерт-->
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Введите название товара" required>
                                </div>
                                <div class="form-group">
                                    <label for="text">Описание товара</label>
                                    <textarea placeholder="Введите описание товара" name="text" id="text" class="editor"></textarea>                     
                                </div>
                                <div class="form-group">
                                    <label for="img">Ссылка на изображение</label>
                                    <input type="text" name="img" class="form-control" id="img"
                                        placeholder="Вставьте ссылку на изображение" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена товара</label>
                                    <input type="text" name="price" class="form-control" id="price"
                                        placeholder="Укажите цену товара" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection