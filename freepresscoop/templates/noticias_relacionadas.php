<div class="documentos">
  <ul>
  <?php foreach( $post as $row ) { ?>
  <?php /*var_dump($post);*/ ?>
    <li class="docenlace">
      <a href="<?= get_permalink( $row->ID ) ?>" target="_blank">
        <button class="button button1">
          <span class="et-pb-icon" style="font-size: 16px; padding: 0px 15px 0 0">&#x69;</span>
          <?= $row->post_title ?>
        </button>
      </a>
    </li>
  <?php } ?>
  </ul>
</div>
