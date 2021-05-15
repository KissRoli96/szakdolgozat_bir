@extends('layout')

@section('content')
  <h1>Találati eredmények erre a kifejezésre: {{$name}}</h1>
    <br>
  @forelse($classrooms as $classroom)
          <table class="table table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col">Tanterem neve</th>
                      <th scope="col">Kapacítás</th>
                      <th scope="col">Részletek</th>
                  </tr>
              </thead>
                  <tbody>
                  <tr>
                      <td>
                          {{$classroom->full_name}}
                      </td>
                      <td>
                          {{$classroom->capacity}}
                      </td>
                      <td>
                          <div class="col"><a class="btn btn-info" href="/classrooms/view/{{$classroom->classroom_id}}">Részletek a teremről</a></div>
                      </td>

                  </tr>
                  </tbody>
      @empty
          <h3>Nincs találat </h3>
      @endforelse
      </table>
@endsection
