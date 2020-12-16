<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">


      <!-- query navbar -->
      <?php

      $queryNav = " SELECT * FROM `subnavigasi` WHERE `is_active` = 1 order by `urutan` asc ";
      $nav = $this->db->query($queryNav)->result_array();

      ?>

      <?php foreach ($nav as $n) : ?>

        <?php if ($title == $n['title']) : ?>

          <li class="nav-item active">
          <?php else : ?>
          <li class="nav-item">
          <?php endif; ?>

          <!-- Nav Item - Dashboard -->
          <a class="nav-link" href="<?= base_url($n['url']) ?>">
            <i class="<?= $n['icon'] ?>"></i>
            <span><?= $n['title'] ?></span></a>
          </li>

        <?php endforeach; ?>

    </ul>
  </div>
</nav>