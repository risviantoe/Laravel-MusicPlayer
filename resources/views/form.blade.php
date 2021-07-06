@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Isikan Data Dengan Lengkap</b></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{url('/insert-post')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            {{-- <label>Judul</label> --}}
                            <input placeholder="Judul" type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}}">
                            @error('judul')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{-- <label>Isi</label> --}}
                            <textarea placeholder="Isi" class="form-control" id="isi" rows="7" name="isi"></textarea>
                            @error('isi')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
