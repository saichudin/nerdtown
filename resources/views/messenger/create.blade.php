@extends('front-base')

@section('content')
    <div class="container pt-4">
        <h1 class="text-center">Create a new message</h1>
        <div class="col-md-12">
            <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <!-- Subject Form Input -->
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                               value="{{ old('subject') }}">
                    </div>

                    <!-- Message Form Input -->
                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>

                    @if($users->count() > 0)
                        <div class="checkbox">
                            @foreach($users as $user)
                                <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                        value="{{ $user->id }}">{!!$user->name!!}</label>
                            @endforeach
                        </div>
                    @endif

                <!-- Submit Form Input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
