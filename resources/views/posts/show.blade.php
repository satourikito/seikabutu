<x-app-layout>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>  
                
            </div>
            <div class="mt-10">
               
                @auth
                    @if($post->is_liked_by_auth_user())
                        <p class="text-4xl like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></p>
                        <span class="like-counter">{{ $post->likes->count() }}</span>
                    @else
                        <p class="text-4xl like-toggle fas fa-heart" data-id="{{ $post->id }}"></p>
                        <span class="text-4xl like-counter">{{ $post->likes->count() }}</span>
                    @endif
                @endauth
                @guest
                    @if($post->is_liked_by_auth_user())
                        <a class="w-11 block"href="/login"><i class="w-full block like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i></a>
                        <span class="like-counter">{{ $post->likes->count() }}</span>
                    @else
                        <a class="w-11"href="/login"><i class="w-full like-toggle fas fa-heart" data-id="{{ $post->id }}"></i></a>
                        <span class="like-counter">{{ $post->likes->count() }}</span>
                    @endif
                @endguest
            </div>
        </div>
        
        <div class="post.comments">
            <!-- コメント一覧を表示 -->
            <div id="comment-post-{{ $post->id }}">
                @include('posts.comments')
            </div>
            <!-- 記事の詳細情報と投稿時刻を表示 -->
            <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
            <hr>
            <!-- コメント投稿フォーム -->
            <div class="row actions" id="comment-form-post-{{ $post->id }}">
                <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post">
                    <input name="utf8" type="hidden" value="&#x2713;" />
                    {{csrf_field()}}
                    <input value="{{ $post->id }}" type="hidden" name="post_id" />
                    <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                    <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                </form>
            </div>
        </div>
        
       
        


        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
              $(function(){
                    let like = $('.like-toggle');
                    let likePostId;
                    like.on('click',function(){
                        let $this = $(this);
                        likePostId = $this.data('id');
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                            },
                            url:'/like',
                            method: 'POST',
                            data: {
                                'post_id':likePostId
                            }
                    })
                        
                        .done(function (data) {
                            $this.toggleClass('liked');
                            $this.next('.like-counter').html(data.likes_count);
                        })
                        .fail(function(){
                            console.log('failaaaaaaa');
                        });
                    });
                });
        </script>
</x-app-layout>