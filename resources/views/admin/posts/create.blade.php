@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('yazilar.index')}}'>İçerikler</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            {!! Form::open( [ 'route' => 'yazilar.store','method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <div class="card-body">
                <h4 class="card-title">İçerik Ekle</h4>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 text-right control-label col-form-label">Kategori Seçin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="category_id" id="">
                            <option value="" selected>Kategori Seçin</option>

                            @foreach( $categories as $category)

                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">İçerik Başlık</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">İçerik Resmi</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 text-right control-label col-form-label">İçerik</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" id="editor" name="content"></textarea>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">ekle</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/translations/tr.js"></script>
    <script src="/js/editor.js"></script>
@endsection