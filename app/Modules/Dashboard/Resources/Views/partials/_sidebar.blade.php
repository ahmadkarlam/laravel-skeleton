@include('dashboard::partials.__user-panel')
@include('dashboard::partials.__search-form')
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="header">MAIN NAVIGATION</li>
	<li>
		<a href="#">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
		</a>
	</li>
	<li>
		<a href="#">
			<i class="fa fa-bars"></i> <span>Menu</span>
		</a>
	</li>
	<li>
		<a href="#">
			<i class="fa fa-user"></i> <span>User</span>
		</a>
	</li>
	<li>
		<a href="#">
			<i class="fa fa-universal-access"></i> <span>Role</span>
		</a>
	</li>
</ul>