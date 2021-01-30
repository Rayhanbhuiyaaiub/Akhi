
<script>
        $(document).ready(function(){
            $('#icon').click(function()
            {
                $('ul').toggleClass('show');
            });
        });

    </script>
<nav>



<label class="logo">AKHI PRINT</label>

<ul>
    <li><a <?php if(isset($fileName)){if($fileName=="home.php"){echo "class=\"active\"";}} ?> href="home.php">Home </a></li>
    <li><a <?php if(isset($fileName)){if($fileName=="about.php"){echo "class=\"active\"";}} ?>href="#">About us</a></li>
    <li><a <?php if(isset($fileName)){if($fileName=="services.php"){echo "class=\"active\"";}} ?> href="#">Services</a></li>
    <li><a <?php if(isset($fileName)){if($fileName=="contact.php"){echo "class=\"active\"";}} ?> href="#">Contact</a></li>
    <li><a <?php if(isset($fileName)){if($fileName=="login.php"){echo "class=\"active\"";}} ?> href="login.php">Login</a></li>
</ul>
<label id="icon">
    <i class="fas fa-bars"></i>
</label>
</nav>
