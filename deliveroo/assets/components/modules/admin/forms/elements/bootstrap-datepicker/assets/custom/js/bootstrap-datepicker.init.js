$.fn.bdatepicker = $.fn.datepicker.noConflict();

$(function()
{

	/* DatePicker */
	// default
	// 'yyyy-mm-dd',
	
	$("#datepicker1").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#datepicker1b").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#datepicker-filtre1").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#datepicker-filtre2").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#msg_fin").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	$("#msg_deb").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});
	// component
	$('#datepicker2').bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});

	// today button
	$('#datepicker3').bdatepicker({
		format: "dd/mm/yyyy",
		todayBtn: true
	});
	/*
.datepicker .datepicker-dropdown .dropdown-menu .datepicker-orient-left .datepicker-orient-bottom
	*/
	
	// advanced
	$('#datetimepicker4').bdatepicker({
		format: "dd/mm/yyyy",
	});
	
	// meridian
	$('#datetimepicker5').bdatepicker({
		format: "dd MM yyyy - HH:ii P",
	    showMeridian: true,
	    autoclose: true,
	    startDate: "2013-02-14 10:00",
	    todayBtn: true
	});

	$(".datedeb_edit").bdatepicker({
		format: "dd/mm/yyyy",
		autoclose: true
	});

	// other
	if ($('#datepicker').length) $("#datepicker").bdatepicker({ showOtherMonths:true });
	if ($('#datepicker-inline').length) $('#datepicker-inline').bdatepicker({ inline: true, showOtherMonths:true });

});