<!DOCTYPE html>
<html lang="fr">
    
<head>
      @include('layout.dashboard.partial.header')
</head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			@include('layout.dashboard.partial.menu')
			
			<!-- Sidebar -->
            @include('layout.dashboard.partial.sidesection')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                 @yield('pagecontent')
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		@include('layout.dashboard.partial.footer')
		
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/orange/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 May 2020 09:59:18 GMT -->
</html>