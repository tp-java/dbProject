var rows = document.getElementsByTagName('tr');
for (var i = 0; i < rows.length; i++) {
	rows[i].addEventListener('mouseover', function () {
		if (this.className.indexOf("info") == -1) {
		this.className += " info";			
		};
	});
	rows[i].addEventListener('mouseout', function () {
		this.className = this.className.substring(0, -4);
	});
};

function activeRow (self) {
	self.class += ' info';
}