<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    {!! Form::label('category', 'Title') !!}
    {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('category') }}</small>
</div>

<div class="form-group">
  <button type="submit" name="button" class="btn btn-primary">Submit</button>
</div>
