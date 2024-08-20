<div class="container mt-4 p-0">
    @foreach ($comments as $comment)
        @if (!$comment->parent_id)
            <div class="d-flex py-2">
                <div class="mx-2 avatar rounded-circle border d-flex justify-content-center align-items-center mr-2">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div>
                    <span class="font-weight-bold">{{ $comment->user->name }}</span>
                    <span class="time">{{ $comment->created_at->format('H:i M, d Y') }}</span>
                    <p class="mb-1 px-3">{{ $comment->content }}</p>
                    <div class="d-flex align-items-center">
                        <span class="toggle-replies text-secondary" style="cursor: pointer;" data-bs-toggle="collapse"
                            data-bs-target="#xem{{ $comment->id }}" aria-expanded="false"
                            aria-controls="xem{{ $comment->id }}">Xem thêm</span>
                        <span class="text-secondary mx-2" style="cursor: pointer" data-bs-toggle="collapse"
                            data-bs-target="#reply{{ $comment->id }}" aria-expanded="false"
                            aria-controls="reply{{ $comment->id }}">Phản hồi</span>

                        {{-- Display edit and delete buttons --}}
                        @if (auth()->check() && auth()->id() === $comment->user_id)
                            <form class="m-0" action="{{ route('client.comments.destroy', $comment->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa comment này không?')">Xóa</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="collapse reply-box" id="reply{{ $comment->id }}">
                <div class="d-flex mt-2">
                    <div
                        class="mx-2 avatar rounded-circle border d-flex justify-content-center align-items-center mr-2">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="flex-grow-1">
                        <form action="{{ route('client.comments.reply', $comment->id) }}" method="POST">
                            @csrf
                            <textarea name="content" class="form-control" rows="2" placeholder="Viết phản hồi..."></textarea>
                            <button type="submit" class="btn btn-dark btn-sm mt-2">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Display replies --}}
            <div class="replies collapse" id="xem{{ $comment->id }}">
                @foreach ($comment->replies as $reply)
                    @if ($reply->status === 1)
                        <div class="d-flex py-2 ms-5">
                            <div
                                class="mx-2 avatar rounded-circle border d-flex justify-content-center align-items-center mr-2">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div>
                                <span class="font-weight-bold">{{ $reply->user->name }}</span>
                                <span class="time">{{ $reply->created_at->format('H:i M, d Y') }}</span>
                                <p class="mb-1 px-3">{{ $reply->content }}</p>
                                <div class="d-flex align-items-center">
                                    <span class="toggle-replies text-secondary" style="cursor: pointer;"
                                        data-bs-toggle="collapse" data-bs-target="#replies{{ $comment->id }}"
                                        aria-expanded="false" aria-controls="replies{{ $comment->id }}">Xem
                                        thêm</span>
                                    <span class="text-secondary mx-2" style="cursor: pointer" data-bs-toggle="collapse"
                                        data-bs-target="#replies{{ $reply->id }}" aria-expanded="false"
                                        aria-controls="replies{{ $reply->id }}">Phản hồi</span>
                                    {{-- Display edit and delete buttons --}}
                                    @if (auth()->check() && auth()->id() === $reply->user_id)
                                        <form class="m-0"
                                            action="{{ route('client.comments.destroy', $reply->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa comment này không?')">Xóa</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="collapse reply-box" id="replies{{ $reply->id }}">
                        <div class="d-flex mt-2">
                            <div
                                class="mx-2 avatar rounded-circle border d-flex justify-content-center align-items-center mr-2">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="flex-grow-1">
                                <form action="{{ route('client.comments.reply', $reply->id) }}" method="POST">
                                    @csrf
                                    <textarea name="content" class="form-control" rows="2" placeholder="Viết phản hồi..."></textarea>
                                    <button type="submit" class="btn btn-dark btn-sm mt-2">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach ($reply->replies as $subreply)
                        @if ($subreply->status === 1 && $reply->status === 1)
                            <div class="d-flex py-2 ms-5 ps-5">
                                <div
                                    class="mx-2 avatar rounded-circle border d-flex justify-content-center align-items-center mr-2">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div>
                                    <span class="font-weight-bold">{{ $subreply->user->name }}</span>
                                    <span class="time">{{ $subreply->created_at->format('H:i M, d Y') }}</span>
                                    <p class="mb-1 px-3">{{ $subreply->content }}</p>
                                    <div class="d-flex align-items-center">
                                        @if (auth()->check() && auth()->id() === $subreply->user_id)
                                            <form class="m-0"
                                                action="{{ route('client.comments.destroy', $subreply->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa comment này không?')">Xóa</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        @endif
    @endforeach
</div>
