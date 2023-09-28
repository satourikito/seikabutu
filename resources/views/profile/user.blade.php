<x-app-layout>
    {{$user->name}}
    
    <button class="follow-button" data-user-id="{{ $user->id }}">
        {{ $user->isFollowing ? 'フォロー中' : 'フォロー' }}
    </button>
    
    

    
    
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