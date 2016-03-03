<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Registration</title>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!--java script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
    <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
    <link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />
    <script src="/js/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    
    <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js'></script>        
    // <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js'></script>
    <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script> 
    <script>
        $.ajaxSetup({ 
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }  
        });
    </script>
</head>

<body>
    <div class="brand">Mindfire Solutions</div>
   <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

               <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->first); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/profile')); ?>">profile</a></li>
                                <li><a href="<?php echo e(url('/update')); ?>">Update</a></li>
                                 <li><a href="<?php echo e(url('/assignment')); ?>">Assignment</a></li>
                                <?php if( Auth::user()->isAdmin() ): ?>
                                <li><a href="<?php echo e(url('/add')); ?>">ADD</a></li>
                                <li><a href="<?php echo e(url('/assign')); ?>">ASSIGN</a></li>
                                 <li><a href="<?php echo e(url('/privilege')); ?>">Privileges</a></li>
                                <li><a href="<?php echo e(url('/grid')); ?>">Grid View</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <?php if(Session::has('status')): ?>
        <div class="alert alert-success"><center><?php echo e(Session::get('status')); ?></center></div>
    <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

    </div>
</div>
</div>
 <script type='text/javascript' src='/js/grid.js'></script>
 <script type='text/javascript' src='/js/privilege.js'></script>
</body>
</html>
