@extends('front')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Galery</li>
                    </ol>
                </div>
                <div class="col-md-12 mt-3">
                    @if (session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    @foreach ($galery as $item)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                    <a href="#">{{ Auth::user()->name }}</a>
                                                    <a href="#" class="float-right btn-tool" data-toggle="dropdown"><i
                                                            class="fas fa-ellipsis-v"></i></a>

                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#modal-update{{ $item->id }}">
                                                            Edit
                                                        </a>
                                                        <a href="{{ url('timeline/' . $item->id) }}"class="dropdown-item"
                                                            onclick="return confirm('Apakah Yakin Untuk Di Hapus??')">
                                                            Delete
                                                        </a>
                                                    </div>


                                                </span>
                                                <span class="description">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            @if ($item->foto)
                                                <div class="row py-3">
                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('img/' . $item->foto) }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div>
                                                </div>
                                            @endif
                                            <h3>{{ $item->judul }}</h3>
                                            <p>
                                                {{ $item->deskripsi }}
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                        </div>

                                        {{-- Modal Update --}}
                                        <div class="modal fade" id="modal-update{{ $item->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Default Update</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('timeline/' . $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="text" name="judul" required
                                                                    maxlength="100" placeholder="Judul"
                                                                    value="{{ $item->judul }}" class="form-control"
                                                                    id="">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required rows="5">{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="file" accept="image/*" name="foto"
                                                                    id="updateImage{{ $item->id }}">
                                                                <p class="text-danger">Foto harus
                                                                    berformat,jpg,svg,png, dan gif
                                                                </p>
                                                            </div>
                                                            <div class="form-group">
                                                                @if ($item->foto)
                                                                    <img src="{{ asset('img/' . $item->foto) }}"
                                                                        id="updatePreview{{ $item->id }}"
                                                                        style="max-height: 200px;height:100% ; max-width:150px; width:100%">
                                                                @else
                                                                    <img id="updatePreview{{ $item->id }}"
                                                                        style="max-height: 200px;height:100% ; max-width:150px; width:100%">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    @endforeach
                                    <!-- /.post -->

                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
