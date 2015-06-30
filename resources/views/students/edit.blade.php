@extends('app')

@section('js')
    <script>
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form method="POST" action="{{route('students.update', ['id' => $student->id])}}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <h1 class="form-control-static">{{$student->name}}</h1>
                    </div>
                    <div class="form-group">
                        <label>Adresse email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')?old('email'):$student->email}}">
                    </div>
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" name="tag_id" class="form-control" placeholder="Numéro de tag" value="{{old('tag_id')?old('tag_id'):$student->tag_id}}">
                    </div>
                    <button type="submit" class="btn btn-default">Mettre à jour</button>
                    <a href="{{route('students.index')}}" class="btn btn-danger">Annulé</a>
                </form>
            </div>
        </div>
    </div>
@endsection
