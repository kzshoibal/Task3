@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit post' : 'Create Post' }}
    </div>

    <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)

                        <li class="list-group-item text-danger">
                        {{ $error }}
                        </li>
                            
                    @endforeach
                </ul> 
            </div>
            @endif

            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
            
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif
                
                <div class="form-group">
                
                    <label for="title">Title</label>

                    <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}">

                </div>

                <div class="form-group">
                
                    <label for="description">Description</label>

                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>

                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                    
                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            @if(isset($post))
                                @if($category->id === $post->category_id)
                                    selected
                                @endif
                            @endif
                        
                         >
                            {{ $category->name }}
                        </option>
                    @endforeach
                    </select>
                </div>

                @if($tags->count() > 0)
                <div class="form-group">
            
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                        @foreach($tags as $tag)

                        <option value="{{ $tag->id }}"
                            @if(isset($post))
                                @if($post->hasTag($tag->id))
                                    selected
                                @endif
                            @endif
                        >
                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                @endif



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update Post' : 'Create Post' }}
                    </button>
                </div>

            
            </form>

        </div>
</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.tags-selector').select2();
})
</script>

@endsection

@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />


@endsection

