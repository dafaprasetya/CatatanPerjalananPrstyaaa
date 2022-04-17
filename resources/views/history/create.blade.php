@extends('home')
@section('usercontent')

<div class="form-group">
    <label for="birthdate">Birthdate</label>
    <input class="form-control" placeholder="Birthdate" type="date" name="birthdate" id="birthdate" />
        @if ($errors->has('birthdate'))
            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
        @endif
</div>

<div class="input-group bootstrap-timepicker timepicker">
    <input id="timepicker1" type="text" class="form-control input-small">
    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
</div>

  <script>

    $(document).ready(function() {

        $('#date').datepicker({

            format: 'HH:mm:ss',

            autoclose: true,

        });
        $('#timepicker1').timepicker({
            showInputs: false
        });
    });


  </script>
@endsection
