var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var tableContainer = document.getElementById("table-container");

keyword.addEventListener("keyup", function () {
    // buat objek ajax
    // console.log(keyword.value);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tableContainer.innerHTML = xhr.responseText;

        }
    }
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();
});

