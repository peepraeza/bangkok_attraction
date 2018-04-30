$(".polaroids li a").on("mouseenter", function() {
	var isRunning = $(this).data("isRunning");
	if (!isRunning) {
		$(this).data("isRunning", true);
		var $this = $(this).addClass("shake");
		setTimeout(function() {
			$this.removeClass("shake");
			$this.data("isRunning", false);
		}, 4500);
	}
});
