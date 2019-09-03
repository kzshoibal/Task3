@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Tags</div>

    <div class="car-body">
        @if($tags->count()>0)
        <table class="table">
           <thead>
            <th>Name</th>
            <th>Posts Count</th>
            
           </thead> 

           <tbody>
            @foreach($tags as $tag)

            <tr>
                <td>
                    {{$tag->name}}
                </td>
                <td>
                    {{ $tag->posts->count() }}
                </td>
            </tr>

            @endforeach
           </tbody>
        </table>

        @else
        <h3 class="text-center">No tag available</h3>

        @endif
        
    </div>
</div>

@endsection