<?php $this->getHeader(); ?>
<?php //$this->extend(); ?>
<h1><?php echo $title; ?></h1>
<p>
    <?php echo $post->content; ?>
</p>
<a href="<?php echo url_to("/post"); ?>">Back to posts</a>
<?php $this->getFooter(); ?>