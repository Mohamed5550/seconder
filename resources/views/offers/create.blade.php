@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Name: Mahmoud Hesham</div>

                @if(Session::has('success'))
                <div class="container">
                  <span class="alert alert-success">
                    {{Session::get('success')}}
                  </span>
                </div>
                @endif
                <div class="card-body">


                  <form method="POST" action="{{route('offers.store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" />
                      @error('name')
                        <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"/>
                      @error('price')
                        <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                    </div>

                    <button class="btn btn-success">Create</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
