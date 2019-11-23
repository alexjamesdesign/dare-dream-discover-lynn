<div class="destinations">

<p class="title">My Adventures</p>


<?php $terms = get_terms( 'destination-categories', array(
    'hide_empty' => true,
)
);
?>

<?php foreach( $terms as $term ) : ?>
    <div class="destination">
        <a href="<?php echo $term->slug;?>"><?php echo $term->name;?></a>
    </div>
<?php endforeach; ?>

</div>