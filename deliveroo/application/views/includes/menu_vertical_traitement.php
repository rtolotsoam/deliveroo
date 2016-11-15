<!-- NAVBAR -->
<div class="navbar navbar-fixed-top navbar-primary main" role="navigation">
    <div class="navbar-header pull-left">
        <div class="navbar-brand">
            <div class="pull-left">
                <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
            </div>
            <a href="#" class="appbrand innerL logo_brand"> <?php /*echo "FTE";*/ echo img('logo_head.png','logo-deliveroo');  ?> </a>
        </div>
    </div>
  
   <?php if(isset($titre) &&  $titre !="TRAITEMENT"){ ?>
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <?php 
            if($level =="admin"){
            ?>
                <?php if($gest_g == 1){ ?>
                <li><a href="<?php echo site_url('back/accueil_admin/normal'); ?>" class="menu-icon"><i class="fa fa-home"></i><span class="text_couleur"> Processus</span></a></li>
                <?php } ?>
                <?php if($gest_u == 1){ ?>
                <li><a href="<?php echo site_url('back/utilisateur'); ?>" class="menu-icon"><i class="fa fa-user"></i><span class="text_couleur"> Utilisateurs</span></a></li>
                <?php } ?>
                <li><a href="<?php echo site_url('front/historique'); ?>" class="menu-icon"><i class="fa fa-pencil-square-o"></i><span class="text_couleur"> Historique</span></a></li>
                <li><a href="<?php echo site_url('front/deconnexion'); ?>" class="menu-icon"><i class="fa fa-sign-out"></i><span class="text_couleur"> Déconnexion</span></a></li>
            <?php 
            }else{
            ?>
                <li><a href="<?php echo site_url('front/accueil_traitement/normal'); ?>" class="menu-icon"><i class="fa fa-home"></i><span class="text_couleur"> Accueil</span></a></li>
                <li><a href="<?php echo site_url('front/deconnexion'); ?>" class="menu-icon"><i class="fa fa-sign-out"></i><span class="text_couleur"> Déconnexion</span></a></li>
            <?php 
            }
            ?>
        </ul>
    <?php  }else{ ?>
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <li><a href="#modal-accueil" data-toggle="modal" class="menu-icon"><i class="fa fa-home"></i><span class="text_couleur"> Accueil</span></a></li>
        </ul>
    <?php  } ?>
</div>
<!-- END NAVBAR -->