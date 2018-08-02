@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 {!! Form::open(['method' => 'POST','url' => 'convert_png_to_pdf/','class' => 'form-inline','id' => 'convert-png-pdf-frm','files' => true]) !!}
                 <input type="file" name="conversion_file">

                 <input type="submit" name="submit">
                 {!! Form::close() !!}<!-- </form> -->
            </div>
        </div>
    </div>
</div>
@endsection


