const slidePage = document.querySelector(".slide-page");
	const nextBtnFirst = document.querySelector(".firstNext");
	const prevBtnSec = document.querySelector(".prev-1");
	const nextBtnSec = document.querySelector(".next-1");
    const nextBtnThird = document.querySelector(".next-2");
	const prevBtnThird = document.querySelector(".prev-2");
    const prevBtnFourth = document.querySelector(".prev-3")
	const bullet = document.querySelectorAll(".form__progress-btn.bullet");
	let current = 1;

	nextBtnFirst.addEventListener("click", function(event){
		event.preventDefault();
		slidePage.style.marginLeft = "-25%";
		bullet[current].classList.add("active");
		current += 1;
	});
	nextBtnSec.addEventListener("click", function(event){
		event.preventDefault();
		slidePage.style.marginLeft = "-50%";
		bullet[current -1].classList.add("active");
		current += 1;
	});
    	
	prevBtnSec.addEventListener("click", function(event){
		event.preventDefault();
		slidePage.style.marginLeft = "0%";
		bullet[current - 2].classList.remove("active");
		current -= 1;
	});
	prevBtnThird.addEventListener("click", function(event){
		event.preventDefault();
		slidePage.style.marginLeft = "-25%";
		bullet[current - 2].classList.remove("active");
		current -= 1;
	});
    