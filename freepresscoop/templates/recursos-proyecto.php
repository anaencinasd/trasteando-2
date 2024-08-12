<div class="documentos">
  <ul>
  <?php foreach( $recursos as $recurso ) { ?>
  <?php //var_dump($recurso) ?>
    <li class="docenlace">
      <a href="<?= $recurso['archivo_proy']  ?>" target="_blank">
        <button class="button button1">
          <span class="et-pb-icon" style="font-size: 16px; padding: 0px 15px 0 0">&#xe004;</span>
          
          <?= $recurso['nombre_de_archivo']  ?>
        </button>
      </a>
    </li>
  <?php } ?>
  </ul>
</div>
