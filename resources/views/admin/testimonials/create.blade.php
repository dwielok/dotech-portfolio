@extends('layouts.admin')
@section('title', 'Tambah Testimonial')

@section('content')

    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">

        @csrf

        <div class="admin-card p-6">
            @include('admin.testimonials._form')
        </div>

        <div class="mt-4">
            <button class="btn-admin">
                Simpan
            </button>
        </div>

    </form>

@endsection
