<!DOCTYPE html>
    
    <body>

        <?php foreach ($posts as $post) : ?>
        <article>
           <!-- <//?= $post; ?> niz-->  
           <h1>
                <a href="/posts/<?= $post->slug?>">
                    <?= $post->title; ?>
                </a>
            </h1>  
           <div>
                <?= $post->excerpt; ?>
           </div>
        </article>
        <?php endforeach; ?>
    </body>
 