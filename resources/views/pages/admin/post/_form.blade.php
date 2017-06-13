        <div class="col-lg-9">

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        {!! Form::label('body', 'Content') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control body', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('body') }}</small>
                    </div>

        </div>
        <div class="col-lg-3">

                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                        {!! Form::label('author', 'Author') !!}
                        {!! Form::text('author', Auth::user()->name, ['class' => 'form-control', 'required' => 'required', 'readonly']) !!}
                        <small class="text-danger">{{ $errors->first('author') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        {!! Form::label('date', 'Date') !!}
                        {!! Form::date('date', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('date') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', [ '1' => 'Published', '0' => 'Unpublished'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', App\Category::pluck('category', 'id'), null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image') !!}
                        <p class="help-block">Insert an Image</p>
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>

                    @if (isset($post) && $post->image !== '')
                      <div class="thumbnail">
                        <img src="{{ asset('image/featured_image/' . $post->image ) }}" class="image-rounded" alt="">
                      </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">Cancel</button>
                    </div>
        </div>
