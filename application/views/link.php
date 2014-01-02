<?php if ($this->session->userdata("logged_in"))
        {
            $rol = $this->session->userdata["logged_in"]["rol_id"];

            if ($rol == 1)
            {
                echo "<a href='".base_url()."index.php/klant/welcome_klant'>Home</a>";
                echo "<a href='".base_url()."index.php/klant/personeelsleden'>Personeelsleden</a>";
                echo "<a href='".base_url()."index.php/klant/auto_view_klant'>Auto's</a>";
                echo "<a href='".base_url()."index.php/klant/bekijk_afspraken'>Bekijk afspraken</a>";
                echo "<a href='".base_url()."index.php/user/logout'>Logout</a>";
            }
            else if ($rol == 4)
            {
                echo "<a href='".base_url()."index.php/verkoper/welcome_verkoper'>Home</a>";
                echo "<a href='".base_url()."index.php/verkoper/afspraken'>Afspraken</a>";
                echo "<a href='".base_url()."index.php/verkoper/auto_view_verkoper'>Auto's</a>";
                echo "<a href='".base_url()."index.php/user/logout'>Logout</a>";
            }
            else if ($rol == 5)
            {
                echo "<a href='".base_url()."index.php/eigenaar/welcome_eigenaar'>Home</a>";
                echo "<a href='".base_url()."index.php/eigenaar/auto_eigenaar'>Mijn Auto</a>";
                echo "<a href='".base_url()."index.php/user/logout'>Logout</a>";
            }
            else if ($rol == 6)
            {
                echo "<a href='".base_url()."index.php/chef/welcome_chef'>Home</a>";
                echo "<a href='".base_url()."index.php/chef/auto_view_chef'>Auto's</a>";
                echo "<a href='".base_url()."index.php/chef/afspraken'>Afspraken</a>";
                echo "<a href='".base_url()."index.php/chef/adressen'>Adressen</a>";
                echo "<a href='".base_url()."index.php/user/logout'>Logout</a>";
            }
        }
            else 
            {
                echo "<a href='".base_url()."index.php'>Home</a>";
                echo "<a href='".base_url()."index.php/contactpagina/contact'>Contact</a>";
                echo "<a href='".base_url()."index.php/autos/auto_view'>Auto's</a>";
                echo "<a href='".base_url()."index.php/user/registration_view'>Registreren</a>";
                echo "<a href='".base_url()."index.php/user/login_view'>Login</a>";
            }

            
 // End of file: link.php
 // Location: ./views/link.php