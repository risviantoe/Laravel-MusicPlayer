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

                    <form action="{{url('/update-post')}}" method="POST">
                    @csrf
                    @foreach ($posts as $item)
                    <div class="form-group">

                        <input placeholder="Judul" type="text" class="form-control" id="judul" name="judul" value="{{$item->judul}}">
                        @error('judul')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Isi" class="form-control" id="isi" name="isi" rows="7">{{$item->isi}}</textarea>
                        @error('isi')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endforeach
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
