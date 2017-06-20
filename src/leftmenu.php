			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>



				<ul class="nav nav-list">
					
<?php  
$loginid=getSession("loginid");
if($loginid!=''){
?>
                                        <li class="active">
                                            <a href="index.php">
                                                <i class="menu-icon fa fa-home"></i>
                                                <span class="menu-text"> Dashboard </span>
                                            </a>

                                            <b class="arrow"></b>
					</li>
					<li class="">
                                            <a href="user_transactions.php">
                                                <i class="menu-icon fa fa-exchange"></i>
                                                <span class="menu-text"> Transaction </span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
                                            <a href="faq.php">
                                                <i class="menu-icon fa fa-question-circle"></i>
                                                <span class="menu-text"> FAQ </span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
                                            <a href="phrase_code.php">
                                                <i class="menu-icon fa fa-list-alt"></i>
                                                <span class="menu-text"> Phrase Code</span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        
                                        <li class="">
                                            <a href="image_auth.php">
                                                <i class="menu-icon fa fa-image"></i>
                                                <span class="menu-text"> Image Selection</span>
                                            </a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text"> Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="wallet_info.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Wallet Information
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="preference.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Preference
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="security.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Security
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        <li class="">
                                            <a href="logout.php">
                                                <i class="menu-icon fa fa-power-off"></i>
                                                <span class="menu-text"> Logout</span>
                                            </a>
						<b class="arrow"></b>
					</li>
<?php
}else{
?>
                                        <li class="active">
                                            <a href="index.php">
                                                <i class="menu-icon fa fa-home"></i>
                                                <span class="menu-text"> Dashboard </span>
                                            </a>

                                            <b class="arrow"></b>
					</li>
                                        <li class="">
                                            <a href="faq.php">
                                                <i class="menu-icon fa fa-question-circle"></i>
                                                <span class="menu-text"> FAQ </span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
                                            <a href="signup.php">
                                                <i class="menu-icon fa fa-money"></i>
                                                <span class="menu-text"> Create wallet </span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        <li class="">
                                            <a href="transactions.php">
                                                <i class="menu-icon fa fa-list"></i>
                                                <span class="menu-text"> All Transaction </span>
                                            </a>

						<b class="arrow"></b>
					</li>
                                        
<?php
}
?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>