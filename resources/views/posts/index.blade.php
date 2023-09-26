<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
       
        <div class="header">
            
            <a href="./blog/serch" class="button">検索</a>
            
            <a href='/posts/create'>投稿する</a>
            
           <hi class="title">title</hi>
           
           <a href='/login' class="button">login</a>
           
           <a href='/register' class="button">新規登録</a>
           
           <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

           <a href='/profile/edit'>profile</a>
           
        </div>
        
        <div class="chat">
            
        </div>
        @foreach  ($posts as $post)
        <div class="posts">
            <h2 class='post'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
        </div>
        @endforeach
        
        <div class="ranking">
            
            <div class="goodranking">
                
            </div>
            
            <div class="serchranking">
                
            </div>
        </div>
        
        
        
        
        
        
    </body>