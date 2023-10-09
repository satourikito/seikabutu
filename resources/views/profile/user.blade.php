<x-app-layout>


　　@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>フォロワー数: {{$user->followers()->count() }}</p>
        <p>フォロー数: {{ $user->followings()->count() }}</p>

        @if(Auth::check() && Auth::user()->id !== $user->id)
           <button class="followButton" data-user-id="{{ $user->id }}">
                {{ Auth::user()->isFollowing($user) ? 'アンフォロー' : 'フォロー' }} 
           </button> 
        @endif
    </div>
    
    

    
    
        <script>
             $(function(){
                 let followButton = $('.follow-button');
                 let userId;
                 followButton.on('click', function(){
                     let $this = $(this);
                     userId = $this.data('user-id');
                     $.ajax({
                         headers: {
                             'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                         },
                         url: '/follow', // フォローするためのルート
                         method: 'POST',
                         data: {
                             'user_id': userId
                         }
                     })
                     .done(function (data) {
                         $this.toggleClass('following'); // フォロー中のスタイルを切り替える
                         $this.html(data.buttonText); // フォローボタンのテキストを切り替える
                     })
                     .fail(function(){
                         console.log('フォローに失敗しました');
                     });
                 });
             });
             

        </script>

</x-app-layout>
    
