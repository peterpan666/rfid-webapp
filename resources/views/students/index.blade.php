@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="pull-right" method="GET" action="{{route('students.index')}}">
                    <label>
                        Promotion:
                        <select name="promotion" onchange="this.form.submit()">
                            @foreach($promotions as $promotion)
                            <option {{$activePromotion == $promotion['promotion'] ? 'selected' : ''}}>{{$promotion['promotion']}}</option>
                            @endforeach
                        </select>
                    </label>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            {{--<th>#</th>--}}
                            <th>Nom</th>
                            <th>Adresse email</th>
                            <th>Premier passage détecté</th>
                            <th>Dernier passage détecté</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                {{--<td>{{$student->id}}</td>--}}
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    @if (count($student->detections))
                                        {{$student->detections->last()->created_at}}
                                        <br>
                                        {{$student->detections->last()->room}}
                                    @endif
                                </td>
                                <td>
                                    @if (count($student->detections))
                                        {{$student->detections->first()->created_at}}
                                        <br>
                                        {{$student->detections->first()->room}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
