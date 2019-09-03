@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success float-right">Add Post</a>
</div>

<div class="card card-default">

    <div class="card card-header">Posts</div>

    <div class="card-body">
        @if($posts->count()>0)
        <table class="table">
        
        <thead>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Tags</th>
            <th></th>
            <th></th>

        </thead>

        <tbody>

            @foreach($posts as $post)

                <tr>

                    <td>
                        {{ $post->title }}
                    </td>

                    <td>
                        {{ $post->description }}
                    </td>

                    <td>
                    {{ $post->category->name }}
                    </td>

                    
                    

                    <td>

                    @foreach($tags as $tag)
    
                        @if($post->hasTag($tag->id)) 
                            
                            {{ $tag->name }} 

                        @endif
    
                    @endforeach 

                    </td>
                    
                    
                    

                    <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>

                    <!--
                    <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                 Delete                           
                            </button>
                        </form>
                    </td> -->
                    <td>
                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $post->id }})">Delete</button>
                    </td>
                </tr>

            @endforeach
        
        </tbody>

        </table>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletePostForm" >
                    
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Are you sure you want to delete this Post?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                    </div>

                </form>
            </div>
        </div>

        @else
           <h3 class="text-center">No post available</h3> 
        @endif

        

    </div>

</div>

@endsection

@section('scripts')

<script>
    function handleDelete(id){

       var form = document.getElementById('deletePostForm')
       form.action = '/posts/' + id 
       
       $('#deleteModal').modal('show')
    }
</script>

@endsection