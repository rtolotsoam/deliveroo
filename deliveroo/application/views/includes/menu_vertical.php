<!-- NAVBAR -->
<div class="navbar navbar-fixed-top navbar-primary main" role="navigation">
    <div class="navbar-header pull-left">
        <div class="navbar-brand">
            <div class="pull-left hidden">
                <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
            </div>
            <a href="#" class="appbrand innerL logo_brand"> <?php /*echo "FTE";*/ echo img('logo_head.png','logo-deliveroo');  ?> </a>
        </div>
    </div>

    <?php if(isset($titre) &&  $titre =="ACCUEIL TRAITEMENTS"){ ?>
    <ul class="nav navbar-nav navbar-left" style="position : relative; left: 250px;">
        <li class=" hidden-xs">
            <form class="navbar-form navbar-left" role="search">
                <div class="input-group">
                    <input type="text" id="text_search" class="form-control" placeholder="Entrez votre recherche de processus ..." />
                    <div class="input-group-btn">
                     <button type="submit" class="btn btn-inverse" onclick="search(<?php echo $traitement; ?>); return false;"><i class="fa fa-search"></i></button> 
                    </div>
                    <span data-layout="top" data-type="alert" data-toggle="notyfy" id="msg_search"></span>

                    <span data-layout="top" data-type="warning" data-toggle="notyfy" id="msg_error"></span>
                </div>
            </form>
        </li>
    </ul> 
    <?php } ?>
  
   <?php if(isset($titre) &&  $titre !="TRAITEMENT"){ ?>
        <ul class="nav navbar-nav navbar-right hidden-xs"  style="z-index:999999;">

            <?php 
            if($level =="admin"){
            ?>
              <li class="dropdown" >
                    <a href="" class="dropdown-toggle user menu-icon" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="text_couleur"> Message <span class="caret"></span></span></a>
                    <ul class="dropdown-menu " >
                        <li ><a style='color:white !important;' href="<?php echo site_url('back/msg_alert')?>"><i class="fa fa-bell"></i>
                         Alertes</a></li>
                     <!--   <li ><a href="#X" style='color:white !important;'><i class="fa fa-info-circle" ></i> Notification</a></li>-->
                        
                    </ul>
                </li>
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
                <?php if($titre =="ACCUEIL TRAITEMENTS"){ ?>

                <?php
                if(isset($notifications) && !empty($notifications)){
                ?>
                <li class="dropdown notification">
                    <a href="#" class="dropdown-toggle menu-icon" data-toggle="dropdown"><i class="fa fa-fw fa-bell-o"></i><span class="badge badge-primary"><?php echo count($notifications); ?></span></a>
                        
                      
                        <ul class="dropdown-menu inbox">
                            <li class="headline">Notifications</li>
                            <?php 
                            $i = 0;
                            foreach ($notifications as $notification) {
                             $i++;
                             

                             if($i == 3){
                               break;
                             }   
                            ?>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <a href="" onclick="notification(<?php echo $notification->id_notification; ?>); return false;" class="strong"> 
                                                <i class="fa fa-circle"></i> <?php echo ascii_to_entities(substr($notification->objet, 0, 25))."..."; ?>
                                            </a>
                                            <span class="pull-right time-email"><?php echo $notification->matricule_modif; ?>
                                            </span>
                                            <div class="clearfix"></div>
                                            <?php echo str_replace(array("§§§", "&#487;&#167;")," <i class='fa fa-hand-o-right'></i> ",ascii_to_entities(str_replace(array("§§§", "&#487;&#167;")," <i class='fa fa-hand-o-right'></i> ",substr($notification->description,0,60))))."..."; ?>
                                        </div>
                                    </div>    
                                </li>

                            <?php 
                            }
                            ?>

                        </ul>
                        
                </li>
                <?php
                }
                ?>

                <li class="dropdown">
                    <a href="" class="dropdown-toggle user" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs hidden-sm"> &nbsp; 
                            <?php 
                                echo ascii_to_entities(ucfirst(strtolower($prenom))); 
                            ?> 
                        </span> 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu list">
                        <li>
                            <a href="#profil_user" data-toggle="modal" style="color: white;">Votre profil &nbsp; <i style="color: white;" class="fa fa-eye pull-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if($titre != "ACCUEIL CATEGORIE"){ ?>
                <?php if($titre !="ACCUEIL TRAITEMENTS"){ ?>
                    <li><a href="<?php echo site_url('front/accueil_traitement/normal'); ?>" class="menu-icon"><i class="fa fa-home"></i><span class="text_couleur"> Accueil</span></a></li>
                <?php } ?>
                <li><a href="<?php echo site_url('front/historique'); ?>" class="menu-icon"><i class="fa fa-pencil-square-o"></i><span class="text_couleur"> Historique</span></a></li>
                <?php } ?>
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

<?php
if($titre =="ACCUEIL TRAITEMENTS"){
?>
<script type="text/javascript">

setInterval(menu_notification, 1000);

function menu_notification(){

    console.log('notification');

    var form_data = {
        ajax : 'notifications'
    };



    $.ajax({
        url: <?php echo "'".site_url('front/accueil_traitement/get_notification')."',"; ?>
        type: 'POST',
        data: form_data,
        success: function(data) {
            
            //TRAITEMENT DES ERREURS
            if(data == 'vide'){
                
                $('.notification').addClass('hidden');

            }else{

                var str = data;
                var res = str.split("||");
				

                $('.notification').removeClass('hidden');

                $(".inbox").empty();
                $(".inbox").append('<li class="headline">Notifications</li>'+res[0].replace(/&#167;&#167;&#167;/gi," <i class='fa fa-hand-o-right'></i> "));

                $(".badge-primary").empty();
                $(".badge-primary").append(res[1]);

            }

        }

    });
}


</script>

<?php
}
?>