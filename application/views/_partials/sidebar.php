<!-- Sidebar -->
<ul class="sidebar navbar-nav toggled">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url() ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <?php if($iskey): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url() ?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Users Management</span>
        </a>
      </li>
      <?php endif; ?>

    </ul>