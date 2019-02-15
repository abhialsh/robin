<div class="left side-menu">
   <div class="sidebar-inner slimscrollleft">
      <!--- Divider -->
      <div id="sidebar-menu">
         <ul>
            <li class="has_sub">
               <a href="<?php echo site_url('admin/dashboard')?>" class="waves-effect"><i class="fa fa-tachometer"></i> <span> Dashboard </span> </a>
            </li>
            <li class="has_sub"> 
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-text-o"></i> <span>  Forms  </span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/form')?>">Add Form</a></li>
                  <li><a href="<?php echo site_url('admin/form/forms_response')?>">Form Responses</a></li>
               </ul>
            </li>
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-calendar"></i><span> Booking </span>  <span class="menu-arrow"></span></a>
               <ul class="list-unstyled">
                  <li>
                     <a href="javascript:void(0);" class="waves-effect"><span> Services </span>  <span class="menu-arrow"></span></a>
                     <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('admin/booking/appoinment_list'); ?>">Appointment </a></li>
                         <li><a href="<?php echo site_url('admin/booking/class_list'); ?>">Class </a></li>
                         <li><a href="<?php echo site_url('admin/booking/buslist'); ?>">Bus Ticketing</a></li>
                     </ul>
                  </li>
                  <li><a href="<?php echo site_url('admin/booking/calender'); ?>">Calendar</a></li>
                  <li>
                     <a href="javascript:void(0);" class="waves-effect"><span> Business Setup </span>  <span class="menu-arrow"></span></a>
                     <ul class="list-unstyled">
                        <li><a href="<?php echo site_url('admin/booking/booking_option'); ?>">Booking  Option </a></li>
                        <li><a href="<?php echo site_url('admin/booking/bus_list'); ?>">Bus Setting</a></li>
                     </ul>
                  </li>
                  <li><a href="<?php echo site_url('admin/booking/staff_list')?>">Staff</a></li>
                  <li><a href="<?php echo site_url('admin/booking/customers')?>">Customers</a></li>
                  <li><a href="<?php echo site_url('admin/booking/history')?>">Booking History</a></li>
               </ul> 
            </li>
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-cart"></i> <span> Shop</span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/shop/categories')?>" > Category List</a></li>
                  <li><a href="<?php echo site_url('admin/shop/add_product')?>" > Add New Product </a></li>
                  <li><a href="<?php echo site_url('admin/shop/products'); ?>" > Manage Product </a></li>
                  <li><a href="o.php"><span>Integrate E-commerce Stores</span></a></li>
                  <li><a href="o.php" > <span> Store Orders </span> </a> </li>
                  <li><a href="o.php" > Manage Shipping </a></li>
                  <li><a href="o.php" > Manage Setting </a></li>
               </ul>
            </li>
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-text-o"></i> <span> Invoice</span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="m.php"> My Invoices </a></li>
                  <li><a href="m.php"> Product / Services </a></li>
                  <li><a href="m.php"> Tax </a></li>
               </ul>
            </li> 
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-building-o"></i> <span> Apartment Rental </span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/apartment')?>" class=""> Add Apartments </a></li>
                  <li><a href="<?php echo site_url('admin/apartment/booked_apartment')?>" class=""> Booked Apartments </a></li>
                  <li><a href="<?php echo site_url('admin/apartment/setting_list'); ?>" class="">Apartments  Setting </a></li>
               </ul>
            </li>
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cutlery"></i> <span> Restaurant </span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/restaurant/index'); ?>" class=""> Menu Setup </a></li> 
                  <li><a href="<?php echo site_url('admin/restaurant/manage_shipping'); ?>" class=""> Manage Shipping </a></li>
                  <li><a href="<?php echo site_url('admin/restaurant/setting'); ?>" class=""> Manage Settings </a></li>
                  <li><a href="<?php echo site_url('admin/restaurant/orders'); ?>" class=""> <span> Restaurants Orders </span> </a> </li>
               </ul>
            </li>
            <li class="has_sub">
               <a href="m.php" class="waves-effect"><i class="fa fa-comments-o"></i> <span> Chat </span> </a>
            </li>
            <li class="has_sub">
               <a href="<?php echo site_url('admin/extension')?>" class="waves-effect"> <i class="fa fa-tty"></i> <span> Extension </span>  </a>               
            </li>
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-money"></i> <span> Payment Section </span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/payment')?>" class=""> Dashboard </a></li>
                  <li><a href="<?php echo site_url('admin/payment/account_setup')?>" class=""> Account Setup  </a></li>
               </ul>
            </li> 
            <li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md"></i> <span> Consultant </span> <span class="menu-arrow"></span> </a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo site_url('admin/consultant')?>" class=""> Consultant Detail </a></li>
                  <li><a href="<?php echo site_url('admin/consultant/history')?>" class=""> Call History  </a></li>
               </ul>
            </li>
            <li class="has_sub">
               <a href="<?php echo site_url('admin/Permissions')?>" class="waves-effect"><i class="fa fa-users"></i> <span>User Permissions  </span></a>
            </li>
         </ul>
         <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
   </div>
</div>