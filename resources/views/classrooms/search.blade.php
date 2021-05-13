@extends('layout')

@section('content')
  <h1>Találati eredmények erre a kifejezésre: {{$name}}</h1>

      @forelse($classrooms as $classroom)
          <div class="row">
              <div class="col">{{$classroom->full_name}}</div>
              <div class="col">{{$classroom->capacity}}</div>
              <div class="col"><a class="btn btn-info" href="/classrooms/view/{{$classroom->classroom_id}}">Uzsgyi</a></div>
          </div>
      @empty
          <h3>Nincs találat </h3>
      @endforelse

@endsection
