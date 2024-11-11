@extends('layouts.auth')

@section('title')
    Login Alumni | Tracer Study
@endsection


@section('content')
    <div class="flex flex-col lg:flex-row h-screen items-center">
        <!-- Bagian kiri -->
        <div class="bg-blue-50 hidden lg:flex justify-center items-center w-full lg:w-1/2 xl:w-2/3 h-screen">
            <img data-aos="zoom-in" class="w-2/3" src="{{ asset('assets/img/illustrations/Graduation-bro.svg') }}">
        </div>

        <!-- Bagian kanan -->
        <div class="bg-white w-full lg:w-1/2 xl:w-1/3 h-screen lg:h-auto flex items-center lg:px-7 sm:px-32">
            <div data-aos="fade-up" class="p-16 sm:p-0 lg:p-20 xl:p-20 w-full">
                <!-- Header -->
                <div class="flex justify-center items-center mb-8">
                    <img class="h-20 w-20
                    " src="{{ asset('assets/logo/logo.png') }}" alt="">
                    <div class="flex flex-col">
                        <h1 class="text-3xl text-secondary font-bold">Tracer Study</h1>
                        <h1 class="text-3xl text-blue-500 font-bold">Lakuna Unila</h1>
                    </div>
                </div>
                <form action="{{ route('auth.login') }} " method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nik" class="label">NIK</label>
                        <input type="text" id="nik" name="nik" placeholder="Masukkan NIK Anda"
                        class="form-control focus:shadow-outline @error('nik') is-invalid @enderror" autofocus>
                        @error('nik')
                            <label class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <label for="remember" class="inline-flex items-center ">
                            <input type="checkbox" id="remember" name="remember" class="form-checkbox text-blue-500">
                            <span class="ml-2 text-gray-600">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-full mb-4">Masuk</button>
                    <a href="/" class="btn btn-outline-secondary w-full">Kembali</a>
                </form>
                <hr class="my-8">
            </div>
        </div>

    </div>
    
@endsection
