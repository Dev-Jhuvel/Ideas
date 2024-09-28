<div>
    @auth
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST"">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ '* ' . $message }} </span>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    @endauth
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img width="35px" height="35px" class="me-3 avatar-sm rounded-circle"
                src="{{ $comment->user->getImageURL() }}" alt="User">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h5 class=""><a style="text-decoration: none;"
                            href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </h5>
                    <small class="fs-6 fw-light text-muted"><span class="fas fa-clock"></span>
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>

            </div>
        </div>
        <hr>
    @empty
        <p class="text-center my-4">Be the first to Comment.</p>
    @endforelse
</div>
