@extends('layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <h1>
                Szakdolgozatok
            </h1>
            @auth
            <a class="btn btn-info" href="/theses/insert">Új szakdolgozat felvétele</a>
            @endauth
            <hr>

            <form action="/theses/search" class="form-inline my-2 my-lg-0">
                <input name="name" class="form-control mr-sm-2" type="search" placeholder="tanterem.."  aria-label="Search">

                <div class="form-group">
                    <label for="department">Tanszék</label>
                    <select class="form-control" id="department" name="department">
                        <option value="">Kérjük válasszon tanszéket!</option>
                        @foreach($departments as $department)
                            <option value="{{$department->unique_id}}">{{$department->department}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user">Tanár</label>
                    <select class="form-control" id="user" name="user">
                        <option value="" >Kérjük válasszon Oktatót!</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->user_mail}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Keresés</button>
            </form>

            <br>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tanár</th>
                        <th scope="col">Szakdolgozat címe</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach($theses as $thesis)
                    <tr>
                        <td>
                            {{$thesis->user}}
                        </td>
                        <td>
                            {{$thesis->task_name}}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/theses/view/{{$thesis->id}}" role="button">Részletek</a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>

@endsection
