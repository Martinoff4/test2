const img_cta = document.querySelector('.img_cta'),
cta = document.querySelector('.cta');

img_cta.style.display = 'block';

cta.style.display = 'none';

if(screen.width < 950){
	img_cta.style.display = 'none';
}else{
	img_cta.style.display = 'block';
}

window.addEventListener('resize', function() { 
	if(screen.width < 950){
		img_cta.style.display = 'none';
	}else{
		img_cta.style.display = 'block';
	}
});
