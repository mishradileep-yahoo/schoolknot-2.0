(function ($) {
$(document).ready(function(){
//$('#mainWrapper').removeClass('blue').addClass('red');
$('a.list-icon').bind('click',function(e){
$('#header').height(50);
$('ul.mobileMenu').toggleClass('show');
e.stopPropagation();
});
$('a.sub-icon').bind('click',function(e){
	$('#header').height(50);
	$('ul.subMenu').toggleClass('show');
	e.stopPropagation();
	});
$('a.sub-icon').click(function(e){
e.stopPropagation();
});
$('ul.mobileMenu li').click(function(e){
	e.stopPropagation();
	});
$('ul.mobileMenu>li.search').bind('click',function(e){
$('ul.mobileMenu').show();
$('.searchBox').val('').focus();
});
$('body').click(function(){
$('ul.mobileMenu').removeClass('show');
});
$('.contactAdd .pBottom17px, .blackTxt').nextAll('p').addClass('blackTxt');

$('#admin-menu-show').click(function(){
	$('.leftMenuWrap').show();
	$('.rightContainer').hide();
	$('#admin-menu-hide').show();
	$('#admin-menu-show').hide();
});
$('#admin-menu-hide').click(function(){
	$('.leftMenuWrap').hide();
	$('.rightContainer').show();
	$('#admin-menu-show').show();
	$('#admin-menu-hide').hide();
});

});
})(jQuery);; 