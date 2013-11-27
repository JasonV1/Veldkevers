
<?php if ($this->session->userdata("logged_in"))
        {
            $rol = $this->session->userdata["logged_in"]["rol_id"];

            if ($rol == 1)
            {
                echo "<a href='".base_url()."index.php'>Home</a>";
                echo "<a href='".base_url()."index.php/klant/personeelsleden'>Personeelsleden</a>";
                echo "<a href='logout'>Logout</a>";
            }
            else if ($rol == 4)
            {
                echo "<a href='".base_url()."index.php'>Home</a>";
                echo "<a href='".base_url()."index.php/autos/auto_view'>Auto's</a>";
                echo "<a href='logout'>Logout</a>";
            }
            else if ($rol == 5)
            {
                echo "<a href='".base_url()."index.php'>Home</a>";
                echo "<a href='logout'>Logout</a>";
            }
            else if ($rol == 6)
            {
                echo "<a href='".base_url()."index.php'>Home</a>";
                echo "<a href='".base_url()."index.php/autos/auto_view'>Auto's</a>";
                echo "<a href='logout'>Logout</a>";
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