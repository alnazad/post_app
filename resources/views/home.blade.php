@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/post" class="btn btn-primary">Add Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>User Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{$post->user->name}}</td>
                            <td>
                                <a href="{{ route('home.show',$post->slug) }}"
                                   class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Read Post</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div> -->
            <div class="col-md-8" >
                @foreach($posts as $post)
                <div style="border:1px solid black">
                    <h3>{{$post->user->name}}</h3>
                    <p>{{ $post->title }}</p>
                    <!-- Comments Section -->
                    <div class="comments">
                        @foreach($post->comments as $comment)  <!-- Assuming you have a `comments` relationship on Post -->
                            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p> <!-- Adjust accordingly to how your comments are structured -->
                        @endforeach
                    </div>
                    <!-- Add a new comment form -->
                    <form action="{{ route('post.comment', $post->id) }}" method="POST">
                        @csrf
                        <textarea name="comment" placeholder="Add a comment..."></textarea>
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
