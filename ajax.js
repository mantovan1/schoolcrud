function searchData(){

    var search = window.document.getElementById("search").value;
    var result = window.document.getElementById("data");
    var ajax = new XMLHttpRequest();

    ajax.open("GET", "action.php?search=" + search, true);

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4) {

            if (ajax.status == 200) {

                result.innerHTML = ajax.responseText;

            } else {

                result.innerHTML = "ERRO ENCONTRADO";

            }

        }

    };

    ajax.send(null);

};

function saveData() {

    var name = window.document.getElementById("name").value;
    var birth = window.document.getElementById("birth").value;
    var career = window.document.getElementById("career").value;
    var ajax = new XMLHttpRequest();

    ajax.open("GET", 'action.php?name=' + name + "&birth=" + birth + "&career=" + career, true);

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4) {

            if (ajax.status == 200) {

                result.innerHTML = ajax.responseText;

            } else {

                result.innerHTML = "ERRO ENCONTRADO";

            }

        }

    }

    ajax.send(null);

};

function deleteData(id) {
    
    var ajax = new XMLHttpRequest();
    
    ajax.open("GET", "action.php?delete=" + id, true);
    
    ajax.onreadystatechange = function() {
    
        if (ajax.readyState == 4) {
        
            if (ajax.status == 200) {
        
                result.innerHTML = ajax.responseText;

            } else {
        
                result.innerHTML = "ERRO ENCONTRADO";
        
            }

        }

    }

    ajax.send(null);
    
};

function updateData() {

    var update = window.document.getElementById("update").value;
    var nameU = window.document.getElementById("nameU").value;
    var birthU = window.document.getElementById("birthU").value;
    var careerU = window.document.getElementById("careerU").value;
    var ajax = new XMLHttpRequest();

    ajax.open("GET", 'action.php?update=' + update + '&nameU=' + nameU + "&birthU=" + birthU + "&careerU=" + careerU, true);

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4) {

            if (ajax.status == 200) {

                result.innerHTML = ajax.responseText;

            } else {

                result.innerHTML = "ERRO ENCONTRADO";

            }

        }

    }

    ajax.send(null);

};