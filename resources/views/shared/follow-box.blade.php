<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Who to follow</h5>
    </div>
    <div class="card-body">
        @forelse ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }} "><img class="avatar-img rounded-circle" width="50px"
                            height="50px" src="{{ $user->getImageURL() }}" alt="{{ $user->email }}"></a>
                </div>
                <div class="overflow-hidden">
                    <a style="text-decoration: none" class="h6 mb-0"
                        href="{{ route('users.show', $user->id) }} ">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>
                <div>
                    @auth
                        @if (Auth::user()->isNot($user))
                            <div class="mt-3">
                                @if (Auth::user()->follows($user))
                                    <form action="{{ route('users.unfollow', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light btn-sm"> Unfollow </button>
                                    </form>
                                @else
                                    <form action="{{ route('users.follow', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light btn-sm"> Follow </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endauth
                    @guest
                        <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                class="fa-solid fa-plus">
                            </i></a>
                    @endguest
                </div>

            </div>
        @empty
            <p class="text-center my-4">No Results Found.</p>
        @endforelse


        <div class="d-grid mt-3">
            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
        </div>
    </div>
</div>
