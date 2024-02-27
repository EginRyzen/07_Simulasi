@extends('admin')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataUser</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        {{-- Data User --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data User</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="font-weight-bold">{{ $no++ }}.</td>
                                                <td>
                                                    <div class="image">
                                                        <img src="../../dist/img/user2-160x160.jpg"
                                                            class="img-size-50 mr-3 img-circle" alt="User Image">
                                                    </div>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        <a href="" class="btn btn-success btn-xs">Active</a>
                                                    @else
                                                        <a href="" class="btn btn-danger btn-xs">Suspend</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-warning btn-xs"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-xs ml-2"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>


                        {{-- Data Admin --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Admin</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td class="font-weight-bold">{{ $no++ }}.</td>
                                                <td>
                                                    <div class="image">
                                                        <img src="../../dist/img/user2-160x160.jpg"
                                                            class="img-size-50 mr-3 img-circle" alt="User Image">
                                                    </div>
                                                </td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    @if ($admin->status == 1)
                                                        <a href="" class="btn btn-success btn-xs">Active</a>
                                                    @else
                                                        <a href="" class="btn btn-danger btn-xs">Suspend</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-warning btn-xs"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-xs ml-2"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
