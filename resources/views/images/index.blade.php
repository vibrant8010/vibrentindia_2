@extends('adminpanel.adminlayout')

@section('content')
    <div class="page-inner">
        <div class="container mt-5">
            <h2>Images in public/images</h2>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Size (KB)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1; @endphp
                        @foreach ($images as $image)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $image['name']) }}" class="img-thumbnail"
                                        style="max-width: 50px; max-height: 50px;" alt="{{ $image['name'] }}">
                                </td>
                                <td>{{ $image['name'] }}</td>
                                <td>{{ $image['size'] }} KB</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('images.compress', $image['name']) }}"
                                            class="btn btn-sm btn-primary">
                                            Compress
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        @endsection
