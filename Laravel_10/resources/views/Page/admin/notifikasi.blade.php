@extends('admin')

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notifikasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Notifikasi</li>
                        </ol>
                    </div>
                    @if (session('secondary'))
                        <div class="col-md-12">
                            <div class="alert alert-info mt-3">
                                {{ session('secondary') }}
                            </div>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    @if (session('alert'))
                        <div class="col-md-12">
                            <div class="alert alert-danger mt-3">
                                {{ session('alert') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    {{-- <a href="compose.html" class="btn btn-primary btn-block mb-3">Acc</a> --}}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Folders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-inbox"></i> Inbox
                                        <span class="badge bg-primary float-right">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt"></i> Trash
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                                <!-- /.btn-group -->
                                <a href="{{ url('notifikasi') }}" type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                                <div class="float-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-success btn-sm">
                                            Accept
                                        </a>
                                        <a type="button" class="btn btn-danger ml-2 btn-sm">
                                            Declined
                                        </a>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($notif as $item)
                                            <form action="{{ url('accStatus') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" name="id[]"
                                                                value="{{ $item->id }}" id="check{{ $item->id }}">
                                                            <label for="check{{ $item->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('img/' . $item->foto) }}" height="80"
                                                            alt="">
                                                    </td>
                                                    <td class="mailbox-name"><a
                                                            href="read-mail.html">{{ $item->name }}</a>
                                                    </td>
                                                    <td class="mailbox-subject">
                                                        {{ $item->judul }}
                                                    </td>
                                                    <td class="mailbox-attachment"></td>
                                                    <td class="mailbox-date">{{ $item->created_at->diffForHumans() }}</td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                    <i class="far fa-square"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    <div class="btn-group">
                                        <button type="submit" name="status" value="acc" class="btn btn-success btn-sm">
                                            Accept
                                        </button>
                                        <button type="submit" name="status" value="declined"
                                            class="btn btn-danger ml-2 btn-sm">
                                            Declined
                                        </button>
                                    </div>
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
