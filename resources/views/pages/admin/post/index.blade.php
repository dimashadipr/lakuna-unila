@extends('layouts.dash')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="card-title">{{ Str::upper($title) }}</h5>
        <div class="card-actions">
            <a href="{{ route('post.create') }}">
                <button class="btn btn-secondary create-new btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasJurusan" aria-controls="offcanvasJurusan">
                <span>
                    <i class="bx bx-plus me-1"></i>
                        <span class="d-none d-lg-inline-block">
                            Tambah Artikel
                        </span>
                </span>
            </button>
            </a>
        </div>
    </div>
<div class="card-body">
    <table class="table table-bordered py-4" id="myTable">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul Artikel</th>
                <th>Author</th>
                <th>Kategori</th>
                <th>Isi Artikel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $posts as $post )
            <tr>
                <td><img src="{{ asset('storage/img/posts/' . $post->cover) }}" alt="Thumbnail Artikel" class="img-thumbnail" style="max-width: 150px"></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->category }}</td>
                <td>{!! htmlspecialchars_decode(stripslashes(Str::limit($post['body_content'], 100))) !!}</td>
                <td>
                    
                    <form action="{{ route('post.destroy', $post) }}" method="POST">
                        <a class="btn btn-warning btn-sm" href="{{ route('post.edit', $post->id) }}"><i class="fa-solid fa-pen-to-square"></i> &nbsp; Ubah</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-trash"></i> &nbsp; Hapus</button>
                        
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Confirm Deleting Data</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        

    </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection

