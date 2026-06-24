const d = document;
setupScrollProgressBar();

function setupScrollProgressBar() {
	const progressBar = d.querySelector('.tweakmaster-scroll__progress');

	if (!progressBar) {
		return;
	}

	let ticking = false;

	function update() {
		ticking = false;

		const scrollTop = d.body.scrollTop || d.documentElement.scrollTop;
		const height = d.documentElement.scrollHeight - d.documentElement.clientHeight;

		progressBar.style.width = (scrollTop / height) * 100 + '%';
	}

	window.addEventListener(
		'scroll',
		() => {
			if (!ticking) {
				ticking = true;
				requestAnimationFrame(update);
			}
		},
		{ passive: true }
	);
}
