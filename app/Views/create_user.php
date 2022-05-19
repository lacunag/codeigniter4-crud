<h1 class="display-6 mb-4">Nuevo Usuario</h1>

<?php $validation = \Config\Services::validation(); ?>

<div class="shadow p-3 mb-5 rounded">
  <?= form_open('user/create') ?>
  
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" name="name">
    <?php if ($validation->getError('name')) { ?>
      <p class="text-danger"><?= $error = $validation->getError('name'); ?></p>
    <?php } ?>
  </div>

  <div class="form-group">
    <label for="inputLast_name">Last Name</label>
    <input type="text" class="form-control" name="last_name">
    <?php if ($validation->getError('last_name')) { ?>
      <p class="text-danger"><?= $error = $validation->getError('last_name'); ?></p>
    <?php } ?>
  </div>

  <div class="form-group">
    <label for="inputMail">Mail</label>
    <input type="email" class="form-control" name="mail">
    <?php if ($validation->getError('mail')) { ?>
      <p class="text-danger"><?= $error = $validation->getError('mail'); ?></p>
    <?php } ?>
  </div>

  <div class="form-group">
    <label for="inputPhone">Phone</label>
    <input type="text" class="form-control" name="phone">
    <?php if ($validation->getError('phone')) { ?>
      <p class="text-danger"><?= $error = $validation->getError('phone'); ?></p>
    <?php } ?>
  </div>

  <div class="my-3">
    <button type="submit" class="btn btn-primary">Agregar</button>
    <a class="btn btn-secondary" href="<?php echo base_url('user'); ?>" role="button">Cancelar</a>
  </div>

  </form>
</div>