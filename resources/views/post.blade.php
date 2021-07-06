@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row flex">
                        <div style="width:50%;padding:10px;"><b>Data Post</b></div>
                        <div style="width:50%;text-align:right;padding-right:15px;">
                            <a href="{{url('/form')}}" class="btn btn-info">+</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{-- <div class="table-responsive"> --}}
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th style="min-width: 150px;">Judul</th>
                                    <th style="width: 480px;">Isi</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th style="min-width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td >{{$item->isi}}</td>
                                    <td >{{$item->created_at}}</td>
                                    <td >{{$item->updated_at}}</td>
                                    <td><a href="{{url('/edit',$item->id)}}" >Edit</a> | <a href="{{url('/delete',$item->id)}}" >Hapus</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
