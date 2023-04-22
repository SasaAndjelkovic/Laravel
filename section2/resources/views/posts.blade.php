<!DOCTYPE html>
    
    <body>

        <!-- <//?php foreach ($posts as $post) : ?> -->
        @foreach ($posts as $post)
            <!-- @dd($loop) -->
        <article class="{{ $loop->even ? 'foobar' : '' }}">
           <h1>
                <a href="/posts/{{ $post->slug }}">
                <!-- <a href="/posts/<//?= $post->slug?>"> -->
                    <!-- <//?= $post->title; ?> -->
                    <!-- <//bn?php echo $post->title; ?> -->
                    {{ $post->title }}
                </a>
            </h1>  
           <div>
                <!-- <//?= $post->excerpt; ?> -->
                {{ $post->excerpt}}
           </div>
        </article>
        <!-- <//?php endforeach; ?> -->
        @endforeach
    </body>
 