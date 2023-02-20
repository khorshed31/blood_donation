@foreach ($posts as $post)
                <div class="card">
                <div class="card-body pb-1">
                    <div class="d-flex">
                        @php
                            $avatar = new \Laravolt\Avatar\Avatar();
                            $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                            $image = $avatar->create(optional($post->created_user)->name)->setBackground($randomColor)->toBase64();
                        @endphp
                        <img class="me-2 rounded" src="{{ $image }}" alt="Generic placeholder image" height="32">
                        <div class="w-100">
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
                            <h5 class="m-0">{{ optional($post->created_user)->name }}</h5>
                            <p class="text-muted"><small>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} <span class="mx-1">⚬</span> <strong>{{ $post->blood_group }}</strong></small></p>
                        </div>
                    </div>

                    <hr class="m-0" />

                    <div class="font-16 text-center text-dark my-3">
                        {!! $post->description !!}
                    </div>

                    <hr class="m-0" />

                    <div class="my-1">
                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted ps-0"><i class='mdi mdi-heart text-danger'></i> 2k Likes</a>
                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class='uil uil-comments-alt'></i> 200 Comments</a>
                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class='uil uil-share-alt'></i> Share</a>
                    </div>

                    <hr class="m-0" />

                </div> <!-- end card-body -->
            </div> <!-- end card -->
                
@endforeach