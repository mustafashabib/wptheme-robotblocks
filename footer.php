 <?php 
 $analytics_id = get_option('robotblocks_theme_options')['analytics_id'];
 $twitter_id = get_option('robotblocks_theme_options')['twitter_id'];
 ?>
     <footer>
          <?php if (is_active_sidebar('primary') ) { ?>
            <div id="sidebar-primary" class="sidebar">
             <?php dynamic_sidebar('primary');?>
          </div>
          <?php } ?>
          <?php if(!is_null($twitter_id)){ ?>
           <ul>
            <li>Contact me <a href="https://twitter.com/<?php echo $twitter_id;?>" title="@<?php echo $twitter_id;?>">@<?php echo $twitter_id;?></a></li>
          </ul>
        <?php } ?>
      </footer>
  </div>

<?php if(!is_null($analytics_id)){
  render_google_analytics($analytics_id);
} ?>
<?php wp_footer(); ?>
</body>
</html>