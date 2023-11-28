<!DOCTYPE html>
<html lang="en">

<head>
    <?

    /**
     * @var CodeIgniter\View\View $this
     */ ?>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- <title>Amalia House of Muslimah &mdash; HOM</title> -->
    <?= $this->renderSection('title') ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/modules/chocolat/dist/css/chocolat.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />

    <!-- style -->
    <style>
        @media print {
            .main-sidebar {
                display: none !important;
            }

            .section-header {
                display: none !important;
            }

            .button {
                display: none !important;
            }

            .divider {
                display: block !important;
            }

            .main-footer {
                display: none !important;
            }
        }
    </style>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <!-- MESSAGES START -->
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="/assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <!-- MESSAGES END -->

                    <!-- NOTIF START -->
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <!-- NOTIF END -->

                    <!-- USER START -->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/avatar/<?= user()->user_image; ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    <!-- USER END -->
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <?php if (in_groups('admin')) : ?>
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand row row-cols-1">
                            <div class="col">
                                <img src="/assets/img/logo/logo.png" style="width: 40px; height: 40px;">
                            </div>
                            <div class="col" style="line-height: 20px;">
                                <a href="<?= site_url('/admin') ?>" class="col" style="color: #ff3d87;">A M A L I A</a><br>
                                <a href="<?= site_url('/admin') ?>" class="col">House of Muslimah</a>
                            </div>
                        </div>
                        <!-- ??-->
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="<?= site_url('/admin') ?>">St</a>
                        </div>
                        <!-- ?? -->

                        <ul class="sidebar-menu">
                            <li class="<?= $menu == 'dashboard' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('/admin') ?>"><i class="fas fa-fire"></i>
                                    <span>Dashboard</span></a></li>
                            <li class="dropdown <?= $menu == 'manage' ? 'active' : '' ?>">
                                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-clipboard-list"></i> <span>Manage</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link <?= $submenu == 'manageusers' ? 'active' : '' ?>" href="<?= site_url('manage_users') ?>">Manage Users</a></li>
                                    <li><a class="nav-link <?= $submenu == 'manageevents' ? 'active' : '' ?>" href="<?= site_url('manage_events') ?>">Manage Events</a></li>
                                </ul>
                            </li>
                            <li class="dropdown <?= $menu == 'akademik' ? 'active' : '' ?>">
                                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-school"></i> <span>Akademik</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link <?= $submenu == 'periode' ? 'active' : '' ?>" href="<?= site_url('periode') ?>">Periode</a></li>
                                    <li><a class="nav-link <?= $submenu == 'manageclass' ? 'active' : '' ?>" href="<?= site_url('manage_class') ?>">Manage Classes</a></li>
                                    <li><a class="nav-link <?= $submenu == 'jadwal' ? 'active' : '' ?>" href="<?= site_url('jadwal') ?>">Manage Jadwal</a></li>
                                </ul>
                            </li>
                            <li class="<?= $menu == 'jamaah' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('jamaah') ?>"><i class="fa fa-mosque"></i>
                                    <span>Jama'ah</span></a></li>
                            <li class="dropdown <?= $menu == 'laporan' ? 'active' : '' ?>">
                                <a href="" class="nav-link has-dropdown"><i class="fa fa-book"></i>
                                    <span>Laporan Santriwati</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link <?= $submenu == 'pelanggaran' ? 'active' : '' ?>" href="<?= site_url('pelanggaran') ?>">Pelanggaran</a></li>
                                    <li><a class="nav-link <?= $submenu == 'prestasi' ? 'active' : '' ?>" href="<?= site_url('prestasi') ?>">Prestasi</a></li>
                                    <li><a class="nav-link <?= $submenu == 'raportpenilaian' ? 'active' : '' ?>" href="<?= site_url('raport') ?>">Raport Penilaian</a>
                                    <li><a class="nav-link <?= $submenu == 'krs' ? 'active' : '' ?>" href="<?= site_url('krs') ?>">KRS</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                        <!-- BUTTON START -->
                        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div> -->
                        <!-- BUTTON END -->
                    </aside>
                <?php endif; ?>
                <?php if (in_groups('santriwati')) : ?>
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand row row-cols-1">
                            <div class="col">
                                <img src="/assets/img/logo/logo.png" style="width: 40px; height: 40px;">
                            </div>
                            <div class="col" style="line-height: 20px;">
                                <a href="<?= site_url('/santri') ?>" class="col" style="color: #ff3d87;">A M A L I A</a><br>
                                <a href="<?= site_url('/santri') ?>" class="col">House of Muslimah</a>
                            </div>
                        </div>
                        <!-- ??-->
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="<?= site_url('/santri') ?>">St</a>
                        </div>
                        <!-- ?? -->

                        <ul class="sidebar-menu">
                            <li class="<?= $menu == 'dashboard' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('/santri') ?>"><i class="fas fa-fire"></i>
                                    <span>Dashboard</span></a></li>
                            <li class="<?= $menu == 'class' ? 'active' : '' ?>"><a class="nav-link" href="#"><i class="fas fa-fire"></i>
                                    <span>Class</span></a></li>
                            <li class="<?= $menu == 'event' ? 'active' : '' ?>"><a class="nav-link" href="#"><i class="fas fa-fire"></i>
                                    <span>Event</span></a></li>
                            <li class="<?= $menu == 'jamaah' ? 'active' : '' ?>"><a class="nav-link" href="#"><i class="fas fa-fire"></i>
                                    <span>Jama'ah</span></a></li>
                            <li class="<?= $menu == 'prestasi' ? 'active' : '' ?>"><a class="nav-link" href="#"><i class="fas fa-fire"></i>
                                    <span>Prestasi</span></a></li>
                            <li class="<?= $menu == 'laporan' ? 'active' : '' ?>"><a class="nav-link" href="#"><i class="fas fa-fire"></i>
                                    <span>Laporan</span></a></li>

                        </ul>


                        <!-- BUTTON START -->
                        <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div> -->
                        <!-- BUTTON END -->
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Main Content -->
            <?
            /**
             * @var CodeIgniter\View\View $this
             */ ?>
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://chalathadoa.github.io/">Udkhul Rogodan</a>
                </div>
                <div class="footer-right">
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="/assets/modules/upload-preview//assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

    <div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 8px; z-index: 892; cursor: default; position: fixed; top: 0px; left: -8px; height: 1180px; display: block; opacity: 0;">
        <div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 314px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div>
    </div>
    <div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 8px; z-index: 892; top: 1172px; left: -250px; position: fixed; cursor: default; display: none; width: 242px; opacity: 0;">
        <div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 250px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
    </div>
    <div class="modal link-dialog" aria-hidden="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insert Link</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group note-form-group"><label class="note-form-label">Text to display</label><input class="note-link-text form-control note-form-control  note-input" type="text"></div>
                    <div class="form-group note-form-group"><label class="note-form-label">To what URL should this link go?</label><input class="note-link-url form-control note-form-control note-input" type="text" value="http://"></div><label class="custom-control custom-checkbox" for="sn-checkbox-open-in-new-window"> <input type="checkbox" class="custom-control-input" id="sn-checkbox-open-in-new-window" checked=""> <label class="custom-control-label" for="sn-checkbox-open-in-new-window">Open in new window</label></label>
                </div>
                <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" disabled="">Insert Link</button></div>
            </div>
        </div>
    </div>
    <div class="note-popover popover in note-link-popover bottom">
        <div class="arrow"></div>
        <div class="popover-content note-children-container"><span><a target="_blank"></a>&nbsp;</span>
            <div class="note-btn-group btn-group note-link"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Edit"><i class="note-icon-link"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Unlink"><i class="note-icon-chain-broken"></i></button></div>
        </div>
    </div>
    <div class="modal" aria-hidden="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insert Image</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group note-form-group note-group-select-from-files"><label class="note-form-label">Select from files</label><input class="note-image-input note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple"></div>
                    <div class="form-group note-group-image-url" style="overflow:auto;"><label class="note-form-label">Image URL</label><input class="note-image-url form-control note-form-control note-input  col-md-12" type="text"></div>
                </div>
                <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" disabled="">Insert Image</button></div>
            </div>
        </div>
    </div>
    <div class="note-popover popover in note-image-popover bottom">
        <div class="arrow"></div>
        <div class="popover-content note-children-container">
            <div class="note-btn-group btn-group note-imagesize"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Resize Full"><span class="note-fontsize-10">100%</span></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Resize Half"><span class="note-fontsize-10">50%</span></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Resize Quarter"><span class="note-fontsize-10">25%</span></button></div>
            <div class="note-btn-group btn-group note-float"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Float Left"><i class="note-icon-align-left"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Float Right"><i class="note-icon-align-right"></i></button><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Float None"><i class="note-icon-align-justify"></i></button></div>
            <div class="note-btn-group btn-group note-remove"><button type="button" class="note-btn btn btn-light btn-sm" tabindex="-1" title="" data-original-title="Remove Image"><i class="note-icon-trash"></i></button></div>
        </div>
    </div>
    <div class="note-popover popover in note-table-popover bottom">
        <div class="arrow"></div>
        <div class="popover-content note-children-container">
            <div class="note-btn-group btn-group note-add"><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Add row below"><i class="note-icon-row-below"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Add row above"><i class="note-icon-row-above"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Add column left"><i class="note-icon-col-before"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Add column right"><i class="note-icon-col-after"></i></button></div>
            <div class="note-btn-group btn-group note-delete"><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Delete row"><i class="note-icon-row-remove"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Delete column"><i class="note-icon-col-remove"></i></button><button type="button" class="note-btn btn btn-light btn-sm btn-md" tabindex="-1" title="" data-original-title="Delete table"><i class="note-icon-trash"></i></button></div>
        </div>
    </div>
    <div class="modal" aria-hidden="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Insert Video</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group note-form-group row-fluid"><label class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input class="note-video-url form-control note-form-control note-input" type="text"></div>
                </div>
                <div class="modal-footer"><button type="submit" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" disabled="">Insert Video</button></div>
            </div>
        </div>
    </div>
    <div class="modal" aria-hidden="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Help</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="max-height: 300px; overflow: scroll;">
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undoes the last command</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redoes the last command</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span>
                    <div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span>
                </div>
                <div class="modal-footer">
                    <p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.9</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- DROPIFY JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js" integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Datatables -->
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>

</body>

</html>