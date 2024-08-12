<div class="documentos">
  <ul>
    <?php foreach( $events as $row ) { ?>
    <?php /* var_dump($row->mec_date);*/ ?>
    <li class="docenlace">
      <a href="<?= get_permalink( $row->ID ) ?>" target="_blank">
        <button class="button button1">
          <span class="et-pb-icon" style="font-size: 16px; padding: 0 10px 0 0">&#xe023;</span> 
          <?= $row->post_title ?><br />
          <span class="" style="font-size: 12px;padding: 5px 0px 0 0;"><?= $row->mec_start_date ?>
        </button>
      </a>
    </li>
    <?php } ?>
  </ul>
</div>
