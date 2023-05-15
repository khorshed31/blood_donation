@foreach ($posts as $post)
                <div class="card {{ $post->is_managed == 1 ? 'donate_color' : '' }}">
                <div class="card-body pb-1">
                    <div class="d-flex">
                        @php
                            $avatar = new \Laravolt\Avatar\Avatar();
                            $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                            $image = $avatar->create(optional($post->created_user)->name)->setBackground($randomColor)->toBase64();
                        @endphp
                        <img class="me-2 rounded" src="{{ isset(optional($post->created_user)->image) ? asset(optional($post->created_user)->image) : $image }}" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            @if (auth()->user()->id == $post->created_by)
                                <div class="dropdown float-end text-muted">
                                <a href="#" class="dropdown-toggle arrow-none card-drop"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="dropdown-item">Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" onclick="delete_item(`{{ route('admin.posts.destroy', $post->id) }}`)" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                            @endif
                            
                            <h5 class="m-0"><a href="{{ auth()->user()->id != $post->created_by ? route('admin.chats.show',optional($post->created_user)->id) : 'javascript: void(0);' }}">{{ optional($post->created_user)->name }}</a></h5>
                            <p class="text-muted"><small>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} <span class="mx-1">⚬</span> <strong>{{ optional($post->created_user)->blood_group }}</strong></small></p>
                        </div>
                    </div>

                    <hr class="m-0" />

                    <div class="font-16 text-dark my-3">
                        <table>
                            <tr>
                                <td>Required Blood Group </td>
                                <td>: <b class="text-danger">{{ $post->blood_group }}</b></td>
                            </tr>
                            <tr>
                                <td>Date </td>
                                <td>: <b>{{ Carbon\Carbon::parse($post->date)->format('d M Y') }}, {{ Carbon\Carbon::parse($post->date)->format('l') }}</b></td>
                            </tr>
                            <tr>
                                <td>Time </td>
                                <td>: <b>{{ $post->time }}</b></td>
                            </tr>
                            <tr>
                                <td>Place </td>
                                <td>: <b>{{ $post->place }}</b></td>
                            </tr>
                            <tr>
                                <td>Amount of Blood </td>
                                <td>: <b>{{ $post->amount_of_blood }}</b></td>
                            </tr>
                            <tr>
                                <td>Phone Number </td>
                                <td>: <b>{{ $post->phone }}</b></td>
                            </tr>
                            <tr>
                                <td>Reason </td>
                                <td>: <b>{{ $post->reason }}</b></td>
                            </tr>
                        </table>
                        
                    </div>

                    <hr class="m-0" />

                    <div class="my-1">
                        @if(count($post->like_posts) == 0 || count(auth()->user()->like_posts ?? []) == 0)
                            <a href="javascript: void(0);" onclick="addToLike(this,{{ $post->id }})" class="btn btn-sm btn-link text-muted ps-0">
                                <i class="uil uil-heart me-1"></i> {{ count($post->like_posts) }} Likes
                            </a>
                        @else
                            <a href="javascript: void(0);" onclick="deleteLike(this,{{ $post->id }})" class="btn btn-sm btn-link text-muted ps-0">
                                <i class='mdi mdi-heart text-danger'></i> {{ count($post->like_posts) }} Likes
                            </a>
                        @endif
                        <a href="javascript: void(0);" onclick="comment({{ $post->id }})" class="btn btn-sm btn-link text-muted"><i class='uil uil-comments-alt'></i> {{ $post->comments->count() }} Comments</a>
                        @if (auth()->user()->id == $post->created_by)
                            <a href="{{ route('admin.is.managed') }}?is_managed=1&post_id={{ $post->id }}" class="btn btn-sm btn-link {{ $post->is_managed == 0 ? 'text-muted' : '' }}">
                                <i class='{{ $post->is_managed == 1 ? 'ri ri-check-double-line' : '' }}'></i> Managed</a>
                        @else
                            <a href="javascript: void(0);" class="btn btn-sm btn-link {{ $post->is_managed == 0 ? 'text-muted' : '' }}">
                                <i class='{{ $post->is_managed == 1 ? 'ri ri-check-double-line' : '' }}'></i> Managed</a>
                        @endif
                    </div>

                    <hr class="m-0"/>

                        @php
                            $avatar = new \Laravolt\Avatar\Avatar();
                            $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                            $image_user = $avatar->create(optional(auth()->user())->name)->setBackground($randomColor)->toBase64();
                        @endphp

                    <div class="mt-3" id="comment{{ $post->id }}" style="display: none">
                        @foreach ($post->comments as $comment)
                        @php
                            $image_user_comment = $avatar->create(optional($comment->created_user)->name)->setBackground($randomColor)->toBase64();
                        @endphp
                            <div class="d-flex">
                            <img class="me-2 rounded" src="{{ $image_user_comment }}" alt="Generic placeholder image" height="32">
                            <div>
                                <h5 class="m-0">{{ optional($comment->created_user)->name }} </h5>
                                <p class="text-muted mb-0"><small>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small></p>

                                <p class="my-1">{!! $comment->comment !!}</p>
                            </div> <!-- end div -->
                        </div> <!-- end d-flex-->
                        @endforeach
                        <hr/>

                        <div class="d-flex mb-2">
                            <img src="{{ $image_user }}" height="32" class="align-self-start rounded me-2" />
                            <div class="w-100">
                                <form action="{{ route('admin.comments.save') }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="comment" class="form-control border-0 form-control-sm" placeholder="Write a comment">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button class="btn btn-primary" type="submit"><i class="ri ri-send-plane-fill"></i></button>
                                    </div>
                                </form>
                                
                            </div> <!-- end w-100 -->
                        </div> <!-- end d-flex -->

                    </div>                    

                </div> <!-- end card-body -->
            </div> <!-- end card -->
                
@endforeach