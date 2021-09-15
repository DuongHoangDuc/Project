<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->  
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ URL::to ('/dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ URL::to ('/category') }}" class="sidebar-link"><i class="far fa-copyright"></i><span class="hide-menu">Category</span></a></li>
                                <li class="sidebar-item"><a href="{{ URL::to ('/brand') }}" class="sidebar-link"><i class="fas fa-bold"></i><span class="hide-menu"> Brand </span></a></li>
                                <li class="sidebar-item"><a href="{{ URL::to ('/product') }}" class="sidebar-link"><i class="fab fa-product-hunt"></i><span class="hide-menu"> Product </span></a></li>
                            </ul>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-newspaper"></i><span class="hide-menu">Post</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ URL::to ('/category-post') }}" class="sidebar-link"><i class="far fa-copyright"></i><span class="hide-menu">Category post</span></a></li>
                                <li class="sidebar-item"><a href="{{ URL::to ('/post') }}" class="sidebar-link"><i class="fab fa-product-hunt"></i><span class="hide-menu"> Post </span></a></li>
                            </ul>
                        </li>
                      
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
</aside>
