<?php
        $nivel = $_SESSION['nivel_id'];

        if(($nivel == "Admin") || ($nivel == "Pastor") ){
                                $menu =  '<li>'
                                            .'<a href="../pages/paineluser.php">'
						.'<span><i class="fa fa-user"></i></span>'
						.'<span>Usuarios</span>'
                                            .'</a>'
					.'</li>'
					.'<li>'
                                            .'<a href="../pages/painelrede.php">'
						.'<span><i class="fa fa-sitemap"></i></span>'
						.'<span>Rede</span>'
                                            .'</a>'
					.'</li>'
					.'<li>'
                                            .'<a href="../pages/painelnivel.php">'
						.'<span><i class="fa fa-star-o"></i></span>'
						.'<span>Nivel</span>'	
                                            .'</a>'
					.'</li>'
					.'<li>'
                                            .'<a href="../pages/painelcelula.php">'
                                                .'<span><i class="fa fa-users"></i></span>'
						.'<span>Celulas</span>'
                                            .'</a>'
					.'</li>'
                                        .'<li>'
                                            .'<a href="../pages/painellista.php">'
                                                .'<span><i class="fa fa-list-alt"></i></span>'
						.'<span>Lista de chamada</span>'
                                            .'</a>'
					.'</li>'
                                        .'<li>'
                                            .'<a href="../pages/painelrelatorio.php">'
                                                .'<span><i class="fa fa-file"></i></span>'
						.'<span>Relatorios</span>'
                                            .'</a>'
					.'</li>';
        }elseif ( ($nivel == "Lider") || ($nivel == "Discipulador")){
                            $menu = '<li>'
                                            .'<a href="../pages/paineluser.php">'
						.'<span><i class="fa fa-user"></i></span>'
						.'<span>Usuarios</span>'
                                            .'</a>'
					.'</li>'
                                        .'<li>'
                                            .'<a href="../pages/painellista.php">'
                                                .'<span><i class="fa fa-list-alt"></i></span>'
						.'<span>Lista de Chamada</span>'
                                            .'</a>'
					.'</li>'
                                        .'<li>'
                                            .'<a href="../pages/painelcelula.php">'
                                                .'<span><i class="fa fa-users"></i></span>'
						.'<span>Celulas</span>'
                                            .'</a>'
					.'</li>'
                                        .'<li>'
                                            .'<a href="../pages/painelrelatorio.php">'
                                                .'<span><i class="fa fa-file"></i></span>'
						.'<span>Relatorios</span>'
                                            .'</a>'
					.'</li>';
        }else{
           echo 'sem acesso';

}

