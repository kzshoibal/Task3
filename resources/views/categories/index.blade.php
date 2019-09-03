@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Categories</div>

    <div class="car-body">
        @if($categories->count()>0)
        <table class="table">
           <thead>
            <th>Name</th>
            <th>Posts Count</th>
            
           </thead> 

           <tbody>
            @foreach($categories as $category)

            <tr>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    {{ $category->posts->count() }}
                </td>
            </tr>

            @endforeach
           </tbody>
        </table>

        @else
            <h3 class="text-center">No category available</h3> 
        @endif
        
    </div>
</div>

@endsection