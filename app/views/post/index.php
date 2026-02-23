<?php $this->getHeader(); ?>
<?php //$this->extend(); ?>
<h1><?php echo $title; ?></h1>
<?php if($posts): ?>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="<?php echo url_to("/post/show", $post->id); ?>"><?php echo $post->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php $this->getFooter(); ?>