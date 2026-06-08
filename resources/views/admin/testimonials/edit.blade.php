@extends('layouts.admin')
@section('title', 'Edit Testimonial')

@section('content')

    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="admin-card p-6">
            @include('admin.testimonials._form')
        </div>

        <div class="mt-4">
            <button class="btn-admin">
                Update
            </button>
        </div>

    </form>

@endsection
