
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>

  <div class="leftpanel">

    <div class="logopanel">
        <h1><span>[</span> <?php echo $ttl[0]; ?>  <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="<?php echo $baseurl; ?>/profile"><i class="fa fa-user"></i> <span>View Profile</span></a></li>
			  <li><a href="<?php echo $baseurl; ?>/changepassword"><i class="fa fa-cog"></i> <span>Change Password</span></a></li>
              <li><a href="<?php echo $baseurl; ?>/signout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li><a href="<?php echo $baseurl; ?>/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

				<li class="nav-parent"><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a>
          <ul class="children">
            <li><a href="<?php echo $baseurl; ?>/updateprofile"><i class="fa fa-caret-right"></i> Profile Setting</a></li>
            <li><a href="<?php echo $baseurl; ?>/profilepicture"><i class="fa fa-caret-right"></i> Profile Picture</a></li>
          </ul>
        </li>
		
  
     	
        <li class="nav-parent"><a href="<?php echo $baseurl; ?>/#"><i class="fa fa-gamepad"></i> <span>7 Trade</span></a>
          <ul class="children">
            <li><a href="<?php echo $baseurl; ?>/seventrade"><i class="fa fa-caret-right"></i>7 Trade Game</a></li>
            <li><a href="<?php echo $baseurl; ?>/seventradestat"><i class="fa fa-caret-right"></i>Your Statistics</a></li>
            <li><a href="<?php echo $baseurl; ?>/seventradewinlist"><i class="fa fa-caret-right"></i>Winner List</a></li>
          </ul>
        </li>
    	

        <li><a href="<?php echo $baseurl; ?>/head-tail"><i class="fa fa-gamepad"></i> <span>Head And Tail</span></a></li>
        <li><a href="<?php echo $baseurl; ?>/bid-on-game"><i class="fa fa-gamepad"></i> <span>Bid Game</span></a></li>


        <li class="nav-parent"><a href="<?php echo $baseurl; ?>/#"><i class="fa fa-dollar"></i> <span>Finance &nbsp;		
		<span class="badge badge-success"><?php echo $mallu; ?></span></span></a>
          <ul class="children">
            <li><a href="<?php echo $baseurl; ?>/addbalance"><i class="fa fa-caret-right"></i>Add Balance</a></li>
            <li><a href="<?php echo $baseurl; ?>/withdrawbalance"><i class="fa fa-caret-right"></i>Withdraw Balance</a></li>
            <li><a href="<?php echo $baseurl; ?>/balancetransfer"><i class="fa fa-caret-right"></i>Balance Transfer</a></li>
            <li><a href="<?php echo $baseurl; ?>/transactionreport"><i class="fa fa-caret-right"></i>Transaction Report</a></li>
          </ul>
        </li>


        <li><a href="<?php echo $baseurl; ?>/affiliation"><i class="fa fa-user"></i> <span>Affiliation</span></a></li>
		
      </ul>

      

    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->

  <div class="mainpanel">

    <div class="headerbar">

      <a class="menutoggle"><i class="fa fa-bars"></i></a>


      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="propic/<?php echo $uid; ?>.jpg" alt="" />
<?php
echo " $user";
?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
			  
              <li><a href="<?php echo $baseurl; ?>/profile"><i class="fa fa-user"></i> <span>View Profile</span></a></li>
              <li><a href="<?php echo $baseurl; ?>/changepassword"><i class="fa fa-cog"></i> <span>Change Password</span></a></li>
			  
              <li><a href="<?php echo $baseurl; ?>/signout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div><!-- header-right -->

    </div><!-- headerbar -->
