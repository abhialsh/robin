  <script type="text/javascript" src="<?php echo base_url()?>/assets/custom/js/pagination.js"></script>
  <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
							
							<li class="has_sub">
                                <a href="<?php echo site_url('superadmin/dashboard');?>" class="waves-effect "><i class="ti-home"></i> <span> Dashboard </span></a>
                            </li>
							
							<li class="has_sub">
                                <a href="<?php echo site_url('superadmin/client');?>" class="waves-effect"><i class="ti-home"></i> <span> Client Section </span></a>
                            </li>
							
							<li class="has_sub">
                                <a href="<?php echo site_url('superadmin/permission');?>" class="waves-effect"><i class="ti-home"></i> <span> Permission Section </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Order Section </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('superadmin/Order/order_detail');?>" >Order Details</a></li>
                                    <li><a href="">Order Rating</a></li>
                                </ul>
                            </li>
							
							<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Stripe Section </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('superadmin/stripe');?>">Payment Setup</a></li>
                                    <li><a href="">Online Stripe Accounts</a></li>
                                    <!-- <li><a href="">Local Stripe Accounts</a></li> -->
                                    <li><a href="<?php echo site_url('superadmin/stripe/payment_history'); ?>" >Payment History</a></li>
                                </ul>
                            </li>
							
							<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Consultant Setting </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('')?>/superadmin/consultant/twillioNumberDetail">Purchased Number Detail</a></li>
                                    <li><a href="<?php echo site_url('')?>/superadmin/consultant">All Consultant</a></li>
                                </ul>
                            </li>

							
							<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> User Help Section </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="">User Help</a></li>
                                    <li><a href="">Spam Messages</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>