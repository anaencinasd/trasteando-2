<div class="documentos">
  <ul>
  <?php foreach( $documentos as $documento ) { ?>
  <?php //var_dump($recurso) ?>
    <li class="docenlace">
      <a href="<?= $documento['archivo_']  ?>" target="_blank">
        <button class="button button1">
          <span class="et-pb-icon" style="font-size: 16px; padding: 0px 15px 0 0">&#xe004;</span>
          
          <?= $documento ['nombre_del_documento']  ?>
        </button>
      </a>
    </li>
  <?php } ?>
  </ul>
</div>
