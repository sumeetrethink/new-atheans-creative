@extends('Admin.index', ['title' => 'Videos'])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session()->has('msg-success'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok">
                        {{ session('msg-success') }}
                    </span>
                </div>
            @elseif(session()->has('msg-error'))
                {
                <div class="btn btn-danger">
                    <span class="glyphicon glyphicon-ok">
                        {{ session('msg-error') }}
                    </span>
                </div>

                }
            @endif
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Videos</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    {{-- <div class="d-flex justify-content-between">
                                        <a href="{{ url('admin/import/people') }}" class="btn btn-success">Import</a>
                                    </div> --}}
                                </div>
                                <div class="card-body">
                                    <div>
                                      
                                    </div>
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting">
                                                    S.No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending">
                                                    Video
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending">
                                                    Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending">
                                                    Username
                                                </th>


                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="ProductTable">
                                            @include('Admin.Videos.table')
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
    
    {{-- delte mdal --}}
    <div class="modal fade show" id="modal-default" style=" padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('/admin/video/delete') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this videos?</h4>
                        <input type="hidden" name="deleteId" id="deleteId" type="text">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
