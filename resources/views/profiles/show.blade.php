@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            @if (Auth::user() && Auth::user()->id == $profile->user->id && Auth::user()->email_verified_at == null)
              <div class="alert alert-warning" role="alert">
                <div class="d-flex justify-content-between">
                  <span>
                    Please verify email 
                    <form method="post" action="/email/verification-notification">
                      @csrf
                      <button type="submit" class="btn btn-link alert-link p-0 m-0">Resend email</button>
                    </form>
                  </span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            @endif
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-sm-3 d-flex justify-content-between align-items-center">
                <img src="{{ asset('images') }}/{{ $profile->file_path }}" class="rounded w-25 img-thumbnail" alt="profile-image">
                @if (Auth::user() && Auth::user()->id == $profile->user->id)
                  <div>
                    <form action="/profile/{{ Auth::user()->id }}/upload-profile-image" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <input type="file" name="image" class="form-control">
                        <button type="submit" class="btn btn-sm btn-success">Upload</button>
                      </div>
                    </form>
                  </div>
                @endif
               
                <div>
                  <h5>{{ $profile->user->name }}</h5>
                  <p class="text-muted mb-0">{{ $profile->user->email }}</p>
  
                  @if ($profile->user->email_verified_at)
                    <i class="bi bi-patch-check-fill mr-1"></i><span>Email verified</span>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 text-right">
                @if (Auth::user() && Auth::user()->id != $profile->user->id)
                    @if (Auth::user()->does_follow($profile->user->id))
                      <form action="/profile/{{ $profile->user->id }}/removefriend" method="post">
                        @csrf  
                        <button class="btn btn-danger btn-sm" type="submit">Unfollow</button>
                      </form>
                      
                    @else
                      <form action="/profile/{{ $profile->user->id }}/addfriend" method="post">
                        @csrf  
                        <button class="btn btn-primary btn-sm" type="submit">Follow</button>
                      </form>
                      
                    @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-sm-12">
        <h5>Following</h5>
        <div class="row ">
          @forelse ($profile->user->friends as $friend)
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-sm-8">
                      <a href="{{ $friend->id }}" class="card-title">{{ $friend->name }}</a>
                      <p class="text-muted mb-0">{{ $friend->email }}</p>
                    </div>
                    
                    @if (Auth::user() && Auth::user()->id == $profile->user->id)
                      <div class="col-sm-4 text-right">
                        <form action="/profile/{{ $friend->id }}/removefriend" method="post">
                          @csrf
                          <button class="btn btn-danger btn-sm" type="submit">Unfollow</button>
                        </form>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-sm-4">
              <h5><span class="badge badge-danger">Not following anyone</span></h5>
            </div> 
          @endforelse
        </div>
      </div>
    </div>


    <div class="row mt-4">
      <div class="col-sm-12">
        <h5>Posts</h5>
        <div data-masonry='{"percentPosition": true }' class="row">
          @forelse ($posts as $post)
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <span>By: <a class="card-subtitle mb-2 text-muted" href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></span>
                  <p class="card-text">{{ \Illuminate\Support\Str::limit($post->body, 150, $end='...') }}</p>

                  <div>
                    <h5><a href="/categories/{{ $post->category->id }}" class="badge badge-light">{{ $post->category->category_name}}</a></h5>
                  </div>

                  <div class="d-flex justify-content-between">
                    <a href="/posts/{{ $post->id }}" class="card-link">View post</a>

                    @if (Auth::user() && Auth::user()->id == $post->user_id)
                    <form method="post" action="/posts/{{ $post->id }}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger">Delete</button>
                    </form>

                    @endif
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-sm-4">
              <h5><span class="badge badge-danger">Not posts to show</span></h5>
            </div> 
          @endforelse
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-12">
        <h5>Saved for later</h5>
        <div data-masonry='{"percentPosition": true }' class="row">
          @forelse ($savedPosts as $savedPost)
            <div class="col-sm-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ $savedPost->post->title }}</h5>
                  <span>By: <a class="card-subtitle mb-2 text-muted" href="/profile/{{ $savedPost->post->user->id }}">{{ $savedPost->post->user->name }}</a></span>
                  <p class="card-text">{{ \Illuminate\Support\Str::limit($savedPost->post->body, 150, $end='...') }}</p>

                  <div>
                    <a href="/categories/{{ $savedPost->post->category->id }}" class="badge badge-warning">{{ $savedPost->post->category->category_name}}</a>
                  </div>

                  <div class="d-flex justify-content-between">
                    <a href="/posts/{{ $savedPost->post->id }}" class="card-link">View post</a>
                  
                    <div class="btn-group">
                      @if (Auth::user() && Auth::user()->id == $savedPost->user->id)
                        <form method="POST" action="/profile/{{ Auth::user()->id }}/savedposts/{{ $savedPost->post->id }}" >
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-light">Remove from saved</button>
                        </form>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-sm-4 mb-4">
              <h5><span class="badge badge-danger">Not posts saved for later</span></h5>
            </div> 
          @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection
