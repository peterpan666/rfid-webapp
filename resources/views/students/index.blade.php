@extends('app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            $(function () {
                var date = moment('{{$date}}', 'DD-MM-YYYY');

                $('#datetimepicker').datetimepicker({
                    locale: 'fr',
                    format: 'DD-MM-YYYY',
                    showTodayButton: true,
                    daysOfWeekDisabled: [0, 6],
                    defaultDate: date,
                    useCurrent: false
                });
            });
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-inline pull-right" method="GET" action="{{route('students.index')}}">
                    <label>
                        Promotion:
                        <select class="form-control" name="promotion">
                            @foreach($promotions as $promotion)
                            <option {{$activePromotion == $promotion['promotion'] ? 'selected' : ''}}>{{$promotion['promotion']}}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker'>
                            <input type='text' class="form-control" name="date" value="{{$date}}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <button class="btn btn-default" type="submit">Chercher</button>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse email</th>
                            <th>Tag</th>
                            <th>Premier passage détecté</th>
                            <th>Dernier passage détecté</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>
                                    <a href="{{route('students.edit', ['id' => $student->id])}}">{{$student->name}}</a>
                                </td>
                                <td>
                                    <a href="mailto:{{$student->email}}?Subject=Abscence%20du%20{{$date}}" target="_top">{{$student->email}}</a>
                                </td>
                                <td>{{$student->tag_id}}</td>
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
