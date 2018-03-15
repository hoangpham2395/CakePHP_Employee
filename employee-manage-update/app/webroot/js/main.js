$(document).ready(function () {
/*-- js cho phần sidebar --*/
	$('div .menu-1').click(function() {
		$('div .submenu-1').toggle();
	});

	$('div .menu-2').click(function() {
		$('div .submenu-2').toggle();
	});

	$('div .menu-3').click(function() {
		$('div .submenu-3').toggle();
	});
	
	$('div .menu-4').click(function() {
		$('div .submenu-4').toggle();
	});
	// $('div .main-content-siderbar ul li').click(function () {
		// 	$('ul li i').css('color','#FF0000');
	// });

/*-- js cho phần hiển thị form date --*/
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		dateFormat: 'yyyy-mm-dd',
		autoclose: true,
		todayBtn: true,
		startDate: '-3d'
	});

/*-- js cho phần thay đổi Project --*/
	function confirmEditProject(e) {
		$('#editProject').submit();
	}

/*-- js cho phần reload Projet Member --*/
	function reloadProjectMember(e) {
		$('#projectMember').submit();
	}

/*-- show tab --*/
	var hash = window.location.hash;
  	hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  	
	$('.nav-tabs a').click(function (e) {
	    $(this).tab('show');
	    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
	    window.location.hash = this.hash;
	    $('html,body').scrollTop(scrollmem);
	});

/*-- Show popup --*/
	function showPopup() {
		
	} 
});


	
