function playLottieAnimation() {

    lottie.loadAnimation({
        container: document.getElementById('animatedbody'),
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: 'Animation - 1727257181574.json'
    });
    console.log("huh")
}


document.getElementById('thebutton').addEventListener('click', playLottieAnimation);