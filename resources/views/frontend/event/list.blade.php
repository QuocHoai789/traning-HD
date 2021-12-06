@extends('frontend.main.master')

@section('content')
    <div class="container pd50">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $event->name }}</td>
                            <td>
                                <a href="{{ route('event.edit', ['id' => $event->id]) }}" class="btn btn-primary @if($event->user_edit !=null && $event->user_edit != Auth::user()->id) disabled @endif">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


    


