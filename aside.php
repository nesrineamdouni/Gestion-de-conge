<style>
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: white;
        color: black;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #6610f2;">
    <!-- Brand Logo -->
    <?php
    $type_compte = $_SESSION['account']['type_compte'];

    if ($type_compte === 'admin') {
    ?>
        <a href="index.php" class="brand-link" style="background-color: #6610f2;">
            <i class="fas fa-home" style="margin-left: 6%;"></i>
            <span class="brand-text font-weight-light">Accueil</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image" style="margin-left: 3%;">
                    <i class="fas fa-user" style="color: ghostwhite;"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['account']['prenom'] . ' ' . $_SESSION['account']['nom']; ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="utilisateurs.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'utilisateurs.php') echo 'active'; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="departements.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'departements.php') echo 'active'; ?>">
                            <i class="fas fa-sitemap"></i>
                            <p>Départements</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="liste_conge.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'liste_conge.php') echo 'active'; ?>">
                            <i class="fas fa-list"></i>
                            <p>Liste de demandes</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="mon_compte.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'mon_compte.php') echo 'active'; ?>">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>Mon Compte</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Déconnexion</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    <?php
    } elseif ($type_compte === 'employe') {
    ?>
        <a href="conge.php" class="brand-link" style="background-color: #6610f2;">
            <i class="fas fa-home" style="margin-left: 6%;"></i>
            <span class="brand-text font-weight-light">Accueil</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image" style="margin-left: 3%;">
                    <i class="fas fa-user" style="color: ghostwhite;"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['account']['prenom'] . ' ' . $_SESSION['account']['nom']; ?>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item">
                        <a href="conge.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'conge.php') echo 'active'; ?>">
                            <i class="fas fa-list"></i>
                            <p>
                                Congés
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="mon_compte.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'mon_compte.php') echo 'active'; ?>">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Mon Compte
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Déconnexion
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

    <?php
    } elseif ($type_compte === 'rh') {
    ?>
        <a href="liste_conge.php" class="brand-link" style="background-color: #6610f2;">
            <i class="fas fa-home" style="margin-left: 6%;"></i>
            <span class="brand-text font-weight-light">Accueil</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image" style="margin-left: 3%;">
                    <i class="fas fa-user" style="color: ghostwhite;"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['account']['prenom'] . ' ' . $_SESSION['account']['nom']; ?>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="liste_conge.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'liste_conge.php') echo 'active'; ?>">
                            <i class="fas fa-list"></i>
                            <p>
                                Liste de demandes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="conge.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'conge.php') echo 'active'; ?>">
                            <i class="fas fa-list"></i>
                            <p>
                                Mes demandes
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="mon_compte.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'mon_compte.php') echo 'active'; ?>">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Mon Compte
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Déconnexion
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

    <?php
    }
    ?>
</aside>