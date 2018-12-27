@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">İçerikler</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">İçerik Yönetimi</h4>
                            <div style="margin:15px 20px 10px; float:right;"><a href="{{ route('yazilar.create') }}" class="btn btn-success">İçerik Ekle</a></div>
                            <div class="table-responsive">
                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 177px;">Yazı Başlık</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 282.6px;">Kategori</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 135.4px;">Yazar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 5%;">Düzenle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 5%;">Sil</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach( $posts as $post)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $post->title }}</td>
                                                        <td>{{ $post->category->title }}</td>
                                                        <td>{{ $post->user->name }}</td>
                                                        <td><a href="{{ route('yazilar.edit',$post->id) }}"  class="btn btn-warning">Düzenle</a></td>
                                                        {!! Form::model($post, ['route' => ['yazilar.destroy', $post->id ], 'method' => 'delete']) !!}
                                                        <td><button type="submit" class="btn btn-danger btn-sm">Sil</button></td>
                                                        {!! Form::close() !!}
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
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
@endsection
@section('css')
    <!-- datatables css -->
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection
@section('js')
    <script src="/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script> $('#zero_config').DataTable(); </script>
@endsection