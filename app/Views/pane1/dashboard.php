
<!-- importar plantilla -->
<?= $this->extend('plantillas/panel_lt3') ?>
<!-- CSS-->
<?= $this->section('css') ?>
  <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/daterangepicker/daterangepicker.css') ?>">
<?= $this->endSection() ?>
  <!-- CSS -->

<!-- contenido -->
<?= $this->section('contenido') ?>
<h4>
    render
</h4>
<?= $this->endSection() ?>
<!-- contenido -->


<!-- JS -->

<?= $this->section('js') ?>
  <script src="<?= base_url(RECURSOS_ADMIN_JS . '/moment/moment.min.js') ?>"></script>
  <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/daterangepicker/daterangepicker.js') ?>"></script>
<?= $this->endSection() ?>
<!-- JS -->