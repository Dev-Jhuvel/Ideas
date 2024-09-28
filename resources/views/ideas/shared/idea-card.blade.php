<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="object-fit:scale-down;width:60px;height:60px" class="me-3 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageURL() }}" alt="User">
                <div class="">
                    <h3 class="card-title mb-0 mr-10 "><a style="text-decoration: none;"
                            href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h3>
                </div>
                <div class="px-2">
                    @auth
                        @if (Auth::id() !== $idea->user->id)
                            @if (Auth::user()->follows($idea->user))
                                <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu" style="">
                                    <form id="post-form" action="{{ route('users.unfollow', $idea->user->id) }}"
                                        method="POST">
                                        @csrf
                                        <a onclick="document.getElementById('post-form').submit();" class="dropdown-item"
                                            href="#">Unfollow</a>
                                    </form>
                                </div>
                            @else
                                <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu" style="">
                                    <form id="post-form" action="{{ route('users.follow', $idea->user->id) }}"
                                        method="POST">
                                        @csrf
                                        <a onclick="document.getElementById('post-form').submit();" class="dropdown-item"
                                            href="#">Follow</a>
                                    </form>
                                </div>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('ideas.show', $idea->id) }}"
                    class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">View</a>
                @can('editAndDelete', $idea)
                    <a href="{{ route('ideas.edit', $idea->id) }}"
                        class="mx-2 link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Edit</a>
                    <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                        @csrf
                        @method('delete')
                        <button class="ms-1 btn btn-danger btn-sm">x</button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2"> {{ '* ' . $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-3 fw-light text-muted">
                {{ $idea->content }}
            </p>
            <hr>
        @endif
        <div class="d-flex justify-content-between">

            @include('ideas.shared.like-button')
            <div>
                <span class="fw-light nav-link fs-4 me-3"><span class="fas fa-comment me-1"></span>
                    {{ $idea->comments()->count() }}</span>

            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comments-box')
    </div>
</div>
