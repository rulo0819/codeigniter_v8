<?= $this->extend('plantillas/panel_lt3') ?>

<?= $this->section('css') ?>
  <link rel="stylesheet" href="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/daterangepicker/daterangepicker.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<section class="content">
  <div class="container-fluid"></div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/moment/moment.min.js') ?>"></script>
  <script src="<?= base_url(RECURSOS_ADMIN_PLUGINS . '/daterangepicker/daterangepicker.js') ?>"></script>
<?= $this->endSection() ?>
