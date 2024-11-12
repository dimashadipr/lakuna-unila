@extends('layouts.dash')

@section ('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="container mt-5 mb-5">
            <h5 class="card-title">Edit Artikel</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            
                                @csrf
                                @method('PUT')
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Cover Artikel</label>
                                    <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                                
                                    <!-- error message untuk image -->
                                    @error('cover')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kategori" class="font-weight-bold">Kategori Artikel</label>
                                    <select id="kategori" class="form-control" @error('category') is-invalid @enderror" name="category" value="{{ old('category', $post->category) }}">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="NEWS">Berita</option>
                                        <option value="AGENDA">Agenda</option>
                                        <option value="JOBS">Lowongan Kerja</option>
                                    </select>
                    
                                    <!-- error message untuk image -->
                                    @error('category')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Judul Artikel</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" placeholder="Masukkan Judul Product">
                                
                                    <!-- error message untuk title -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Isi Artikel</label>
                                    <textarea class="form-control @error('body_content') is-invalid @enderror" id="myeditorinstance" name="body_content"> {{ old('body_content', $post->body_content) }} </textarea>
                                
                                    <!-- error message untuk description -->
                                    @error('body_content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <button type="submit" class="btn btn-md btn-primary me-3">Update Data</button>
    
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.tiny.cloud/1/eu2le3u9tkusp4ossm6g0jvv9tx5wi2b5r3ehlxa8z5tnb3h/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
        </script>

        <script>
            CKEDITOR.replace( 'body' );
        </script>
        
    </div>

</div>
@endsection