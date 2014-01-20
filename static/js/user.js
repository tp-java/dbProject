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
	rows[i].addEventListener('click', function () {
		var userId = this.getAttribute('user-id');
		myAjax(userId);
		$('#myModal').modal();
	});
};

var callers = document.getElementsByTagName('li');
for (var i = 0; i < callers.length; i++) {
	callers[i].addEventListener('click', function () {
		var userId = this.getAttribute('user-id');
		employeClientsAjax(userId);
	})
};

function activeRow (self) {
	self.class += ' info';
}
function myAjax (id) {
	$.ajax({type: "GET", url: "http://tproject.ru/ajax/client_modal.php?id=" + id, /*data:somedata, */
		dataType:"text", timeout:30000, async:false,
		error: function(xhr) {
			console.log('Ошибка!'+xhr.status+' '+xhr.statusText); 
		},
		success: function(a) {
			document.getElementById("my-content").innerHTML=a;
		}  
	});
}

function employeClientsAjax (id) {
	$.ajax({type: "GET", url: "http://tproject.ru/ajax/get_employe_clients.php?id=" + id, /*data:somedata, */
		dataType:"text", timeout:30000, async:false,
		error: function(xhr) {
			console.log('Ошибка!'+xhr.status+' '+xhr.statusText); 
		},
		success: function(answer) {
			document.getElementById("table-body").innerHTML = "";
			document.getElementById("table-body").innerHTML = answer;
			addListnersTr();
		}  
	});
}

function addListnersTr () {
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
		rows[i].addEventListener('click', function () {
			var userId = this.getAttribute('user-id');
			myAjax(userId);
			$('#myModal').modal();
		});
	};
}