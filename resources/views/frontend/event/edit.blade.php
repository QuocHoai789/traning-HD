@extends('frontend.main.master')

@section('content')
    <div class="container pd50">
        <div class="row">
            <form method="POST" class="form_edit_event" data-id="{{ $event->id }}"
                action="{{ route('event.save', ['id' => $event->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Name Event</label>
                    <input type="text" class="@error('title_post') is-invalid @enderror form-control" id="namecategory"
                        name="name" value="{{ $event->name }}" placeholder="Title post">
                </div>
                {{-- @error('title_post')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}

                <div class="form-group">
                    <label for="formGroupExampleInput">Content Post</label>
                    <textarea name="content" class="ckeditor  @error('content') is-invalid @enderror  form-control "
                        id="content" cols="30" rows="10">{{ $event->content }}</textarea>
                </div>
                {{-- @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
                <button type="submit" class="btn btn-primary mb-2">Save</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    {{-- <script>
        $(document).ready(function() {
            $(window).bind("beforeunload", function() {
                var id = $('.form_edit_event').data('id');
               // return confirm("Do you really want to close?");
                $.ajax({
                        url: "/update-status-edit/" + id,
                        type: 'GET',

                    }).done(function() {
                        //alert('You do nothing in 5 minutes');
                    })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            // alert('rưer');
            var flag = 1;
            // for (var i in CKEDITOR.instances) {
            //     CKEDITOR.instances[i].on('change', function() {
            //         flag = 1;
            //     });
            // }

            $('.form_edit_event input').on('change input', function() {

                flag = 1;

            })
            $('.form_edit_event textarea').on('keyup textarea', function() {

                flag = 1;
            })
            var id = $('.form_edit_event').data('id');
            setInterval(function() {
                if (flag == 0) {
                    $.ajax({
                        url: "/update-status-edit/" + id,
                        type: 'GET',

                    }).done(function() {

                        alert('You do nothing in 5 minutes');
                    })
                    window.location.href = "{{ route('event.list') }}";

                } else {
                    flag = 0;
                }

            }, 100000);

        })
    </script> --}}
@endsection
