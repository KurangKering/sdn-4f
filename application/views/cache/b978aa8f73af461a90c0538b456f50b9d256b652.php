<!DOCTYPE html>
<html lang="en">
<head>
  <title>SDN 167 PKU</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta itemprop="image" content="<?php echo e(site_url('assets/template/frontend/media_library/images/logo.png')); ?>" />
  
  <link rel="icon" href="<?php echo e(site_url('assets/template/frontend/media_library/images/favicon.png')); ?>">
  
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/bootstrap-4/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/toastr/toastr.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/datetimepicker/datetimepicker.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/jquery.smartmenus/jquery.smartmenus.bootstrap-4.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/jquery.smartmenus/sm-core.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/jquery.smartmenus/sm-clean.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/assets/plugins/magnific-popup/magnific-popup.css')); ?>" rel="stylesheet" type="text/css" />

  <?php echo $__env->yieldContent('css-link'); ?>

  <link href="<?php echo e(site_url('assets/template/frontend/assets/css/loading.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(site_url('assets/template/frontend/views/themes/green_land/style.css')); ?>" rel="stylesheet" type="text/css" />

  <style>
    .video-js {
      position: relative !important;
      width: 100% !important;
      height: auto !important;
    }
    vjs-poster {
      position: absolute !important;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
    }
  </style>
  <script type="text/javascript">
    const _BASE_URL = "<?php echo e(site_url()); ?>";
    const _CURRENT_URL = "<?php echo e(current_url()); ?>";
  </script>
  <script src="<?php echo e(site_url('assets/template/frontend/assets/js/frontend.min.js')); ?>"></script>
  
