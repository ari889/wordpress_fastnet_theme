<?php

  wp_list_comments([
    'callback' => 'fastnet_comment_template'
  ]);

  ?>
  <div class="comment-pagination">
    <?php paginate_comments_links([
      'prev_text' => '<i class="ti-angle-left"></i>',
      'next_text' => '<i class="ti-angle-right"></i>',
      'type' => 'list'
    ]); ?>
  </div>
  <?php

  echo '<div class="comment-form">';
  comment_form();
  echo '</div>';


 ?>
