<style>
  body {
    min-height: 100vh;
    min-height: -webkit-fill-available;
  }

  html {
    height: -webkit-fill-available;
  }

  main {
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
  }

  .b-example-divider {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .bi {
    vertical-align: -.125em;
    pointer-events: none;
    fill: currentColor;
  }

  .dropdown-toggle {
    outline: 0;
  }

  .nav-flush .nav-link {
    border-radius: 0;
  }

  .btn-toggle {
    display: inline-flex;
    align-items: center;
    padding: .25rem .5rem;
    font-weight: 600;
    color: rgba(255, 255, 255);
    background-color: transparent;
    border: 0;
  }

  .btn-toggle:hover,
  .btn-toggle:focus {
    background-color: rgb(94, 171, 193);
  }

  .btn-toggle::before {
    width: 1.25em;
    line-height: 0;
    content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
    transition: transform .35s ease;
    transform-origin: .5em 50%;
  }

  .btn-toggle[aria-expanded="true"] {
    color: rgba(255, 255, 255);
  }

  .btn-toggle[aria-expanded="true"]::before {
    transform: rotate(90deg);
  }

  .btn-toggle-nav a {
    display: inline-flex;
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
    text-decoration: none;
  }

  .btn-toggle-nav a:hover,
  .btn-toggle-nav a:focus {
    background-color: #d2f4ea;
  }

  .scrollarea {
    overflow-y: auto;
  }

  .btn-menu {
    color: white;
    transition: 0.5s;
    background-color: rgb(94, 171, 193);
  }

  .btn-menu:hover {
    color: white;
    background-color: rgb(116, 183, 202);
    transition: 0.5s;
  }

  .fw-semibold {
    font-weight: 600;
  }

  .lh-tight {
    line-height: 1.25;
  }

  .bg-blue {
    background: rgb(116, 183, 202);
  }
</style>
<script>
  /* global bootstrap: false */
  (function() {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()
</script>
<div class="bg-blue col-12" style="min-height: 800px;">
  <a href="./" class="d-flex align-items-center link-light text-decoration-none">
    <img src="<?php echo base_url("/image/logo.png"); ?>" class="col-12 mt-3" alt="" srcset="">
  </a>
  <ul class="nav nav-pills flex-column mb-auto mt-5">
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>index.php/Pages" class="nav-link btn-menu py-3" aria-current="page">
        <span class="material-icons-outlined offset-1" style="font-size:15px;font-weight:100">
          dashboard
        </span>
        <span style="font-size: 20px;">
          Menu
        </span>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>index.php/Pages/transaksi" class="nav-link btn-menu py-3" aria-current="page">
        <span class="material-icons-outlined offset-1" style="font-size:15px;font-weight:100">
          compare_arrows 
        </span>
        <span style="font-size: 20px;">
          Transaction
        </span>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>index.php/Pages/report" class="nav-link btn-menu py-3" aria-current="page">
        <span class="material-icons-outlined offset-1" style="font-size:15px;font-weight:100">
          assignment
        </span>
        <span style="font-size: 20px;">
          Report
        </span>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('./index.php/pages/logout'); ?>" class="nav-link btn-menu py-3" aria-current="page">
        <span class="material-icons-outlined offset-1" style="font-size:15px;font-weight:100">
          logout
        </span>
        <span style="font-size: 20px;">
          Logout
        </span>
      </a>
    </li>
  </ul>

</div>