</head>
<body>
  <header>
    <div class="container top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="top-header">
              <img src="<?php echo e(site_url('assets/template/frontend/media_library/images/logo.png')); ?>" width="70" height="70" class="mt-2 mr-4 mb-3">
              <ul class="list-unstyled top-left">
                <li><h5 class="font-weight-bold brand"><?php echo e($pengaturan['nama_sekolah'] ?? ""); ?></h5>
                </li>
                <li><small><?php echo e(ucwords($pengaturan['motto']) ?? ""); ?></small>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12">
            <ul class="list-inline float-right top-right">
              <li class="list-inline-item pl-3 pr-0"><i class="fa fa-envelope"></i> </i> <?php echo e($pengaturan['email'] ?? ''); ?>

              </li>
              <li class="list-inline-item pl-3 pr-0"><i class="fa fa-phone"></i> <?php echo e($pengaturan['telepon' ?? '']); ?>

              </li>
              
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--  NAVIGATION MENU -->
    <div class="container menu-bar mb-3" data-toggle="sticky-menu">
      <div class="container p-0">
        <nav class="navbar navbar-expand-lg p-0">
          <a class="navbar-brand" href="#">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-align-justify text-white"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul id="main-menu" class="sm sm-clean">
              <li>
                <a href="<?php echo e(site_url('/')); ?>"><i class="fa fa-home"></i>
                </a>
              </li>
              

              <li>
                <a href="#" target="_self">TENTANG SEKOLAH
                </a>
                <ul>
                  <li>
                    <a href="<?php echo e(site_url('pages/profil')); ?>" target="_self">PROFIL SEKOLAH
                    </a>
                  </li><li>
                    <a href="<?php echo e(site_url('pages/visi-misi')); ?>" target="_self">VISI MISI
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('pages/struktur-organisasi')); ?>" target="_self">Struktur Organisasi
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('pages/guru-pegawai')); ?>" target="_self">Data Guru Dan Pegawai
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('pages/sambutan')); ?>" target="_self">Sambutan Kepala Sekolah
                    </a>
                  </li>
                </ul>
              </li>
              
              <li>
                <a href="#" target="_self">INFORMASI
                </a>
                <ul>
                  <li>
                    <a href="<?php echo e(site_url('berita/page/1')); ?>" target="_self">BERITA
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('#')); ?>" target="_self">AGENDA
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" target="_self">FASILITAS
                </a>
                <ul>
                  <li>
                    <a href="<?php echo e(site_url('fasilitas/ruangan')); ?>" target="_self">RUANGAN
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('fasilitas/elektronik')); ?>" target="_self">ELEKTRONIK
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('fasilitas/moubiler')); ?>" target="_self">MOUBILER
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('fasilitas/inventaris')); ?>" target="_self">NVENTARIS
                    </a>
                  </li>

                </ul>
              </li>
              <li>
                <a href="<?php echo e(site_url('pages/prestasi')); ?>" target="_self">PRESTASI</a>
              </li>
              <li>
                <a href="<?php echo e(site_url('pages/ekstrakulikuler')); ?>" target="_self">EKSTRAKULIKULER</a>
              </li>
              <li>
                <a href="#" target="_self">GALERI
                </a>
                <ul>
                  <li>
                    <a href="<?php echo e(site_url('galeri-photo')); ?>" target="_self">GALERI FOTO
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo e(site_url('galeri-video')); ?>" target="_self">GALERI VIDEO
                    </a>
                  </li>
                </ul>
              </li>
              
              
              
              
              <li>
                <a href="<?php echo e(site_url('pages/hubungi-kami')); ?>" target="_self">HUBUNGI KAMI
                </a>
              </li>            
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--  /NAVIGATION MENU -->
    <!-- IMAGE SLIDERS -->
    <?php
    $CI =& get_instance();
    
    ?>
    <?php if(!$CI->uri->segment(1)): ?>
    <div class="container p-0 ">
      <div id="slide-indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators mt-3 mb-3">
          <?php $numSlide = 0; ?>
          <?php $__currentLoopData = $image_sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li data-target="#slide-indicators" data-slide-to="<?php echo e($numSlide); ?>" <?php echo e($numSlide == 0 ? 'class="active"' : ''); ?>>
          </li>
          <?php $numSlide++; ?>


          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div class="carousel slide" data-ride="carousel">
          <div class="carousel-inner pt-0">
            <?php $numSlide2 = 0; ?>

            <?php $__currentLoopData = $image_sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="carousel-item <?php echo e($numSlide2 == 0 ? 'active' : ''); ?>">
              <img style="width: 950px; height: 400px;" src="<?php echo e(site_url('media/sliders/'.$sliders->url)); ?>" class="img-fluid w-100">
              <div class="carousel-caption d-none d-md-block">
                <p class="text-center mb-3"><?php echo e($sliders->caption); ?></p>
              </div>
            </div>
            <?php $numSlide2++; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
      </div>
    </div>
    <!-- /IMAGE SLIDERS -->
    <!-- QUOTE -->
    <div class="container p-0 mb-3">
      <div class="quote">
        <div class="quote-title"><i class="fa fa-comments"></i> KATA BIJAK
        </div>
        <ul id="quote" class="quote">
          <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            <?php echo e($quote->quote); ?>


            <span class="font-weight-bold"><?php echo e($quote->oleh); ?></span>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </ul>
      </div>
    </div>
    <?php endif; ?>
    <!--  /QUOTE -->
  </header>
  <section class="content">
    <div class="container p-0">
      <div class="row">
        <!-- CONTENT -->
        <div class="col-lg-8 col-md-8 col-sm-12 ">
          <?php echo $__env->yieldContent('content'); ?>


          <!-- Photo Terbaru -->
          <!-- Video Terbaru -->
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 sidebar">
          <!-- Sambutan Kepala Sekolah  -->
          <div class="card rounded-0 border border-secondary mb-3">
            <img width="400px" height="400px" src="<?php echo e($pengaturan['foto_kepsek'] ? site_url('media/images/'.$pengaturan['foto_kepsek']) : ''); ?>" class="card-img-top rounded-0">
            <div class="card-body">
              <h5 class="card-title text-center text-uppercase"><?php echo e($pengaturan['nama_kepsek'] ?? ""); ?></h5>
              <p class="card-text text-center mt-0 text-muted">- Kepala Sekolah -</p>
              
            </div>
            <div class="card-footer text-center">
              <small class="text-muted text-uppercase">
                <a href="<?php echo e(site_url('pages/sambutan')); ?>">Sambutan Kepala Sekolah
                </a></small>
              </div>
            </div>


            <!-- Paling Dikomentari -->
            <h5 class="page-title mt-3 mb-3">Paling Dikomentari</h5>
            <div class="list-group mt-3 mb-3">
              <a href="<?php echo e(site_url('berita/read/'.$komen_terbanyak->id)); ?>" class="list-group-item list-group-item-action rounded-0">
                <div class="d-flex w-100 justify-content-between">
                  <h6 class="card-text font-weight-bold"><?php echo e($komen_terbanyak->judul); ?></h6>
                </div>
                <small class="text-muted"><?php echo e($komen_terbanyak->created_at); ?> - <?php echo e($komen_terbanyak->author_user_id); ?></small>
              </a>
            </div>

            <!--  Banner -->

          </div>
          <!-- /CONTENT -->
        </div>
      </div>
    </section>
    <footer>
      <div class="container primary-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-xs-12 text-md-left mb-2 mt-2">
              <h6 class="page-title">Hubungi Kami</h6>
              <p><?php echo e($pengaturan['nama_sekolah'] ?? ""); ?> &sdot; <?php echo e($pengaturan['motto'] ?? ""); ?></p>
              <dl class="row">
                <dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-map-marker"></span> Alamat</dt>
                <dd class="col-lg-8 col-md-8 col-sm-12"><?php echo e($pengaturan['alamat'] ?? ""); ?></dd>
                <dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-phone"></span> Telepon</dt>
                <dd class="col-lg-8 col-md-8 col-sm-12"><?php echo e($pengaturan['telepon'] ?? ""); ?></dd>
                <dt class="col-lg-4 col-md-4 col-sm-12"><span class="fa fa-envelope"></span> Email</dt>
                <dd class="col-lg-8 col-md-8 col-sm-12"><?php echo e($pengaturan['email'] ?? ""); ?></dd>
              </dl>
            </div>


          </div>
        </div>
      </div>
      <div class="container secondary-footer">
        <div class="container copyright">
          <div class="row pt-1 pb-1">
            <div class="col-md-6 col-xs-12 text-md-left text-center">
              Copyright &copy; 2019
              <a href="<?php echo e(site_url('assets/template/frontend/')); ?>"><?php echo e($pengaturan['nama_sekolah'] ?? ""); ?>,</a> All rights reserved.          
            </div>
            <div class="col-md-6 col-xs-12 text-md-right text-center"></div>
          </div>
        </div>
      </div>
    </footer>
    <div id="search_form">
      <form action="<?php echo e(site_url('assets/template/frontend/hasil-pencarian')); ?>" method="POST">
        <input type="search_form" name="keyword" autocomplete="off" placeholder="Masukan kata kunci pencarian" />
        <button type="submit" class="btn btn-lg btn btn-outline-light rounded-0"><i class="fa fa-search"></i> CARI</button>
      </form>
    </div>
    <a href="javascript:" id="return-to-top" class="rounded-lg"><i class="fa fa-angle-double-up"></i>
    </a>
    <?php echo $__env->yieldContent('js'); ?>
  </body>
  </html>
